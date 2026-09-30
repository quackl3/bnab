/**
 * Logout from NAB API
 * 1. Call NAB API logout service to remove the API token from NAB API cache
 * 2. Remove the nabibSessionToken cookie from the user browser
 * 3. Redirect user to login page or other content page
 * 
 * Declare this in the JSP to pass in the NAB API logout URL
 * 
 *	angular.module('nab.ib.nabapi.logout.config', [])
 *    .constant('apiLogoutUrl', "NAB API logout URL");
 * 
 */
var apiLogoutApp = angular.module('nab.ib.nabapi.logout', ['nab.ib.nabapi.authentication','nab.ib.nabapi.config','nab.ib.nabapi.logout.config']);

apiLogoutApp.service('apiLogoutService', ['$q', '$http', 'nabApiConfig', 'nabApiAuthenticationService', function($q, $http, nabApiConfig, nabApiAuthenticationService) {
	this.callApiLogoutService = function() {
		const miniAppIdentityEnabled = nabApiConfig.miniAppIdentityEnabled === 'true' || nabApiConfig.miniAppIdentityEnabled === true;
		if (miniAppIdentityEnabled) {
			return this._callDafApiLogoutService()
		} else {
			return this._callApiLogoutService()
		}
	}

	this._callDafApiLogoutService = function() {
		var deferred = $q.defer(),
			promiseRevokeOAuthToken = deferred.promise;

		if ($.cookie("nabibSessionToken") === undefined || $.cookie("nabibSessionToken") === null) {
			deferred.resolve("Revoke token not required");
			return promiseRevokeOAuthToken;
		}

		if (nabApiAuthenticationService.apiToken) {
			nabApiAuthenticationService.apiToken().then(
				function (data){
					var requestUrl = nabApiConfig.kongDomain + nabApiConfig.revokeTokenPath,
						dataObj = {
							"client_id": nabApiConfig.clientId,
							"token": data,
							"token_type_hint": "access_token"
						},
						headerConfig = {
							'Content-Type': 'application/json',
							'x-nab-clsid': nabApiConfig.clsId
						};
					$http({
						url: requestUrl,
						method: 'POST',
						data: dataObj,
						headers: headerConfig
					}).then(function(response){
						deferred.resolve("Revoke token successfully " + response);
						return promiseRevokeOAuthToken;
					}, function(error) {
						deferred.reject('Failed to get token ' + error);
						return promiseRevokeOAuthToken;
					});
				}).catch(function(error){
				deferred.reject('Failed to get token ' + error);
				return promiseRevokeOAuthToken;
			})
		} else {
			deferred.reject('Failed to get token');
		}

		return promiseRevokeOAuthToken;
	};

	this._callApiLogoutService = function () {
		var deferred = $q.defer();
		var promiseLogout = deferred.promise;

		if ($.cookie("nabibSessionToken") !== undefined) {
			var requestUrl = nabApiConfig.domain + nabApiConfig.apiLogoutUrl;
			promiseLogout = $http({url: requestUrl, method: 'DELETE', cache: false});
		} else {
			deferred.resolve("API logout not required");
		}

		return promiseLogout;
	};

	this.removeApiTokenCookie = function() {
		$.removeCookie('nabibSessionToken');
		$.removeCookie('nabibSessionToken',{ path: '/nabib' });
		$.removeCookie('nabibSessionToken',{ path: '/nabib/mobile' });
		$.removeCookie('nabibSessionTokenTimestamp');
		$.removeCookie('nabibSessionTokenTimestamp',{ path: '/nabib' });
		$.removeCookie('nabibSessionTokenTimestamp',{ path: '/nabib/mobile' });
	};
	
	this.redirect = function() {
        // Submits encrypted data if present, otherwise just close the window
		if ($("#encryptedDataForm").length > 0) {
			$("#encryptedDataForm").get(0).submit();
		}
		else {
			window.close();
		}		
	};
}]);

apiLogoutApp.controller('apiLogoutController', ['$q', '$scope', '$http', 'nabApiConfig', 'apiLogoutService', function($q, $scope, $http, nabApiConfig, apiLogoutService) {
	$scope.apiLogoutWhenIBLogout = function() {
		apiLogoutService.callApiLogoutService()
		.then(apiLogoutService.removeApiTokenCookie, apiLogoutService.removeApiTokenCookie)
		.then(apiLogoutService.redirect);
	};
	
	$scope.apiLogoutWhenIBLogin = function() {
		apiLogoutService.callApiLogoutService()
		.then(apiLogoutService.removeApiTokenCookie, apiLogoutService.removeApiTokenCookie);
    };
}]);
