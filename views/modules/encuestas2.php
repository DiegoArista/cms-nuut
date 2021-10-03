<?php include "views/modules/header-menu2.php"; ?>




<div class="  encuesta-container">
	<div class="container mt-5 mb-5">


	


			<div class="card card-primary  mt-5 encuestas" id="contestarPreguntas " >
				<div class="card-header  bg-light">
					<h3 class="card-title text-center">Encuesta</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form method="post">
				<?php
					$verEncuesta = new PreguntasController();
					$verEncuesta -> contestarEncuestaController();
					$verEncuesta -> guardarEncuestaController();
				
					// $verEncuesta -> guardarRespuestasController();
				

					?>



				<div class="card-footer d-flex justify-content-center">

					<button type="button" data-toggle="modal" data-target="#encuestadoModal" class="btn btn-primary bg-light text-dark pl-3 pr-3">Enviar Encuesta</button>
				</div>

<!-- Modal -->
<div class="modal fade" id="encuestadoModal" tabindex="-1" role="dialog" aria-labelledby="encuestadoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="encuestado">Guardar Encuestado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	 
			<div class="form-group">
				<label for="nombre">Nombre*</label>
				<input type="text" class="form-control" id="nombre"  name="nombre"  placeholder="Escribe tu nombre" required>
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos*</label>
				<input type="text" class="form-control" id="apellidos"  name="apellido" placeholder="Escribe tus apellidos" required>
			</div>
			<div class="form-group">
				<label for="email">Correo*</label>
				<input type="email" class="form-control" id="email"  name="correo" placeholder="Escribe tu correo" required>
			</div>
			
	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary " id="guardarEncuesta">Guardar</button>
		<!-- <button type="button" class="btn btn-primary" id="guardar">Ver</button> -->
      </div>

	
    </div>
  </div>
 

  </form>

 		
			</div>
            <!-- /.card-body -->
	</div>
</div>

</div>
<?php
  
	?>	
</div>
<?php include "views/modules/footer2.php"; ?>