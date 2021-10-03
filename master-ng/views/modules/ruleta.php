<?php 
session_start();
//Validamos la sesion si es false nos redirige al formualrio de inicio de sesion
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/top.php";
// include "views/modules/header.php";
?>

<div class="col-md-12   ">
    <div class="col-md-12 ruleta mb-4">
		<div class="filtro-ruleta ">
			<div class="card-title col-md-12 ">
				<h1 class="text-center fuente-web mt-3 mb-2">Juego Ruleta Nuut</h1>
			</div>



<!-- ruleta front -->

<div class="col-md-12 d-flex justify-content-center">

<input class="btn btn-light fuente-web pr-4 pl-4 ruleta__text" type="button" value="Jugar" style="float:left"  id='spin' />



</div>


<div class="d-flex  justify-content-center align-items-center">
	<canvas id="canvas" width="500" height="500"></canvas>
	<div class="logo-ruleta">
		<img width="120px" height="120px" src="views/images/logo-white.svg" alt="logo blanco">
	</div>
</div>















<!-- Modal -->
<div class="modal fade" id="ganadorModal" tabindex="-1" role="dialog" aria-labelledby="ganadorModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content fuente-web">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="ganadorModal">Guardar Ganador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="premios" method="post" >
			<div class="form-group">
				<label for="nombre">Nombre*</label>
				<input type="text" class="form-control" id="nombre"  name="nombre"  placeholder="Escribe tu nombre" required>
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos*</label>
				<input type="text" class="form-control" id="apellidos"  name="apellidos" placeholder="Escribe tus apellidos" required>
			</div>
			<div class="form-group">
				<label for="email">Correo*</label>
				<input type="email" class="form-control" id="email"  name="email" placeholder="Escribe tu correo" required>
			</div>
			<div class="form-group" id="idPremio">
			<!-- <label for="email">Premio: </label> -->
			
			</div>
	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

	  </form>
    </div>
  </div>
  </div>

  
</div>




<?php 
	$premios = new PremiosController();
	$premios -> guardarPremiosController();
	$premios -> borrarPremioController();

					

?>








</div>




<!-- end ruleta front -->






<div class="col-md-12">

<?php
if($_SESSION["rol"] == 0){

echo '

<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				  	<th>No.</th>
					<th>Fecha.</th>
					<th>Premio.</th>
			        <th>Nombre</th>
					<th>Correo</th>
					<th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
				  ';
					$verPremios = new PremiosController();
					$verPremios -> mostrarPremiosController();
					// $verPreguntas -> borrarPreguntaController();
					

				
                    
                 echo '   
                
                 
                  </tbody>
                  <tfoot>
                  <tr>
					<th>No.</th>
					<th>Fecha.</th>
					<th>Premio.</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
				</div>

				';
		}
	?>

		</div>
	</div>
</div>