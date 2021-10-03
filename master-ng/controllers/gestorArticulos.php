<?php 


class GestorArticulos{

    #mostrar imagen ------------------

    public function mostrarImagenController($datos){
        list($ancho, $alto) = getimageSize($datos);

        if($ancho < 800 || $alto < 400){
            echo 0;

        }
        else {
            $aletorio = mt_rand(100,999);
            $ruta = "../../views/images/articulos/temp/articulo".$aletorio.".jpg";
            // imagecreatefromjpeg() creamos un nuevo archivo con la fucnion de php apartir de un archivo existente 
            $origen = imagecreatefromjpeg($datos);
            //imagecrop() recorta una imagen usando las coordenadas, el tamaño, x y y, ancho y alto
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
            //propiedad o método de php imagejpeg() manejamos el translado del temporal a la ruta deseada (subida al servidor)
            imagejpeg($destino, $ruta);
            echo $ruta;
        
       
        }



    }


    #Guardar datos del articulo 
    public function guardarArticuloController(){
        //si el titulo del articulo esta lleno
        if(isset($_POST["tituloArticulo"])){
            //guardamos en la variable imagen lo que trae el archivo temporal
            $imagen = $_FILES["imagen"]["tmp_name"];
            //con el metodo glob() de phpp borramos todas as imagens que estan en la ruta temporal
            $borrar = glob("views/images/articulos/temp/*");
            //las borramos con un for each
            foreach($borrar as $file){
                //lo borramos del servidor ocn el metodo de php unlik()
                unlink($file);

            }



            $aletorio = mt_rand(100,999);
            $ruta = "views/images/articulos/articulo".$aletorio.".jpg";
            $origen = imagecreatefromjpeg($imagen);
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
            imagejpeg($destino, $ruta);
        
            $datosController =array(
                "titulo" => $_POST["tituloArticulo"],
                "introduccion" => $_POST["introArticulo"]."...",
                "ruta" => $ruta,
                "contenido" => $_POST["contenidoArticulo"]
            );
               $respuesta =  GestorArticuloModel::guardarArticuloModel($datosController, "articulos");
                if($respuesta === "ok"){
                    echo'<script>
                    swal({
                        title: "¡OK!",
                        text: "¡El artículo se ha sido creado correctamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                window.location = "articulos"; 
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

    public function mostrarArticulosController(){
        $respuesta = GestorArticuloModel::mostrarArticulosModel("articulos");

        foreach($respuesta as $row => $item){
            // echo $item["ruta"];
           
            echo ' <li id="'.$item["id"].'" class="bloqueArticulo">
                        <span class="handleArticle">
                        <a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">   
                        <i class="fa fa-times btn btn-danger "></i>
                        </a>
                        <i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
                        </span>
                        <img src="'.$item["ruta"].'" class="img-thumbnail">
                        <h1>'.$item["titulo"].'</h1>
                        <p>'.$item["introduccion"].'</p>
                        <input type="hidden" value="'.$item["contenido"].'">

                        <a href="#articulo'.$item["id"].'" data-toggle="modal">
                        <button class="btn btn-default">Leer Más</button>
                        </a>

                        <hr>

                    </li>


                    <div id="articulo'.$item["id"].'" class="modal fade">
      
                            <div class="modal-dialog modal-content">
                        
                                    <div class="modal-header" style="border:1px solid #eee">
                                    
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">'.$item["titulo"].'</h3>
                                    
                                    </div>

                                <div class="modal-body" style="border:1px solid #eee">
                                    
                                    <img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
                                    <p class="parrafoContenido">'.$item["contenido"].'</p>
                                        
                                </div>

                                <div class="modal-footer" style="border:1px solid #eee">
                                    
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    
                                </div>

                            </div>

                    </div>
                    ';

        }
    }





    #BORRAR ARTICULO--------------------------------------------------

    public function borrarArticuloController(){
        if(isset($_GET["idBorrar"])){
            unlink($_GET["rutaImagen"]);
            $datosController = $_GET["idBorrar"];

            $respuesta = GestorArticuloModel::borrarArticuloModel($datosController, "articulos");
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "¡El artículo se ha borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "articulos"; 
                        }
                  });

                    </script>';

            }

        }

    }



    #ACTUALIZAR ARTICULO------------------------------
    public function editarArticuloController(){

        $ruta = "";
        //si el titulo esta lleno
        if(isset($_POST["editarTitulo"])){

            //si editarImagen viene lleno
            if(isset($_FILES["editarImagen"]["tmp_name"])){
                $imagen = $_FILES["editarImagen"]["tmp_name"];
                $aletorio = mt_rand(100,999);
                $ruta = "views/images/articulos/articulo".$aletorio.".jpg";
                $origen = imagecreatefromjpeg($imagen);
                $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
                imagejpeg($destino, $ruta);
                $borrar = glob("views/images/articulos/temp/*");
                //las borramos con un for each
                foreach($borrar as $file){
                //lo borramos del servidor ocn el metodo de php unlik()
                unlink($file);
                }

            }
           
            //si la ruta viene vacia es decir no se cambio la imagen
            if($ruta == ""){

				$ruta = $_POST["fotoAntigua"];

			}

			else{

				unlink($_POST["fotoAntigua"]);

			}


        

            //guardamos en un array los datos del formulario
            $datosController = array("id"=>$_POST["id"],
                                    "titulo"=>$_POST["editarTitulo"],
                                    "introduccion"=>$_POST["editarIntroduccion"],
                                    "ruta"=>$ruta,
                                    "contenido"=>$_POST["editarContenido"]);
            //enviamos los datos obtenidos al modelo y recibimos una respuesta
            $respuesta = GestorArticuloModel::editarArticuloModel($datosController, "articulos");
            
          
            
            
            if($respuesta == "ok"){
                echo'<script>
                swal({
                    title: "¡OK!",
                    text: "¡El artículo ha sido actualizado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "articulos"; 
                        }
                  });

                    </script>';

                } else {
                    echo $respuesta;
                }


        }




    }

    


