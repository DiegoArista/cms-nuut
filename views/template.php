
<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>

    <title>Restaurante Nuut Grill - Querétaro - Página Oficial</title>
    <link rel="shortcut icon" href="views/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nuut Grill Restaurante, Restaurante Nuut Grill en Querétaro, tenemos parilla, horno, mixoligia, brunch, terraza y mucho más." />
    <meta name="keywords" content="Nuut Grill Restaurante, Parilla, horno, mixoligia, brunch, terraza, Queretaro, Restaurante, comida en queretaro, Restaurantes en queretaro" />
    <meta name="author" content="i45grados.com" />
    
    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="views/css/animate.min.css">
    <link rel="stylesheet" href="views/css/all.min.css">
    <link rel="stylesheet" href="views/css/owl.carousel.min.css">
    <link rel="stylesheet" href="views/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="views/css/magnific-popup.min.css">
    <link rel="stylesheet" href="views/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="views/css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="views/css/sweetalert.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="views/css/bs-stepper.min.css">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="views/css/slick.min.css"> 

    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/menu.css">

    <script src="views/js/sweetalert.min.js"></script>
  </head>

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200" id="seccion-home">



	
    <?php  
	
		
		
		$modulos = new Enlaces();
		$modulos -> enlacesController();

		?>

   

    <?php include "views/modules/modales.php"; ?>  
   
    <script src="views/js/jquery.min.js"></script>
    <script src="views/js/popper.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/jquery.easing.1.3.min.js"></script>
    <script src="views/js/jquery.waypoints.min.js"></script>
    <script src="views/js/owl.carousel.min.js"></script>
    <script src="views/js/jquery.magnific-popup.min.js"></script>
    <script src="views/js/bootstrap-datepicker.min.js"></script>
    <script src="views/js/jquery.timepicker.min.js"></script>
    <script src="views/js/jquery.animateNumber.min.js"></script>
    <!-- Slick slider  &amp; -->
    <script  src="views/js/slick.min.js"></script>
    <!-- BS-Stepper -->
<script src="views/js/bs-stepper.min.js"></script>
  
    <script src="views/js/main.min.js"></script>
    <script src="views/js/script.js"></script>
    <script src="views/js/gestorRespuestas.js"></script>

    <script>
      // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

    </script>
  
</body>
</html>
<?php
ob_end_flush();
?> 
