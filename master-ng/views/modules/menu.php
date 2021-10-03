<?php 
session_start();
//Validamos la sesion si es false nos redirige al formualrio de inicio de sesion
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/top.php";

?>	


<div class="form-group">
	<button type="button" id="btnAgregarCategoria"  class="btn btn-info mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Nueva Categoría</button>
	<button type="button" id="btnAgregarSubcategoria"  class="btn btn-dark mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Nueva Subcategoría</button>
	<button type="button" id="btnAgregarContenido"  class="btn btn-primary mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Agregar Menú</button>

</div>



    <!-- general form elements -->
	<div class="card card-info" id="agregarCategoria" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Categoría Menú Digital</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Nombre de la categoría" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Crear Categoría</button>
                </div>
              </form>

			  <?php 
				$crearCategoria = new CategoriesController();
				$crearCategoria -> guardarCategoriaController();

					?>

            </div>
 <!-- end general form elements -->




   <!-- general form elements -->
   <div class="card card-dark" id="agregarSubcategoria" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Subcategoría Menú Digital</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="row">
                    <!-- select categories -->
                    
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="">Categoría Padre*</label>
                        <select class="custom-select" name="idCategory" required>
                        <option value="">- Selecciona -</option>
                        <?php 
                        $MostrarCategorias = new subcategoriesMenuController();
                        $MostrarCategorias -> mostrarCategoriasController();

                        ?>
                 
                        </select>
                      </div>
                  
                  <div class="form-group col-sm-6 col-md-8">
                  <label for="">Nombre*</label>
                    <input type="text" class="form-control" name="subcategoria" id="subcategoria" placeholder="Nombre de la subcategoría" required>
                  </div>
                </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Crear Subcategoría</button>
                </div>
              </form>

			  <?php 
				$crearSubcategoria = new subcategoriesMenuController();
				$crearSubcategoria -> guardarSubcategoriasController();

					?>

            </div>
 <!-- end general form elements -->





   <!-- general form elements -->
   <div class="card card-primary" id="agregarContenido" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Nuevo Menú Digital</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                 
             
                  
                  
                  
                  <div class="col-md-12">
                    <h1>Título</h1>

                 
                  <div class="row">

                  
                  <p>Selecciona la categoría y la subcategoría a la que pertenece el nuevo menú.</p>
                  
                    <div class="col-sm-6">
                      <!-- select categories -->
                    
                      <div class="form-group">
                        <label>Categoría*</label>
                        <select class="custom-select">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- select subcategories-->
                      <div class="form-group">
                        <label>Subcategoría*</label>
                        <select class="custom-select">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                 
                 
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripción que va abajo del título"></textarea>
                      </div>
                    </div>
                 





                    <div class="form-group">
                    <button type="button" id="btnAgrega"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Título </button>
                <button type="button" id="btnAgregarSuegoria"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Descripción </button>
       
             
              </div>

          </div>

            <hr>
              <div class="row">
              <h1>Columnas</h1>


              <div class="form-group">
                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Columna</button>

                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Subtítulo</button>
                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Descripción Subtítulo</button>
                <button type="button" id="btnAgregarnido"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i>  Párrafo</button>
                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Imagen</button>
              </div>





                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Subtítulo</label>
                        <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Subtítulo...por ejemplo, Del Campo.">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripción..."></textarea>
                      </div>
                    </div>
                   
</div>



                  <p>Más Ajustes de columna</p>

                  <div class="row">
                  <div class="col-sm-4">
                 
                      <!-- select subcategories-->
                      <div class="form-group">
                        <label for="">Ancho de columna:</label>
                        <select class="custom-select">
                          <option>Por defecto</option>
                          <option>Completo</option>
                          <option>33%</option>
                         
                        </select>
                      </div>
                    </div>

                 
                  
                    </div>
                    <!-- end /row -->






                    <hr>
              <div class="row">
                <h1>Listas</h1>

                <div class="form-group">
                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Lista Sencilla</button>
                <button type="button" id="btnAgrega"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Lista Doble</button>

                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Descripción Extra</button>
                <button type="button" id="btnAgregarnido"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i>  Párrafo</button>

              </div>



              <h3>Lista Sencilla</h3>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Lista:</label>
                        <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Escribe la opcion del menú... por ejemplo Tacos de arrachera.">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Piezas/Gramos:</label>
                        <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="ejemplo, 2 Piezas 120gr">
                      </div>
                    </div>


               <div class="col-sm-6">
                <div class="form-group">
                  <label>Precio:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Precio, ejemplo, 110">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Describe la opción del menú... por ejemplo, Salsa molcajeteada, frijoles de la casa y guacamole."></textarea>
                      </div>
                    </div>








<h3>Lista Doble</h3>

<div class="col-sm-12">
  <h4>1. Lista Principal</h4>

  <div class="form-group">
                <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Opcion a lista Principal</button>
                <button type="button" id="btnAgrega"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Opción a Lista Doble</button>
                <button type="button" id="btnAgrega"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Nota</button>
              
              </div>
  <div class="form-group">
    <label>Lista:</label>
    <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Escribe la opcion del menú... por ejemplo Tacos de arrachera.">
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label>Piezas/Gramos:</label>
    <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="ejemplo, 2 Piezas 120gr">
  </div>
