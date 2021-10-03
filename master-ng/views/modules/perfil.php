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
		PERFIL       
======================================-->



        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
     
				  <img width="50px" src="<?php echo $_SESSION["photo"]  ?>" class="img-circle elevation-2" 
                       alt="imagen de perfil de usuario">
                </div>

                <h3 class="profile-username text-center">Hola <?php echo $_SESSION["usuario"]   ?>
				
				</h3>

                 <p class="text-muted text-center"><?php 
				if ($_SESSION["rol"] == 0) {
					echo 'Administrador';
				} else{
					echo 'Editor';
				}
			   ?> </p> 

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b> Email:  </b> <p><?php echo $_SESSION["email"]   ?></p>
                  </li>
                
                  
                </ul>









                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box 
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body 
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->



		  <?php

if ($_SESSION["rol"] == 0) {

    echo '

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Usuarios</a></li>
                
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Mi Cuenta</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- tabla usuarios registrados -->
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				  	<th>Usuario</th>
			        <th>Perfil</th>
			        <th>Email</th>
					<th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 ';
			
					$verPerfiles = new GestorPerfiles();
					$verPerfiles -> verPerfilController();
					$verPerfiles -> borrarPerfilController();

				echo '
                    
                 
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
				  	<th>Usuario</th>
			        <th>Perfil</th>
			        <th>Email</th>
					<th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
                    <!-- /.tabla usuarios registrados -->
                  </div>
               

                  <div class="tab-pane" id="settings">


	


<!--=====================================
			CREAR PERFIL       
======================================-->

<div id="crearPerfil">
			 
				

				<button type="button" id="registrarPerfil"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-user-plus"></i> Nuevo usuario</button>
				<button type="button" id="btnEditarPerfil"  class="btn btn-info mb-3"> <i class="fas fa-user-edit"></i> Editar cuenta</button>
			

				<form id="formularioPerfil" style="display:none;" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="form-group row">
				  <label for="inputName" class="col-sm-2 col-form-label">Nombre de usuario</label>
				  <div class="col-sm-10">
					<input name="nuevoUsuario" type="text" placeholder="Ingrese el nombre de Usuario hasta 10 caracteres" maxlength="10" class="form-control"  required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
				  <div class="col-sm-10">
					<input name="nuevoEmail" type="email" placeholder="Ingrese el Correo Electrónico" class="form-control" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="rol" class="col-sm-2 col-form-label">Rol</label>
				  <div class="col-sm-10">
				  <select name="nuevoRol" class="form-control" required>

				  <option value="">Seleccione el Rol</option>
				  <option value="0">Administrador</option>
				  <option value="1">Mesero</option>
				  <option value="2">Recepcionista</option>

			  </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="inputExperience" class="col-sm-2 col-form-label">Contraseña</label>
				  <div class="col-sm-10">
					<input name="nuevoPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>
				  </div>
				</div>
				<div class="form-group row">
				<label for="exampleInputFile">Foto de perfil</label>
				<div class="input-group">
				  <div class="custom-file">
					<input type="file" class="custom-file-input"id="subirFotoPerfil">
					<label class="custom-file-label" for="fotoPerfil">Seleccionar archivo...</label>
				  </div>
				  <div class="input-group-append">
					<span class="input-group-text">Subir</span>
				  </div>

				</div>
				<p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>
				
				
				 
				</div>
				<div class="form-group row">
				  <div class="offset-sm-2 col-sm-10">
					<div class="checkbox">
					  <label>
						<!-- <input type="checkbox"> I agree to the <a href="#">terms and conditions</a> -->
					  </label>
					</div>
				  </div>
				</div>
				<div class="form-group row">
				  <div class="offset-sm-2 col-sm-10">
				  <input type="submit" id="guardarPerfil" value="Guardar Perfil" class="btn btn-primary">

				  </div>
				</div>
			  </form>

				<form >
					
				
			

				</form>';

					$crearPerfil = new GestorPerfiles();
					$crearPerfil -> guardarPerfilController();
					$crearPerfil -> editarPerfilController();
					
				}
					?>













		
<!--=====================================
			EDITAR PERFIL       
======================================-->


<div id="formEditarPerfil"  style="display:none;">
			 
				
				<form  style="padding:20px;" method="post" enctype="multipart/form-data">
					<input type="hidden" name="idPerfil" value="<?php echo $_SESSION["id"] ?>">
					<input type="hidden" name="actualizarSesion" value="ok">
					<div class="form-group">
					
					<input name="editarUsuario" type="text"  value="<?php echo $_SESSION["usuario"]   ?>"  class="form-control"  required>

					</div>

					<div class="form-group">

						<input name="editarPassword" type="password" placeholder="Ingrese la contraseña con 10 caracteres"  maxlength="10"   class="form-control" required>

					</div>

					<div class="form-group">

						<input name="editarEmail" type="email" value="<?php echo $_SESSION["email"]   ?>" class="form-control" required>

					</div>

					<div class="form-group">

					<select name="editarRol" class="form-control" required>

						<option value="">Seleccione el Rol</option>
						<option value="0">Administrador</option>
						<option value="1">Mesero</option>
						<option value="2">Recepcionista</option>

					</select>

					</div>

					<div class="form-group text-center">
					<img src="<?php   echo $_SESSION["photo"]  ?>" alt="Imagen de usuario" width="20%" class="img-circle">
						
					

					
						<div class="custom-file">
							
							<input type="file" class="custom-file-input" id="cambiarFotoPerfil">
							<label class="custom-file-label" for="fotoPerfil">Seleccionar archivo...</label>
						</div>
						
						<input type="hidden" name="editarPhoto" value="<?php echo $_SESSION["photo"]  ?>">

						<p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>

					</div>

				<input type="submit" id="editarPerfil" value="Actualizar Perfil" class="btn btn-primary">

				</form>



</div>





                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->








  	<!--====  Fin de PERFIL  ====-->
