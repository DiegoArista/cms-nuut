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
	

	<?php
if($_SESSION["rol"] == 0){

echo '

<div class="form-group">
	 <button type="button" id="btnAgregarPregunta"  class="btn btn-primary mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Nueva Pregunta</button> 

</div>


';
		}
	?>


    <!-- general form elements -->
	<div class="card card-primary" id="agregarPregunta" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Pregunta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" name="pregunta" id="pregunta" placeholder="Escriba la pregunta">
                  </div>
	
                 
				 
				<!-- <div class="respuestas">
				  	<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="cara1" name="respuesta">
						<label for="cara1" class="custom-control-label">
							<div class="caras cara1">
								<i class="fas fa-angry"></i>
							</div>
						</label>
					</div>

					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="cara2" name="respuesta">
						<label for="cara2" class="custom-control-label">
							<div class="caras cara2">
								<i class="fas fa-frown"></i>
							</div>
						</label>
					</div>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="cara3" name="respuesta">
							<label for="cara3" class="custom-control-label">
								<div class="caras cara3">
									<i class="fas fa-meh"></i>
								</div>
							</label>
					</div>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="cara4" name="respuesta">
						<label for="cara4" class="custom-control-label">
							<div class="caras cara4">
								<i class="fas fa-smile"></i>
							</div>
						</label>
					</div>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="cara5" name="respuesta">
						<label for="cara5" class="custom-control-label">
							<div class="caras cara5">
								<i class="fas fa-grin-stars"></i>
							</div>
						</label>
					</div>

				</div> -->






				

				 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Crear Pregunta</button>
                </div>
              </form>

			  <?php 
				$crearArticulo = new PreguntasController();
				$crearArticulo -> guardarPreguntaController();

					?>

            </div>
            <!-- /.card -->






         
            <!-- /.card -->





<!-- end contestar encuesta -->
<?php
if($_SESSION["rol"] == 0){

echo '
			<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#preguntas" data-toggle="tab">Preguntas</a></li>
                
                  <li class="nav-item"><a class="nav-link" href="#respuestas" data-toggle="tab">Respuestas</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="preguntas">
                    <!-- tabla   -->
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				  	<th>No.</th>
			        <th>Pregunta</th>
			        <th>Fecha</th>
					<th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
				  ';
					$verPreguntas = new PreguntasController();
					$verPreguntas -> mostrarPreguntasController();
					$verPreguntas -> borrarPreguntaController();
					$verPreguntas -> editarPreguntaController();

				
                    
                 echo '   
                
                 
                  </tbody>
                  <tfoot>
                  <tr>
				  	<th>No.</th>
			        <th>Pregunta</th>
			        <th>Fecha</th>
					<th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
				</div>
                    <!-- /.tabla usuarios registrados -->
                  </div>
               

                  <div class="tab-pane" id="respuestas">
					<!-- tabla   -->
					<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No.</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Pregunta</th>
						<th>Respuesta</th>
					
						<th>Fecha</th>
						<th>Acciones</th>
						</tr>
						</thead>
						<tbody>

				  ';
				  	$verRespuestas = new RespuestasController();
					$verRespuestas -> mostrarRespuestasController();
					$verRespuestas -> borrarRespuestaController();
					$verRespuestas -> editarRespuestaController();

			  
				  
			   echo '  
 
			   </tbody>
			   <tfoot>
			   <tr>
					<th>No.</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Pregunta</th>
					<th>Respuesta</th>
					
					<th>Fecha</th>
					<th>Acciones</th>
			   </tr>
			   </tfoot>
			 </table>
			 </div>
				 <!-- /.tabla usuarios registrados -->
			   </div>
                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
      
			';
		}  else {
			echo "No tienes permisos para este módulo";
		}
	?>