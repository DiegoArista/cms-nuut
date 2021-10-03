<?php 
session_start();

if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/top.php";
?>	
		
			<!--=====================================
			views/videos/ ADMINISTRABLE          
			======================================-->
			
			<div id="views/videos/" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

			<form method="post"  enctype="multipart/form-data">

   			 	<input id="subirVideo" type="file" name="video" class="btn btn-default" required>
    			
    			<!-- <input type="submit" value="Subir Video" class="btn btn-info"> -->

    		</form>

    		<ul id="galeriaVideo">
			<?php 
					$mostrarVideo = new GestorVideos();
					$mostrarVideo -> mostrarVideoVistaController();

					// $mostrarVideo -> borrarVideoController();
					// $mostrarVideo -> editarArticuloController();
					
				

				?>
    			

    		</ul>

    		
    			<button id="ordenarVideo" class="btn btn-warning " style="margin:10px 30px;">Ordenar videos</button>
				<button id="guardarVideo"class="btn btn-primary " style="margin:10px 30px; display:none">Guardar Orden videos</button>
    		</div>
			
			
			<!--====  Fin de views/videos/ ADMINISTRABLE  ====-->