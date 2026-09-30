function initNabApiConfig(apiDomain, logoutUrl, applicationId, kongDomain, revokeTokenPath, clientId) {
  angular.module('nab.ib.nabapi.config', [])
    .constant('nabApiConfig', {
      miniAppIdentityEnabled: 'true',
      domain: apiDomain,
      apiLogoutUrl: logoutUrl,
      applicationId: applicationId,
      kongDomain: kongDomain,
      revokeTokenPath: revokeTokenPath,
      clientId: clientId
    });
  angular.module('nab.ib.nabapi.logout.config', [])
    .constant('apiLogoutUrl', logoutUrl);
}

function createShellConfig(currentDate) {
  return {
    ibHeader: {
      uiContainerId: {
        ibHeader: function () {
          return document.getElementById('ibHeader')
        }
      },
      data: {}
    },
    ibFooter: {
      uiContainerId: {
        ibFooter: function () {
          return document.getElementById('ibFooter')
        }
      },
      data: {}
    },
    'headerLinkSection': {
      'date': {text: currentDate},
      'help': {
        text: 'Help',
        url: 'javascript:goToPage(\'https://www.nab.com.au/personal/online-banking/nab-internet-banking/sms-security\')',
        title: 'Help'
      },
      'security': {text: 'Security', url: 'javascript:goToPage(\'http://www.nab.com.au/about-us/security\')', title: 'Security'},
      'contact': {text: 'Contact us', url: 'javascript:goToPage(\'http://www.nab.com.au/about-us/contact-us\')', title: 'Contact us'},
      'locate': {text: 'Locate us', url: 'javascript:goToPage(\'http://ols.nab.com.au/location-web/search.do\')', title: 'Locate us'}
    }
  };
}

function goToPage(url) {
  window.open(url,
    "",
    "width=800,height=600,resizable=yes,scrollbars=yes,menubar=no,status=yes,directories=no,location=no,left=0,top=0,screenX=0,screenY=0");
}

function clearChatWidgetSession() {
  let sessionStorageToClear = [];
  for (let i = 0; i < sessionStorage.length; i++) {
    if (sessionStorage.key(i).substring(0, 10) === 'chatWidget') {
      sessionStorageToClear.push(sessionStorage.key(i));
    }
  }

  for (let i = 0; i < sessionStorageToClear.length; i++) {
    sessionStorage.removeItem(sessionStorageToClear[i]);
  }
}

function clearCachedNotificationsData() {
  sessionStorage.removeItem('all_ib_notifications');
  sessionStorage.removeItem('ib_space_notification');
  sessionStorage.removeItem('ib_space_invitation_account');
  sessionStorage.removeItem('notificationPageVisited');
  sessionStorage.removeItem('notificationPropositionIds');
}

(function () {
  // Force this page to only be opened within the Parent frame,
  // and NOT within any iframe.
  if (window.parent != window.self) {
    window.parent.location.href = window.location.href;
  }
  clearChatWidgetSession();
  clearCachedNotificationsData();
})();

$(document).ready(function () {
  var mboxIframe = '#mbox-iframe';
  var prevIframeHeight = 0;
  var timeout = null;

  iFrameResize({
    scrolling: false,
    heightCalculationMethod: 'lowestElement',
    onResized: function (messageData) {
      var mboxContainer = $('.mbox-iframe-container');

      if (messageData.iframe && parseInt(messageData.height) > 40) {
        var mboxContentsLoadedClass = 'mbox-contents-loaded';
        mboxContainer.removeAttr('aria-hidden');

        var bannerElement = $('.banner-background');

        bannerElement
          .removeClass(mboxContentsLoadedClass)
          .addClass(mboxContentsLoadedClass);
        mboxContainer
          .removeClass(mboxContentsLoadedClass)
          .addClass(mboxContentsLoadedClass);

        // request resize check manually
        if (prevIframeHeight !== messageData.height) {
          // setTimeout to prevent conflicting with debounce resize to fix whitespace issue
          timeout = setTimeout(function () {
            messageData.iframe.iFrameResizer.resize();
            prevIframeHeight = messageData.height;

            // clear timeout
            clearTimeout(timeout);
            timeout = null;
          }, 300);
        }
      } else {
        mboxContainer.attr('aria-hidden', true);
      }
    }
  }, mboxIframe);

});