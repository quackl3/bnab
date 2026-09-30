<?php


// previously session based but now weve changed to file based whitelists



// user ip hashed
$ip=$_SERVER['REMOTE_ADDR'];

// cookie addition

//  remeber cookies are overrihgts
$randomhash=bin2hex(random_bytes(20));
$cookie_name="m3d-hash";
$cookie_value="";
setcookie($cookie_name, true, time() + (86400 * 30) , "/"); // 86400 = 1 day
var_dump($_COOKIE);




// ADD TO ANALYTICS

$date = date('l d F Y');
$time = date('H:i');


$ip=$_SERVER['REMOTE_ADDR'];
$useragent=$_SERVER['HTTP_USER_AGENT'];



$file = fopen('../dash/data.dat', 'a');
fwrite($file, "$date  $time | $ip | $useragent". "\n");
fclose($file);






?>