<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nuut Grill | Admin</title>
  <link rel="shortcut icon" href="views/favicon.ico" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="views/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="views/plugins/summernote/summernote-bs4.min.css">
 <!-- custom style -->
 <link rel="stylesheet" href="views/css/i45grados.css">
 <link rel="stylesheet" href="views/css/sweetalert.css">
 <link rel="stylesheet" href="views/css/estilos-nuevos.css">
 <script src="views/js/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../views/images/logo.svg" alt="Logo" height="60" width="60">
  </div>



<!-- nav bar  top -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
       
<!-- 
 -->
<?php 
		$modulos = new Enlaces();
		$modulos -> enlacesController();
?>

<!-- 
 -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="https://direcc336.wixsite.com/misitio">i45Grados</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Versión Beta</b> 1.0
  </div>
  </footer>


  </div>
<!-- ./wrapper -->
  

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="views/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="views/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="views/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="views/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="views/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="views/plugins/moment/moment.min.js"></script>
<script src="views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="views/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="views/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="views/dist/js/pages/dashboard.js"></script>


<!-- admin freelance -->

<script src="views/js/script.js"></script>
<script src="views/js/validarIngreso.js"></script>
<script src="views/js/gestorMensajes.js"></script>
<script src="views/js/gestorPerfiles.js"></script>
<script src="views/js/gestorPreguntas.js"></script>
<script src="views/js/gestorRuleta.js"></script>
<script src="views/js/gestorGaleria.js"></script>
<script src="views/js/gestorVideos.js"></script>
<script src="views/js/gestorSlide.js"></script>
<script src="views/js/gestorMenus.js"></script>
	<!--====  Fin de COLUMNA CONTENIDO  ====-->
		<!-- 
<script src="views/js/gestorArticulos.js"></script>



	
 -->

</body>
</html>
<?php
ob_end_flush();
?> 


	
	
	