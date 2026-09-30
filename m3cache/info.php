<?php


require_once "../inc/m3dular_config.php";
require_once "m3dular_functions.php";

$host = $ip;
		
		if (filter_var($ip, FILTER_VALIDATE_IP)) {
			
			$host = gethostbyaddr($ip);
			
		}
echo $M3DUSERIP. ", HOST: " . $host;

?>