</div>


<div class="col-sm-6">
<div class="form-group">
<label>Precio:</label>

<div class="input-group">
<div class="input-group-prepend">
  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
</div>
<input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Precio, ejemplo, 110">
</div>
<!-- /.input group -->
</div>
<!-- /.form group -->
</div>

<div class="col-sm-12">
  <div class="form-group">
    <label>Descripción</label>
    <textarea class="form-control" rows="3" placeholder="Describe la opción del menú... por ejemplo, Salsa molcajeteada, frijoles de la casa y guacamole."></textarea>
  </div>
</div>







<div class="col-sm-12">
  <h4>2. Lista Secundaria</h4>
  <div class="form-group">
    <label>Lista:</label>
    <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Escribe la opcion del menú... por ejemplo Tacos de arrachera.">
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label>Piezas/Gramos:</label>
    <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="ejemplo, 2 Piezas 120gr">
  </div>
</div>


<div class="col-sm-6">
<div class="form-group">
<label>Precio:</label>

<div class="input-group">
<div class="input-group-prepend">
  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
</div>
<input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Precio, ejemplo, 110">
</div>
<!-- /.input group -->
</div>
<!-- /.form group -->
</div>

<div class="col-sm-12">
  <div class="form-group">
    <label>Descripción</label>
    <textarea class="form-control" rows="3" placeholder="Describe la opción del menú... por ejemplo, Salsa molcajeteada, frijoles de la casa y guacamole."></textarea>
  </div>
</div>




<div class="col-sm-12">
  <div class="form-group">
    <label>Nota</label>
    <textarea class="form-control" rows="3" placeholder="Escribe una nota..."></textarea>
  </div>
</div>


                    </div>
                    <!-- end /row -->


              <hr>
              <div class="row">
                <h1>Opciones Avanzadas</h1>

                  <div class="form-group">
                    <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Lista con fondo 1</button>
                    <button type="button" id="btnAgrega"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Lista con fondo 2</button>

                    <button type="button" id="btnAgregar"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Lista de opción</button>
                    <button type="button" id="btnAgregarnido"  class="btn btn-default mb-3 mr-4"> <i class="fas fa-plus-circle"></i> Lista con 2 opciones</button>

                </div>



              </div>







<hr>

<h1>Imagen</h1>
              <div class="row">
              

                <div class="form-group col-md-12">
                    <label for="customFile">Imagen Destacada:</label>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                      <!-- select subcategories-->
                      <div class="form-group">
                        <label>Ubicación*</label>
                        <select class="custom-select">
                          <option>Al final de la columna</option>
                          <option>En una columna</option>
                         
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- select subcategories-->
                      <div class="form-group">
                        <label>Estilo*</label>
                        <select class="custom-select">
                          <option>Cuadrada</option>
                          <option>Horizontal</option>
                          <option>Vertical</option>
                        </select>
                      </div>
                    </div>



              </div>

















                  
                    </div>
                    <!-- end col-md-12 -->
                  
                  
                  
                  
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Crear Menú</button>
                </div>
              </form>

			  <?php 
				// $crearCategoria = new categoriesMenuController();
				// $crearCategoria -> guardarCategoriasController();

					?>

            </div>
 <!-- end general form elements -->








<!-- panel de administarcion -->

<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#categorias" data-toggle="tab">Categorías</a></li>
                
                  <li class="nav-item"><a class="nav-link" href="#subcategorias" data-toggle="tab">Subcategorías</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="categorias">
                    <!-- tabla   -->
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				  	<th>No.</th>
			        <th>Categoría</th>
			        <th>Fecha</th>
					<th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
				  <!-- '; -->
				  <?php



					$verCategorias = new CategoriesController();
					$verCategorias -> mostrarCategoriasController();
					$verCategorias -> borrarCategoriaController();
					$verCategorias -> editarCategoriaController();

				?>
<!--                     
                 echo '    -->
                
                 
                  </tbody>
                  <tfoot>
                  <tr>
				  	<th>No.</th>
			        <th>Categoría</th>
			        <th>Fecha</th>
					<th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
				</div>
                    <!-- /.tabla usuarios registrados -->
                  </div>
               

                  <div class="tab-pane" id="subcategorias">
					<!-- tabla   -->
					<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
            <th>No.</th>
            <th>Categoría</th>
			      <th>Subcategoría</th>
			      <th>Fecha</th>
					  <th>Acciones</th>
						</tr>
						</thead>
						<tbody>

				  <!-- -->
				 <?php 
         
         
         //  ('.$item["id"].' == '.$item["id_category"].' ? 'selected' : '' )
          $verSubcategorias = new subcategoriesMenuController();
					$verSubcategorias -> mostrarSubcategoriasController();
					$verSubcategorias -> borrarSubcategoriaController();
					$verSubcategorias -> editarSubcategoriaController(); 

			  ?>
				  
			   <!-- echo '   -->
 
			   </tbody>
			   <tfoot>
			   <tr>
            <th>No.</th>
            <th>Categoría</th>
			      <th>Subcategoría</th>
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
<!-- end panel de administracion -->



<?php 

include "views/modules/footer.php";
?>	