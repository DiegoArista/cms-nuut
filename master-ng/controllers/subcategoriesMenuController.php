<?php

class subcategoriesMenuController{

    #Guardar categoria 
    public function guardarSubcategoriasController(){
   
        if(isset($_POST["subcategoria"])){
            $datosController =array(
                
                "categoria" => $_POST["idCategory"],
                "subcategoria" => $_POST["subcategoria"],
                "user" =>    $_SESSION["id"]
               
               
            );
               $respuesta =  SubcategoriesModel::guardarSubcategoriaModel($datosController, "menu_subcategories");
                if($respuesta === "ok"){
                    echo'<script>
                    swal({
                        title: "¡Correcto!",
                        text: "¡Subategoría creada correctamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                window.location = "menu"; 
                            }
                      });

                        </script>';

                }
                else{
                    echo $respuesta;
                }
        } 
    }





 #MOSTRAR CATEGORIAS
 public function mostrarCategoriasController(){
    $respuesta = SubcategoriesModel::mostrarCategoriasModel("menu_categories");

    foreach($respuesta as $row => $item){
     
       
        echo '<option value="'.$item["id"].'">'.$item["category"].'</option>                     
        
        ';

    }
}













    #MOSTRAR SUBCATEGORIAS

    public function mostrarSubcategoriasController(){
        $respuesta = SubcategoriesModel::mostrarSubcategoriasModel("menu_categories", "menu_subcategories");

        foreach($respuesta as $row => $item){
            // echo $item["ruta"];
           
            echo '
            
            <tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["category"].'</td>
                    <td>'.$item["subcategory"].'</td>
                    <td>'.$item["date_creation"].'</td>
                    <td>
                    <a href="#subcategoria'.$item["id"].'" data-toggle="modal"><button type="button" class="btn btn-dark editarSubcategoria "><i class="fas fa-pencil-alt"></i> </button></a>
                    <a href="index.php?action=menu&idBorrarSubcat='.$item["id"].'"><button class="btn btn-danger "><i class="fas fa-times"></i> </button></a>
                    
                    </td>
                </tr>
                
                <div id="subcategoria'.$item["id"].'" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border:1px solid #eee;">
                                    <h3 class="modal-title">Editar Subcategoría</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"  style="border:1px solid #eee;">

                                    <form  style="padding:0PX 10px;" method="post" class="text-center">
                                    <input type="hidden" name="idSubcategoria" value="'.$item["id"].'">
                                   
                                    <div class="form-group col-sm-6 col-md-6">
                                    <label for="">Categoría Padre*</label>
                                    <select class="custom-select" name="editarCategory" required>
                                  
                                  
                                   
';
$respuestaCate = SubcategoriesModel::mostrarCategoriasModel("menu_categories");
    foreach($respuestaCate as $row1 => $item1){ 
     
       
        echo '
        
        <option value="'.$item1["id"].'" '.   ( $item["id_category"] == $item1["id"] ? "selected" : "" ).' >'.$item1["category"].'</option>                     
        
        '; 

    } ;  echo '
                                   
                                    </select>
                                  </div>
                                    <div class="form-group">
                                    
                                    <input name="editarSubcategoria" type="text"  value="'.$item["subcategory"].'"  class="form-control"  required>
                
                                    </div>
                
                                    <div class="form-group text-center">

                                        <input type="submit" id="guardarCategoria" value="Guardar Cambios" class="btn btn-dark">

                                    </div>
                
                                </form>
                                   
                                </div>
                                <div class="modal-footer"  style="border:1px solid #eee">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                    </div>
                </div>
            
            ';

        }
    }










    #BORRAR CATEGORIA--------------------------------------------------

    public function borrarSubcategoriaController(){
        if(isset($_GET["idBorrarSubcat"])){
            $datosController =  $_GET["idBorrarSubcat"];
            $respuesta = SubcategoriesModel::borrarSubcategoriaModel($datosController, "menu_subcategories");
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡Eliminación!",
                    text: "¡Subcategoría eliminada correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "menu"; 
                        }
                  });

                    </script>';

            }

        }

    }



    #ACTUALIZAR CATEGORIA------------------------------
    public function editarSubcategoriaController(){
        if(isset($_POST["editarSubcategoria"])){

            $datosController = array("id"=>$_POST["idSubcategoria"],
                                    "categoria"=>$_POST["editarCategory"],
                                    "subcategoria"=>$_POST["editarSubcategoria"],
                                    "user"=> $_SESSION["id"]);
            $respuesta = SubcategoriesModel::editarSubcategoriaModel($datosController, "menu_subcategories");
            
            
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "¡Cambios guardados correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "menu"; 
                        }
                  });

                    </script>';

                } else {
                    echo $respuesta;
                }


        }




    }

    



}