         #-----ACTUALIZAR ORDEN DE LOS ARTICULOS EN BD ------------------
         public function actualizarOrdenController($datos){
            //ENVIAMOS al modelo con la clase GestorArticuloModel ejecute la funcion  actualizarOrdenModel
            GestorArticuloModel::actualizarOrdenModel($datos, "articulos");
            
    
             $respuesta = GestorArticuloModel::seleccionarOrdenModel("articulos");
           
             foreach($respuesta as $row => $item){
                            
                echo ' <li id="'.$item["id"].'" class="bloqueArticulo">
                        <span class="handleArticle">
                        <a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">   
                        <i class="fa fa-times btn btn-danger "></i>
                        </a>
                        <i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
                        </span>
                        <img src="'.$item["ruta"].'" class="img-thumbnail">
                        <h1>'.$item["titulo"].'</h1>
                        <p>'.$item["introduccion"].'</p>
                        <input type="hidden" value="'.$item["contenido"].'">

                        <a href="#articulo'.$item["id"].'" data-toggle="modal">
                        <button class="btn btn-default">Leer Más</button>
                        </a>

                        <hr>

                    </li>


                    <div id="articulo'.$item["id"].'" class="modal fade">
      
                            <div class="modal-dialog modal-content">
                        
                                    <div class="modal-header" style="border:1px solid #eee">
                                    
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">'.$item["titulo"].'</h3>
                                    
                                    </div>

                                <div class="modal-body" style="border:1px solid #eee">
                                    
                                    <img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
                                    <p class="parrafoContenido">'.$item["contenido"].'</p>
                                        
                                </div>

                                <div class="modal-footer" style="border:1px solid #eee">
                                    
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    
                                </div>

                            </div>

                    </div>';
    
            }
    
    
         }












    
}