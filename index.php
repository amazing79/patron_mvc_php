
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prueba MVC en PHP</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--meta tags necesarios -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- materialize CSS -->
     <link rel="stylesheet" href="materialize/css/materialize.min.css">
</head>
<body>
<header>
<?php require_once('layouts/header.php'); ?>
</header>
<div class="container-fluid" >
<?php
   require_once('AppRouter.php');
   
   $url = '';
   if(isset($_REQUEST['url']))
   {
       $url = $_REQUEST['url'];
   }
   AppRouter::router($url);

?>
</div>
<?php require_once('layouts/footer.php'); ?>
<!-- CDN (content Delivery Network), para usar Materialize o Bootstrap sin necidad de instalarlo, requiere internet -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="materialize/js/materialize.min.js"></script>

</body>
</html>

