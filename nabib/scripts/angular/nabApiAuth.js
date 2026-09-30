
/**
 * To hook into current NAB IB configuration mechanisms (generally via JSP) this configuration block needs to be defined
 * on every page where this module is required.

angular.module('nab.ib.nabapi.config', [])
    .constant('nabApiConfig', {
        domain: 'http://localhost:9082',
        applicationId: appId,
        enabledInterceptors: {
            nabApiApplicationIdInterceptor: true,           // Optional. Defaults to true
            nabApiAuthenticationServiceInterceptor: false   // Optional. Defaults to true
            nabApiLegacyBrowserInterceptor:true             // Optional. Defaults to true
        }
    });

 * Refer to nabApiAuth.html test harness for example usage.
 */

/**
 * NAB Internet Banking API Modules.
 *
 * Add this module dendency to automatically wire in an interceptor to take care
 * of authentication.
 */
angular.module('nab.ib.nabapi.authentication', ['nab.ib.nabapi.config','corsIEFix'])

    /**
     * Constants not for dependant apps to configure
     */
    .constant('jwTokenUrl', '/nabib/authentication/getJwtv2.do') // It is assumed we'll be returning back to origin to get JWT
    .constant('apiTokenLocation', '/init/auth?v=3')

    // The maximum number of attempts to reestablish a connection when 401 is received. This avoids retry cycle.
    .constant('maxAuthenticationRetryAttemptCount', 2)
    .config(['$provide', 'nabApiConfig', 'apiTokenLocation', function($provide, nabApiConfig, apiTokenLocation) {
        $provide.constant('apiTokenUrl', nabApiConfig.domain + apiTokenLocation);
    }])

    /**
     * Configure the required interceptors
     */
    .config(['$provide', '$httpProvider', 'nabApiConfig', function($provide, $httpProvider, nabApiConfig) {

        /**
         * Handles adding of the NAB IB Application ID to the request headers
         */
        $provide.factory('nabApiApplicationIdInterceptor', ['nabApiConfig', 'nabApiUtilService', function(nabApiConfig, nabApiUtilService) {
            return {
                request: function(config) {
                    // Ignore all non api requests
                    if(!nabApiUtilService.isApiUrl(config.url)) {
                        return config;
                    }

                    if(!config.headers['x-nab-key']) {
                        config.headers['x-nab-key'] = nabApiConfig.applicationId;
                    }

                    if(nabApiConfig.clsId) {
                        config.headers['x-nab-clsid'] = nabApiConfig.clsId;
                    }

                    return config;
                }
            };
        }]);

        /**
         * Handles adding token to outgoing API requests. Will attempt to authenticate if either no API token is available
         * or token is available and API responded with 401.
         *
         * Note:
         * There are two separate checks in the 'responseError' to ensure the two API calls below do not go into a infinite loop.
         * 1. API authentication => init/auth
         * 2. Actual API call after API authentication has been successful
         *
         * Future considerations:
         * - Currently 1 authentication per request. If multiple requests arrive at the same time, will cause multiple authentication
         *   requests to the API. If this is a problem, implement a queueing system where requests are replayed after successful authentication.
         * - Assumes only 1 API Application ('x-nab-key') configured. There maybe be multiple apps on a page, add support to pass this through. If apps have
         *   set their own 'x-nab-key', pass this on to authenticator, and store cookie to map back to the app.
         */
        $provide.factory('nabApiAuthenticationServiceInterceptor', ['$q', '$injector' , 'maxAuthenticationRetryAttemptCount', 'nabApiConfig', 'nabApiUtilService',
                                                                    function($q, $injector, maxAuthenticationRetryAttemptCount, nabApiConfig, nabApiUtilService) {

            var _nabApiAuthenticationService;
            var $http;
            var authenticateAttemptCount = 0;
            var apiCallAttemptCount = 0;

            function nabApiAuthenticationService() {
                _nabApiAuthenticationService = _nabApiAuthenticationService || $injector.get('nabApiAuthenticationService');

                return _nabApiAuthenticationService;
            }

            function replayRequest(config) {
                $http = $http || $injector.get('$http');

                return $http(config);
            }

            function setApiTokenHeader(config) {
                return function(apiTokenCookie) {
                    config.headers.Authorization = apiTokenCookie;
                    return config;
                };
            }

            function clearAuthenticationAttemptCount(apiToken) {
                authenticateAttemptCount = 0;
                // Return token so this is can be chained along
                return apiToken;
            }

            function clearRetryAttemptCounts(rejection) {
                authenticateAttemptCount = 0;
                apiCallAttemptCount = 0;
            }

            function emitAuthenticationRejection(rejection, message, authentication) {
                clearRetryAttemptCounts();
                return nabApiAuthenticationService().httpAuthenticationError(rejection, message, authentication, false);
            }

            return {
                request: function(config) {
                    // If not going to NAB API
                    if(!nabApiUtilService.isApiUrl(config.url)) {
                        return config;
                    }

                    // Make sure it's not a login
                    if(nabApiUtilService.isApiTokenUrl(config.url)) {
                        // It's a login, nothing more to do here
                        return config;
                    }

                    // Get the token and execute the request. Queue request here if only 1 authentication should be executed
                    return nabApiAuthenticationService().apiToken()
                        .then(clearAuthenticationAttemptCount)
                        .then(setApiTokenHeader(config));
                },
                responseError: function(rejection) {
                    // Verify this is a http rejection before attempting to handle this. It could be a passed type error
                    if(rejection.config === undefined) {
                        return $q.reject(rejection);
                    }

                    // If not an API call or rejection during authentication
                    if(!nabApiUtilService.isApiUrl(rejection.config.url) || rejection.authentication) {
                        return $q.reject(rejection);
                    }

                    // Expects any legacy CORS request to be already handled
                    if (rejection.status !== 401) {
                        return $q.reject(rejection);
                    }

                    if(nabApiUtilService.isApiTokenUrl(rejection.config.url)) {
                        // Request was API authentication (eg. /init/auth?v=3), check the number of replays that can be executed to prevent a never ending authentication loop.
                        if(authenticateAttemptCount >= maxAuthenticationRetryAttemptCount) {
                            var authenticationErrorMessage = "Authentication cycle detected. Attempted to reauthenticate " + authenticateAttemptCount + " times before rejecting request.";
                            return emitAuthenticationRejection(rejection, authenticationErrorMessage, true);
                        }
                        authenticateAttemptCount++;
                    } else {
                        // Request was API call, check the number of replays on the API call when it returned 401 response, to prevent infinite loop of re-tries.
                        if (apiCallAttemptCount >= maxAuthenticationRetryAttemptCount) {
                            var apiErrorMessage = "API call cycle detected. Attempted " + apiCallAttemptCount + " times before rejecting request.";
                            return emitAuthenticationRejection(rejection, apiErrorMessage, false);
                        }
                        apiCallAttemptCount++;
                    }

                    // API call returns 401 (could be the API authentication call /init/auth?v=3 or non authentication API call), try the request again
                    // Cookies must be invalid, clear cookies and replay the request which will initiate login
                    nabApiAuthenticationService().clearTokens();
                    // Replay the request
                    return replayRequest(rejection.config);
                }
            };
        }]);

        /**
         * Handles legacy browser (which do not support CORS) calls to NAB API.
         * Cross domain requests with IE8 and IE9 show error - Access is denied
         * Interceptor modifying NAB API requests using XDomainRequest as per API spec:
         * http://teams.national.com.au/workspaces/Digital/Digital%20Wiki/Legacy%20browser%20CORS%20support.aspx
         */
        $provide.factory('nabApiLegacyBrowserInterceptor', ['nabApiConfig', 'nabApiUtilService', '$q', 'corsUtil', function(nabApiConfig, nabApiUtilService, $q, corsUtil) {
            return {
                request: function(config) {
                    // Ignore all non api requests
                    if(!nabApiUtilService.isApiUrl(config.url)) {
                        return config;
                    }

                    if (corsUtil.isLegacyCorsRequest('POST', config.url)) {
                        corsUtil.toCorsRequest(config);
                        config.data.cors.appId = nabApiConfig.applicationId;
                        if (nabApiUtilService.apiTokenCookie()) {
                            config.data.cors.authorization = nabApiUtilService.apiTokenCookie();
                        }
                    }

                    return config;
                },
                response: function(response) {

                    // NAB API returns always returns 200 for browsers not supporting CORS and puts the status code into the payload
                    if(nabApiUtilService.isApiUrl(response.config.url) && corsUtil.isLegacyCorsRequest('POST', response.config.url) && response.data && response.data.status && response.data.status.code){
                        response.status = parseInt(response.data.status.code.match(/[0-9]+/)[0], 10);
                        response.statusText = response.data.status.message;
                        if(response.status >= 400){
                            return $q.reject(response);
                        }
                    }
                    return response || $q.when(response);
                }
            };
        }]);

        if(nabApiConfig.enabledInterceptors === undefined || nabApiConfig.enabledInterceptors.nabApiApplicationIdInterceptor === undefined ||
                nabApiConfig.enabledInterceptors.nabApiApplicationIdInterceptor) {
            $httpProvider.interceptors.push('nabApiApplicationIdInterceptor');
        }

        if(nabApiConfig.enabledInterceptors === undefined || nabApiConfig.enabledInterceptors.nabApiAuthenticationServiceInterceptor === undefined ||
                nabApiConfig.enabledInterceptors.nabApiAuthenticationServiceInterceptor) {
            $httpProvider.interceptors.push('nabApiAuthenticationServiceInterceptor');
        }

        if(nabApiConfig.enabledInterceptors === undefined || nabApiConfig.enabledInterceptors.nabApiLegacyBrowserInterceptor === undefined ||
                nabApiConfig.enabledInterceptors.nabApiLegacyBrowserInterceptor) {
            $httpProvider.interceptors.push('nabApiLegacyBrowserInterceptor');
        }
    }])

    .factory('nabApiUtilService', ['$window', 'nabApiConfig', 'apiTokenUrl', '$location', function($window, nabApiConfig, apiTokenUrl, $location) {
        return {
            isApiUrl: function(url) {
                return url.indexOf(nabApiConfig.domain) === 0;
            },
            isApiTokenUrl: function(url) {
                return url.indexOf(apiTokenUrl) === 0;
            },

            /**
             * This cookie is also set by the nab api security filter if it determines API access is required, it's important for the
             * name of the cookie to be consistent with the server
             */
            jwTokenCookie: function(jwToken) {
                if(arguments.length > 0) {
                    throw new Error("JWT cannot be stored, is a one time use cookie.");
                }

                return $.cookie("nabibJwt");
            },

            /**
             * This cookie is not set by server. This has now been amalgamated with the backbone
             * authentication module. The former name for this var was nabibAngularApiToken.
             */
            apiTokenCookie: function(apiToken) {
                if(arguments.length > 0) {
                    if ($location.protocol() === 'https') {
                        $.cookie("nabibSessionToken", apiToken, {secure: true});
                    }
                    else {
                        $.cookie("nabibSessionToken", apiToken);
                    }
                }
                return $.cookie("nabibSessionToken");
            },

            clearTokenCookies: function() {
                $.removeCookie('nabibSessionToken');
        		$.removeCookie('nabibSessionToken',{ path: '/nabib' });
        		$.removeCookie('nabibSessionTokenTimestamp');
        		$.removeCookie('nabibSessionTokenTimestamp',{ path: '/nabib' });
        		$.removeCookie('nabibSessionTokenTimestamp',{ path: '/nabib/mobile' });
                $.removeCookie('nabibJwt');
                $.removeCookie('nabibJwt',{ path: '/nabib/mobile' });
            },

            getApplicationId: function() {
                return nabApiConfig.applicationId;
            },

            isMobileIBUrl: function() {
                return location.pathname.indexOf('/nabib/mobile/') === 0;
            }
        };
    }])

    /**
     * Service takes care of obtaining tokens from NAB IB or NAB API.
     *
     * Any promise rejections will be emitted as:
     * {
     *     authentication: true, // Flag indicating the failure was during authentication
     *     config: response.config,
     *     response: response,
     *     message: "A descriptive message of the failure"
     * }
     */
    .factory('nabApiAuthenticationService', ['$http', '$q', '$window', 'jwTokenUrl', 'apiTokenUrl', 'nabApiUtilService',
                                             function($http, $q, $window, jwTokenUrl, apiTokenUrl, nabApiUtilService) {
        var serviceDefinitionObject;

        function httpGetJwToken() {
            return $http({method: 'GET', url: jwTokenUrl, cache: false});
        }

        function jwTokenFromBody(response) {
            // TODO Handling 302 redirect. Could be better?
            if(response.data.length > 1024) {
                return serviceDefinitionObject.httpAuthenticationError(response, "JWT is too long (> 1024 bytes)", false, true);
            }

            return response.data;
        }

        function httpGetApiToken(jwt) {
            var request = {"loginRequest":{"brand":"nab","lob":"nab","credentials":{"apiStructType":"token","token":{"token":jwt}}}};

            return $http.post(apiTokenUrl, request);
        }

        function apiTokenFromBody(response) {
            var data = response.data;

            // TODO Handle API statuses: Here or in interceptor?? Problably in interceptor
            // This rejection object needs to be decorated with status to be handled down stream
            if(data === undefined) { return serviceDefinitionObject.httpAuthenticationError(response, "Could not retrieve API Token from response: No data in response"); }
            if(data.status === undefined) { return serviceDefinitionObject.httpAuthenticationError(response, "Could not retrieve API Token from response: No status in response"); }
            if(data.status.code !== 'API-200') { return serviceDefinitionObject.httpAuthenticationError(response, "Could not retrieve API Token from response: No success status in response. Was '" + data.status.code + "'"); }
            if(data.tokens === undefined) { return serviceDefinitionObject.httpAuthenticationError(response, "Could not retrieve API Token from response: No tokens available in response"); }

            var tokens = $.grep(response.data.tokens, function(token) {
                return (token.name === 'Authorization' && token.type === 'header');
            });

            if(tokens.length > 0) {
                return tokens[0].value;
            }
            else {
                return serviceDefinitionObject.httpAuthenticationError(response, "Could not retrieve API Token from response: Authorisation header missing");
            }
        }

        serviceDefinitionObject = {
            jwToken: function() {
                var jwToken = nabApiUtilService.jwTokenCookie();

                if(jwToken) {
                    // It has not been used yet,
                    this.clearTokens();
                    // Returns a promise to keep result consistent with http request
                    return $q.when(jwToken);
                }
                else {
                    return httpGetJwToken()
                        .then(jwTokenFromBody, serviceDefinitionObject.getJwtError);
                }
            },
            apiToken: function() {
                if ($window.nabib && $window.nabib.getToken) {
                    return $window.nabib.getToken()
                        .then(nabApiUtilService.apiTokenCookie, serviceDefinitionObject.httpAuthenticationError);
                } else {
                    // if shell isn't loaded
                    var apiToken = nabApiUtilService.apiTokenCookie();
                    if (apiToken) {
                        // cater for pages that don't have shell
                        return $q.when(apiToken);
                    }
                }
            },
            httpAuthenticationError: function(response, message, authenticationFailure, getJwtFailure) {
                var _message = message ? message : "A server error was encountered";
                // authenticationFailure ==> failed by /init/auth?v=3
                var _authentication = authenticationFailure === undefined ? true : authenticationFailure;
                // getJwtFailure ==> failed by getJwt.do
                var _getJwt = getJwtFailure === undefined ? false : getJwtFailure;

                // need to make sure the response.data is returned with the correct structure (contains message, authentication and getJwt as variables)
                if (response.data && response.data.constructor == Object) {
                    response.data.message = response.data.message === undefined ? _message : response.data.message;
                    response.data.authentication = response.data.authentication === undefined ? _authentication : response.data.authentication;
                    response.data.getJwt = response.data.getJwt === undefined ? _getJwt : response.data.getJwt;
                } else {
                    response.data = {content: response.data, message: _message, authentication: _authentication, getJwt: _getJwt};
                }
                return $q.reject(response);
            },
            getJwtError: function(response, message) {
                if (response.status == 401) {
                    $window.location.href = nabApiUtilService.isMobileIBUrl() ? '/nabib/mobile/login.ctl' : '/nabib/login.ctl';
                    response.data = {message: "getJwt.do failed with 401, most likely IB session has expired.", authentication: false, getJwt: true};
                    return $q.reject(response);
                } else {
                    return serviceDefinitionObject.httpAuthenticationError(response, message, false, true);
                }
            },
            clearTokens: function() {
                nabApiUtilService.clearTokenCookies();
            }
        };

        return serviceDefinitionObject;
    }]);