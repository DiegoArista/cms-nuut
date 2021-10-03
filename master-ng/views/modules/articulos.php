<?php 
session_start();
//Validamos la sesion si es false nos redirige al formualrio de inicio de sesion
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";
?>

<!--=====================================
			ARTÍCULOS ADMINISTRABLE          
			======================================-->
			
			<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
				
				<button id="btnAgregarArticulo" class="btn btn-info btn-lg">Agregar Artículo</button>

				<!--==== AGREGAR ARTÍCULO  ====-->

				<div id="agregarArtículo" style="display:none">
				<form method="post" enctype="multipart/form-data">
					
						<input name="tituloArticulo" type="text" placeholder="Título del Artículo" class="form-control" required>

						<textarea name="introArticulo"  cols="30" rows="5" placeholder="Introducción del Articulo" class="form-control" required maxlength="169"></textarea>

						<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

						<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

						<div id="arrastreImagenArticulo">	
							<!-- <div id="imagenArticulo"><img src="views/images/articulos/landscape01.jpg" class="img-thumbnail"></div> -->
						</div>

						<textarea name="contenidoArticulo"  cols="30" rows="10" placeholder="Contenido del Articulo" class="form-control" required></textarea>

						<input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar Artículo">
					</form>
				</div>

<?php 
$crearArticulo = new GestorArticulos();
$crearArticulo -> guardarArticuloController();

?>


				<hr>

				<!--==== EDITAR ARTÍCULO  ====-->

				<ul id="editarArticulo">


				<?php 
					$mostrarArticulo = new GestorArticulos();
					$mostrarArticulo -> mostrarArticulosController();

					$mostrarArticulo -> borrarArticuloController();
					$mostrarArticulo -> editarArticuloController();
					
				

				?>

					

					

				</ul>
				

				<button id="ordenarArticulos" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Artículos</button>
				<button id="guardarOrdenArticulos" class="btn btn-primary pull-right" style="margin:10px 30px; display:none;">Guardar Orden Artículos</button>

			</div>

			<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->
			
