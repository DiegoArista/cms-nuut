<?php 
session_start();
//Validamos la sesion si es false nos redirige al formualrio de inicio de sesion
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/top.php";

?>

<!--=====================================
			SUSCRIPTORES         
			======================================-->
			
			<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
			 
			 <div>

				<table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
			    <thead>
			      <tr>
			        <th>Nombre</th>
			        <th>Email</th>
			        <th>Acciones</th>
					<th></th>
                
			      </tr>
			    </thead>
			    <tbody>

				<?php

$mostrarSuscriptores = new SuscriptoresController();
$mostrarSuscriptores -> mostrarSuscriptoresController();
$mostrarSuscriptores -> borrarSuscriptoresController();



?>
			       
			  
			    </tbody>
			  </table>
<a href="tcpdf/pdf/suscriptores.php" target="blank">
<button class="btn btn-warning pull-right" style="margin:20px;">Imprimir Suscriptores</button>
</a>
			  
			  </div>

    		</div>





			<script>

$(window).load(function(){
	
  var datos = new FormData();
  datos.append("revisionSuscriptores", 1);
  $.ajax({
	 url:"views/ajax/gestorRevision.php",
	 method: "POST",
	 data: datos,
	 cache: false,
	 contentType: false,
	 processData:false,
	 success: function(respuesta){
	  
	 }

});
})


</script>
		
			<!--====  Fin de SUSCRIPTORES  ====-->