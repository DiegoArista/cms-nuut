<?php

class CategoriesController{

    // function cargarGrupo(valor) {
    //     var element = document.getElementById("cbxid_asignacion");
    //     var datos = {
    //          "id_carrera": $("#cbxid_carrera").val(),
    //     }
    
    // $.ajax({
    //     type: 'post',
    //     url: 'includes/getGrupo.php',
    //     data: datos,
    //     dataType: 'json',
    //     error: function () {
    //         alert("Error en la petición a la base de datos");
    //     },
    //     success: function (data) {
    //         element.innerHTML += "<option value=''>Seleccione el grupo</option>";
    //         $.each(data, function (id, value) {
    //             element.innerHTML += "<option value='" + id + "'>" + value + "</option>";
    //         });
    //         //Se envia al elemento el valor a seleccionar
    //         element.value = valor;
    //     }
    // });
    // return false;
    // }











    #Guardar categoria 
    public function guardarCategoriaController(){
   
        if(isset($_POST["categoria"])){
            $datosController =array(
                "categoria" => $_POST["categoria"],
                "user" =>    $_SESSION["id"]
               
               
            );
               $respuesta =  CategoriesModel::guardarCategoriaModel($datosController, "menu_categories");
                if($respuesta === "ok"){
                    echo'<script>
                    swal({
                        title: "¡Correcto!",
                        text: "¡Categoría creada correctamente!",
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
        $respuesta = CategoriesModel::mostrarCategoriasModel("menu_categories");

        foreach($respuesta as $row => $item){
            // echo $item["ruta"];
           
            echo '
            
            <tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["category"].'</td>
                    <td>'.$item["date_creation"].'</td>
                    <td>
                    <a href="#categoria'.$item["id"].'" data-toggle="modal"><button type="button" class="btn btn-info editarCategoria "><i class="fas fa-pencil-alt"></i> </button></a>
                    <a href="index.php?action=menu&idBorrar='.$item["id"].'"><button class="btn btn-danger "><i class="fas fa-times"></i> </button></a>
                    
                    </td>
                </tr>
                
                <div id="categoria'.$item["id"].'" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border:1px solid #eee;">
                                    <h3 class="modal-title">Editar Categoría</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"  style="border:1px solid #eee;">

                                    <form  style="padding:0PX 10px;" method="post" class="text-center">
                                    <input type="hidden" name="idCategoria" value="'.$item["id"].'">
                                   
                                    
                                    <div class="form-group">
                                    
                                    <input name="editarCategoria" type="text"  value="'.$item["category"].'"  class="form-control"  required>
                
                                    </div>
                
                                    <div class="form-group text-center">

                                        <input type="submit" id="guardarCategoria" value="Guardar Cambios" class="btn btn-info">

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

    public function borrarCategoriaController(){
        if(isset($_GET["idBorrar"])){
            $datosController =  $_GET["idBorrar"];
            $respuesta = CategoriesModel::borrarCategoriaModel($datosController, "menu_categories");
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡Eliminación!",
                    text: "¡Categoría eliminada correctamente!",
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
    public function editarCategoriaController(){
        if(isset($_POST["editarCategoria"])){

            $datosController = array("id"=>$_POST["idCategoria"],
                                    "categoria"=>$_POST["editarCategoria"],
                                    "user"=> $_SESSION["id"]);
            $respuesta = CategoriesModel::editarCategoriaModel($datosController, "menu_categories");
            
            
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









