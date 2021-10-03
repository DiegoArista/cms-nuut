<?php 


class PreguntasController{




    #Guardar pregunta 
   
    
    public function guardarEncuestaController(){
        //si el el campo de la pregunta esta lleno
        if(isset($_POST["respuesta1"])){
            $datosController =array(  
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "correo" => $_POST["correo"] );
           

            $respuesta = GestorPreguntaModel::guardarEncuestaModel($datosController, "encuestas");
         
            $idEncuesta = GestorPreguntaModel::consultarEncuestasModel("encuestas");
                if($idEncuesta["id"]== 0){
                    $NumEncuesta =  1;
                } else {
                    $NumEncuesta =  $idEncuesta["id"];
                }
           





              $numPreguntas = GestorPreguntaModel::numeroPrguntasModel("preguntas");
            $idPreguntas = count($numPreguntas);

            if(isset($_POST["idPregunta1"])){

          
            $pregunta1 = $_POST["idPregunta1"];
            $pregunta2 = $_POST["idPregunta2"];
            $pregunta3 = $_POST["idPregunta3"];
            $pregunta4 = $_POST["idPregunta4"];
            $pregunta5 = $_POST["idPregunta5"];
            $pregunta6 = $_POST["idPregunta6"];
            $pregunta7 = $_POST["idPregunta7"];



            $respuesta1 = $_POST["respuesta1"];
            $respuesta2 = $_POST["respuesta2"];
            $respuesta3 = $_POST["respuesta3"];
            $respuesta4 = $_POST["respuesta4"];
            $respuesta5 = $_POST["respuesta5"];
            $respuesta6 = $_POST["respuesta6"];
            $respuesta7 = $_POST["respuesta7"];
            $correo = $_POST["correo"];

    $arrayPreguntas = array(
        "pregunta" =>    $pregunta1,
        "pregunta" =>    $pregunta2,
        "pregunta" =>    $pregunta4,
        "pregunta" =>    $pregunta5,
        "pregunta" =>    $pregunta6,
        "pregunta" =>    $pregunta7);

        $arrayRespuestas = array(
            "respuesta" =>    $respuesta1,
            "respuesta" =>    $respuesta2,
            "respuesta" =>    $respuesta4,
            "respuesta" =>    $respuesta5,
            "respuesta" =>    $respuesta6,
            "respuesta" =>    $respuesta7);

       

    $respuestaR = GestorPreguntaModel::guardarRespuestasModel($NumEncuesta, $arrayPreguntas, $arrayRespuestas, $correo, "respuestas");  



           

 
            if($respuesta === "ok" && $respuestaR === "ok"){

               
             
                echo'<script>
                swal({
                    title: "¡Gracias por tomarte el tiempo de contestar esta encuesta!",
                    text: "Encuesta enviado correctamente.",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "encuestas"; 
                        }
                  });

                    </script>';

            }
            else{
                 echo $respuesta;
                  echo $respuestaR;
               
            }

        

           
          
          
        }       
     }



            
        

    }
     
              
                
  
               
         





      #-----GUARDAR RESPUESTAS EN BD ------------------
      public function guardarRespuestasController($datos){
        //pedimos al modelo con la clase DEL MODELO ejecute la funcion  esa enviando los kos datos en la variable $datos en la tabla slide
        
        
       // GestorPreguntaModel::actualizarOrdenModel($datos, "gallery_images");
            GestorPreguntaModel::guardarRespuestasModel($datos,  "respuestas");
        

        //  $respuesta = GestorPreguntaModel::seleccionarOrdenModel($datos, "gallery_images");
       
        //  foreach($respuesta as $row => $item){

        //     echo ' <li id="'.$item["id"].'" class="bloqueGaleria">
        //             <span class="fa fa-times eliminarFoto" ruta="'.$item["route"].'"></span>
        //             <a rel="grupo" href="'.substr($item["route"], 6).'">
        //             <img src="'.substr($item["route"], 6).'" class="handleImg">
        //             </a>
        //         </li>';

        // }


     



     }


































    #MOSTRAR ARTICULOS EN EL BACKEND

    public function mostrarPreguntasController(){
        $respuesta = GestorPreguntaModel::mostrarPreguntasModel("preguntas");

        foreach($respuesta as $row => $item){
            // echo $item["ruta"];
           
            echo '
            
            <tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["pregunta"].'</td>
                    <td>'.$item["fecha"].'</td>
                    <td>
                    <a href="#pregunta'.$item["id"].'" data-toggle="modal"><button type="button" class="btn btn-info editarPregunta "><i class="fas fa-pencil-alt"></i> </button></a>
                    <a href="index.php?action=encuestas&idBorrar='.$item["id"].'"><button class="btn btn-danger "><i class="fas fa-times"></i> </button></a>
                    
                    </td>
                </tr>
                
                <div id="pregunta'.$item["id"].'" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border:1px solid #eee;">
                                    <h3 class="modal-title">Editar Pregunta</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"  style="border:1px solid #eee;">

                                    <form  style="padding:0PX 10px;" method="post" class="text-center">
                                    <input type="hidden" name="idPregunta" value="'.$item["id"].'">
                                   
                                    
                                    <div class="form-group">
                                    
                                    <input name="editarPregunta" type="text"  value="'.$item["pregunta"].'"  class="form-control"  required>
                
                                    </div>
                
                                    
                
                                   
                
                                   
                
                                 
                                       



                                
                
                                    <div class="form-group text-center">

                                        <input type="submit" id="guardarPregunta" value="Actualizar Pregunta" class="btn btn-primary">

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





    #BORRAR PREGUNTA--------------------------------------------------

    public function borrarPreguntaController(){
        if(isset($_GET["idBorrar"])){
            $datosController =  $_GET["idBorrar"];
            $respuesta = GestorPreguntaModel::borrarPreguntaModel($datosController, "preguntas");
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "¡La pregunta borrada correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "encuestas"; 
                        }
                  });

                    </script>';

            }

        }

    }



    #ACTUALIZAR ARTICULO------------------------------
    public function editarPreguntaController(){

      
        //si el titulo esta lleno
        if(isset($_POST["editarPregunta"])){

            // //si editarImagen viene lleno
            // if(isset($_FILES["editarImagen"]["tmp_name"])){
            //     $imagen = $_FILES["editarImagen"]["tmp_name"];
            //     $aletorio = mt_rand(100,999);
            //     $ruta = "views/images/articulos/articulo".$aletorio.".jpg";
            //     $origen = imagecreatefromjpeg($imagen);
            //     $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
            //     imagejpeg($destino, $ruta);
            //     $borrar = glob("views/images/articulos/temp/*");
            //     //las borramos con un for each
            //     foreach($borrar as $file){
            //     //lo borramos del servidor ocn el metodo de php unlik()
            //     unlink($file);
            //     }

            // }
           
            // //si la ruta viene vacia es decir no se cambio la imagen
            // if($ruta == ""){

			// 	$ruta = $_POST["fotoAntigua"];

			// }

			// else{

			// 	unlink($_POST["fotoAntigua"]);

			// }


        

            //guardamos en un array los datos del formulario
            $datosController = array("id"=>$_POST["idPregunta"],
                                    "pregunta"=>$_POST["editarPregunta"],
                                    "user"=> $_SESSION["id"]                                   );
            //enviamos los datos obtenidos al modelo y recibimos una respuesta
            $respuesta = GestorPreguntaModel::editarPreguntaModel($datosController, "preguntas");
            
          
            
            
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "¡Pregunta actualizada correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "encuestas"; 
                        }
                  });

                    </script>';

                } else {
                    echo $respuesta;
                }


        }




    }

    











    #MOSTRAR preguntas a contestar

    public function contestarEncuestaController(){
        $respuesta = GestorPreguntaModel::mostrarPreguntasModel("preguntas");
        $idEncuesta = GestorPreguntaModel::consultarEncuestasModel("encuestas");
        foreach($respuesta as $row => $item){
         
           
            echo '


                <div class="card mb-2 ">
              
                    <h5 class="card-header text-center text-white">'.$item["pregunta"].'</h5>
                    <div class="card-body">
                      
                        <input class="respuestaPregunta" id="idPregunta"  type="hidden" name="idPregunta'.$item["id"].'" value="'.$item["id"].'" >
                      <input id="idEncuesta" type="hidden" name="idEncuesta" value="'.$idEncuesta["id"].'">
                      
                      
                      
           

            <div class="respuestas">
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="checkbox" id="cara1'.$item["id"].'" name="respuesta'.$item["id"].'" value="1">
                   
                    <label for="cara1'.$item["id"].'" class="custom-control-label">
                        <div class="caras cara1">
                            <i class="fas fa-angry"></i>
                        </div>
                    </label>
                </div>
           
        
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="checkbox" id="pregunta2'.$item["id"].'" name="respuesta'.$item["id"].'" value="2">
                    <label for="pregunta2'.$item["id"].'" class="custom-control-label">
                        <div class="caras cara2">
                            <i class="fas fa-frown"></i>
                        </div>
                    </label>
                </div>
        
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="checkbox" id="item3'.$item["id"].'" name="respuesta'.$item["id"].'" value="3">
                        <label for="item3'.$item["id"].'" class="custom-control-label">
                            <div class="caras cara3">
                                <i class="fas fa-meh"></i>
                            </div>
                        </label>
                </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="checkbox" id="cuestion4'.$item["id"].'" name="respuesta'.$item["id"].'" value="4">
                <label for="cuestion4'.$item["id"].'" class="custom-control-label">
                    <div class="caras cara4">
                        <i class="fas fa-smile"></i>
                    </div>
                </label>
            </div>
            <div class="custom-control custom-radio">
            <input class="custom-control-input" type="checkbox" id="encuesta5'.$item["id"].'" name="respuesta'.$item["id"].'" value="5">
                <label for="encuesta5'.$item["id"].'" class="custom-control-label">
                
                    <div class="caras cara5">
                        <i class="fas fa-grin-stars"></i>
                    </div>
                </label>
               
            </div>
        </div>
                    


                    </div>
                    </div>
                </div>

   
                 











            ';

        }
    }






    //   #-----ACTUALIZAR ORDEN DE KA GALERIA EN BD ------------------
    //   public function guardarOrdenController($datos){
    //     //pedimos al modelo con la clase DEL MODELO ejecute la funcion  esa enviando los kos datos en la variable $datos en la tabla slide
    //     $idEncuesta = GestorPreguntaModel::consultarEncuestasModel("encuestas");
    //     $EncuestaId =  $idEncuesta["id"];
    //     GestorPreguntaModel::actualizarOrdenModel($datos, $EncuestaId, "respuestas");
        

    //     //  $respuesta = GestorPreguntaModel::seleccionarOrdenModel($datos, "gallery_images");
       
    //     //  foreach($respuesta as $row => $item){

    //     //     echo ' <li id="'.$item["id"].'" class="bloqueGaleria">
    //     //             <span class="fa fa-times eliminarFoto" ruta="'.$item["route"].'"></span>
    //     //             <a rel="grupo" href="'.substr($item["route"], 6).'">
    //     //             <img src="'.substr($item["route"], 6).'" class="handleImg">
    //     //             </a>
    //     //         </li>';

    //     // }


    //  }


    
}