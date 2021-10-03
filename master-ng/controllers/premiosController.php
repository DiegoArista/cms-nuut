<?php 


class PremiosController{

  

    #Guardar premio 
    public function guardarPremiosController(){
        //si el el campo de la pregunta esta lleno
        if(isset($_POST["nombre"])){
           
          
          
        
            $datosController =array(
                "premio" => $_POST["resultadoPremio"],
                "nombre" =>  $_POST["nombre"],
                "apellido" => $_POST["apellidos"],
                "correo" => $_POST["email"],
                "user" => $_SESSION["id"]      
            );
               $respuesta =  PremiosModel::guardarPremiosModel($datosController, "premios");
                if($respuesta === "ok"){
                    echo'<script>
                    swal({
                        title: "¡Correcto!",
                        text: "¡Premio guardado correctamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                window.location = "ruleta"; 
                            }
                      });

                        </script>';

                }
                else{
                    echo $respuesta;
                }
        } 
    }








    #MOSTRAR ARTICULOS EN EL BACKEND

    public function mostrarPremiosController(){
        $respuesta = PremiosModel::mostrarPremiosModel("premios");

        foreach($respuesta as $row => $item){
            // echo $item["ruta"];
           
            echo '
            
            <tr>
                    <td>'.$item["id"].'</td>
                   
                    <td>'.$item["fecha"].'</td>
                    <td>'.$item["premio"].'</td>
                    <td>'.$item["nombre"].' '.$item["apellido"].'</td>
                    <td>'.$item["correo"].'</td>
                
                    <td>
                    <a href="#premio'.$item["id"].'" data-toggle="modal"><button type="button" class="btn btn-info editarPregunta "><i class="fas fa-pencil-alt"></i> </button></a>
                    <a href="index.php?action=ruleta&idBorrar='.$item["id"].'"><button class="btn btn-danger "><i class="fas fa-times"></i> </button></a>
                    
                    </td>
                </tr>
                
                <div id="premio'.$item["id"].'" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border:1px solid #eee;">
                                    <h3 class="modal-title">Editar Premio</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"  style="border:1px solid #eee;">

                                    <form  style="padding:0PX 10px;" method="post" class="text-center">
                                    <input type="hidden" name="idPremio" value="'.$item["id"].'">
                                    <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="'.$item["nombre"].'"  name="editarNombre" >
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" value="'.$item["apellido"].'"  name="editarApellidos" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control" id="email" value="'.$item["correo"].'" name="editarEmail" >
                                </div>
                                    
                           
                
                                    
                
                                   
                
                                   
                
                                 
                                       



                                
                
                                    <div class="form-group text-center">

                                        <input type="submit" id="guardarPremio" value="Actualizar" class="btn btn-primary">

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





    #BORRAR PREMIO--------------------------------------------------

    public function borrarPremioController(){
        if(isset($_GET["idBorrar"])){
            $datosController =  $_GET["idBorrar"];
            $respuesta = PremiosModel::borrarPremioModel($datosController, "premios");
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "¡Registro borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "ruleta"; 
                        }
                  });

                    </script>';

            }

        }

    }



    #ACTUALIZAR ARTICULO------------------------------
    public function editarPremioController(){

        //si el titulo esta lleno
        if(isset($_POST["editarNombre"])){


            //guardamos en un array los datos del formulario
            $datosController = array("id"=>$_POST["idPremio"],
                                    "nombre"=>$_POST["editarNombre"],
                                    "apellido"=>$_POST["editarApellidos"],
                                    "correo"=>$_POST["editarEmail"],
                                    "user"=> $_SESSION["id"]);
            //enviamos los datos obtenidos al modelo y recibimos una respuesta
            $respuesta = PremiosModel::editarPremioModel($datosController, "premios");
            
          
            
            
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "Premio actualizado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "ruleta"; 
                        }
                  });

                    </script>';

                } else {
                    echo $respuesta;
                }


        }




    }

    


        //  #-----ACTUALIZAR ORDEN DE LOS ARTICULOS EN BD ------------------
        //  public function actualizarOrdenController($datos){
        //     //ENVIAMOS al modelo con la clase GestorArticuloModel ejecute la funcion  actualizarOrdenModel
        //     GestorArticuloModel::actualizarOrdenModel($datos, "articulos");
            
    
        //      $respuesta = GestorArticuloModel::seleccionarOrdenModel("articulos");
           
        //      foreach($respuesta as $row => $item){
                            
        //         echo ' <li id="'.$item["id"].'" class="bloqueArticulo">
        //                 <span class="handleArticle">
        //                 <a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">   
        //                 <i class="fa fa-times btn btn-danger "></i>
        //                 </a>
        //                 <i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
        //                 </span>
        //                 <img src="'.$item["ruta"].'" class="img-thumbnail">
        //                 <h1>'.$item["titulo"].'</h1>
        //                 <p>'.$item["introduccion"].'</p>
        //                 <input type="hidden" value="'.$item["contenido"].'">

        //                 <a href="#articulo'.$item["id"].'" data-toggle="modal">
        //                 <button class="btn btn-default">Leer Más</button>
        //                 </a>

        //                 <hr>

        //             </li>


        //             <div id="articulo'.$item["id"].'" class="modal fade">
      
        //                     <div class="modal-dialog modal-content">
                        
        //                             <div class="modal-header" style="border:1px solid #eee">
                                    
        //                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
        //                                 <h3 class="modal-title">'.$item["titulo"].'</h3>
                                    
        //                             </div>

        //                         <div class="modal-body" style="border:1px solid #eee">
                                    
        //                             <img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
        //                             <p class="parrafoContenido">'.$item["contenido"].'</p>
                                        
        //                         </div>

        //                         <div class="modal-footer" style="border:1px solid #eee">
                                    
        //                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    
        //                         </div>

        //                     </div>

        //             </div>';
    
        //     }
    
    
        //  }










    #MOSTRAR preguntas a contestar

    public function contestarEncuestaController(){
        $respuesta = GestorPreguntaModel::mostrarPreguntasModel("preguntas");

        foreach($respuesta as $row => $item){
            // echo $item["ruta"];
           
            echo '
            <div class="card card-dark" id="contestarPreguntas" >
              <div class="card-header">
                <h3 class="card-title">Encuesta</h3>
              </div>
            <div class="card-body">
                       
                <div class="form-group">
                    <label for="pregunta">'.$item["pregunta"].'</label>
                    <input type="hidden" name="idPregunta" id="'.$item["id"].'" >
                </div>

                
                
                <div class="respuestas">
            



            














                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="cara1'.$item["id"].'" name="respuesta">
                        <label for="cara1'.$item["id"].'" class="custom-control-label">
                            <div class="caras cara1">
                                <i class="fas fa-angry"></i>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="pregunta2'.$item["id"].'" name="respuesta">
                        <label for="pregunta2'.$item["id"].'" class="custom-control-label">
                            <div class="caras cara2">
                                <i class="fas fa-frown"></i>
                            </div>
                        </label>
                    </div>
                </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="item3'.$item["id"].'" name="respuesta">
                            <label for="item3'.$item["id"].'" class="custom-control-label">
                                <div class="caras cara3">
                                    <i class="fas fa-meh"></i>
                                </div>
                            </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="cuestion4'.$item["id"].'" name="respuesta">
                        <label for="cuestion4'.$item["id"].'" class="custom-control-label">
                            <div class="caras cara4">
                                <i class="fas fa-smile"></i>
                            </div>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="encuesta5'.$item["id"].'" name="respuesta">
                        <label for="encuesta5'.$item["id"].'" class="custom-control-label">
                            <div class="caras cara5">
                                <i class="fas fa-grin-stars"></i>
                            </div>
                        </label>
                    </div>

                </div>
            </div>
       
        </div>     
            ';

        }
    }







    
}