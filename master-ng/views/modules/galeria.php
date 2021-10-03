<?php 
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/top.php";
?>

	<!--=====================================
			GALERIA ADMINISTRABLE          
			======================================-->

			<div id="galeria" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
			
                <hr>
    
                <p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, tamaño recomendado: 1024px * 768px</p>
                    
                    <ul id="lightbox">
                    <?php 
					$galeria = new GestorGaleria();
					$galeria -> mostrarImagenVistaController();

					
				

				?>




                    </ul>
    
                    <button id="ordenarGaleria" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>
                    <button  id="guardarGaleria"class="btn btn-primary pull-right" style="margin:10px 30px; display:none">Guardar Orden Imágenes</button>
                </div>
                
                <!--====  Fin de GALERIA ADMINISTRABLE  ====-->