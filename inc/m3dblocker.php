<?php

/*



████╗░████║╚════██╗██╔══██╗██║░░░██║██║░░░░░██╔══██╗██╔══██╗
██╔████╔██║░█████╔╝██║░░██║██║░░░██║██║░░░░░███████║██████╔╝
██║╚██╔╝██║░╚═══██╗██║░░██║██║░░░██║██║░░░░░██╔══██║██╔══██╗
██║░╚═╝░██║██████╔╝██████╔╝╚██████╔╝███████╗██║░░██║██║░░██║
╚═╝░░░░░╚═╝╚═════╝░╚═════╝░░╚═════╝░╚══════╝╚═╝░░╚═╝╚═╝░░╚═╝



*/



// extract bot data and compare IP!


$ips=file_get_contents("inc/m3dip.dat");
$ips=json_decode($ips);

$hosts=file_get_contents("inc/m3dhosts.dat");
$hosts=json_decode($hosts);



foreach ($ips as $item) {
    if(strlen(strtolower($item)>=2)){
if (substr_count(strtolower($M3DUSERIP), strtolower($item)) > 0) { die("m3d blocker ip error");}}
}


if($M3DBLOCKHOST){
foreach ($hosts as $item) {
    if(strlen(strtolower($item)>5)){

if (substr_count(strtolower($M3DUSERIP), strtolower($item)) > 0) { die("m3d blocker host error");}}}
    }


?>