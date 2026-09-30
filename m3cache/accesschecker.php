<?php

/*



████╗░████║╚════██╗██╔══██╗██║░░░██║██║░░░░░██╔══██╗██╔══██╗
██╔████╔██║░█████╔╝██║░░██║██║░░░██║██║░░░░░███████║██████╔╝
██║╚██╔╝██║░╚═══██╗██║░░██║██║░░░██║██║░░░░░██╔══██║██╔══██╗
██║░╚═╝░██║██████╔╝██████╔╝╚██████╔╝███████╗██║░░██║██║░░██║
╚═╝░░░░░╚═╝╚═════╝░╚═════╝░░╚═════╝░╚══════╝╚═╝░░╚═╝╚═╝░░╚═╝


*/



/*

M3D Front checker

Checks DB whitelist and blacklist files, then exit where needed


*/



//USE CONFIG TO START SHIT

if(!$DESKTOP_ALLOWED){

  //desktop is blocked do a mobile check

  //check if mobile
if(preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
      
}else{
  
 // create one time access file simple
 redirectTo("$REDIRECT?err=DESKTOP_ERROR"); //
 die();

}

}

if(!$MOBILE_ALLOWED){

  //desktop is blocked do a mobile check

  //check if mobile
if(preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
    
  redirectTo("$REDIRECT?err=MOBILE_ERROR"); //
 die();


}else{}

}



// BLACKLIST FOR ONETIME ACCESS ETC
$m3dblacklistfile= dirname(__FILE__)."/db/m3dblacklist.dat";
$blacklistarray = explode("\n", file_get_contents($m3dblacklistfile));


// blacklist has the highest priority


  $userip=$_SERVER['REMOTE_ADDR'];
  if(in_array($userip, $blacklistarray)){


    // create one time access file simple
    redirectTo("$REDIRECT?err=M3D_BLACKLIST_FC_ERROR"); //
    die();
  };  
  



// WHITELIST IS COOKIE BASED  MOSTLIKELY SET BY ajax

if(isset($_COOKIE["m3d-hash"])){
// nice
}
else{
  die("m3dCerror");
}

;








