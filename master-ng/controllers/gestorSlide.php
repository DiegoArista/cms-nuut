<?php 

class GestorSlide{

    #-----MOSTRAR IMAGEN SLIDE  AJAX ------------------
    #--------------------------------------------------
    public function mostrarImagenController($datos){
        #getimageSize() obtiene el tamaño de una imagen
        #LIST() al igual que un array(), no es realmente una función, es un constructor del lenguaje.
        #list() se utiliza para asignar una lista de variables en una sola operación, o desempaquetar un array.
        list($ancho, $alto) = getimageSize($datos["imagenTemporal"]);
            if($ancho < 1600 || $alto < 600){
                echo 0;

            }

            else { 
                //funcion math random similar al de js
                $aletorio = mt_rand(100,999);
                $ruta = "../../views/images/slide/slide".$aletorio.".jpg";
                // imagecreatefromjpeg() creamos un nuevo archivo con la fucnion de php apartir de un archivo existente 
                $origen = imagecreatefromjpeg($datos["imagenTemporal"]);

                //imagecrop() recorta una imagen usando las coordenadas, el tamaño, x y y, ancho y alto
                // $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 1600, "height" => 600]);


                //propiedad o método de php imagejpeg() manejamos el translado del temporal a la ruta deseada (subida al servidor)
                imagejpeg($destino, $ruta);
              
                GestorSlideModel::subirImagenSlideModel($ruta, "slides");
                $respuesta =  GestorModel::mostrarImagenSlideModel($ruta, "slides");
                $enviarDatos = array("ruta" => $respuesta["ruta"],
                                    "titulo" => $respuesta["titulo"], 
                                    "descripcion" => $respuesta["descripcion"]);

                echo json_encode($enviarDatos);
            }
       

    }

  #-----MOSTRAR IMAGEN EN LA VISTA ------------------
#--------------------------------------------------
    public function mostrarImagenVistaController(){

        $respuesta = GestorSlideModel::mostrarImagenVistaModel("slide");
 
        foreach($respuesta as $row => $item){
            //no necesitamos concatenar con json sino en php para quitar caracteres usamos substr()
            //para manipular la eliminacion de una iamgen en la carpeta del servidor, agregamos en el span un atributo ruta con la ruta completa
            echo '<li id="'.$item["id"].'" class="bloqueSlide"><span class="fa fa-times eliminarSlide"  ruta="'.$item["ruta"].'"></span><img src="'.substr($item["ruta"], 6).'" class="handleImg"></li>';

        }

    }
      #-----MOSTRAR IMAGEN DEL SLIDE EN EL EDITOR ------------------
    #--------------------------------------------------

    public function editorSlideController(){

        $respuesta = GestorSlideModel::mostrarImagenVistaModel("slide");
 
        foreach($respuesta as $row => $item){
            //no necesitamos concatenar con json sino en php para quitar caracteres usamos substr()
           
            echo '<li id="item'.$item["id"].'">
                    <span class="fa fa-pencil editarSlide" style="background:blue"></span>
                    <img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
                    <h1>'.$item["titulo"].'</h1>
                    <p>'.$item["descripcion"].'</p>
                </li>';

        }

    }


     #-----ELIMINAR ITEM DEL SLIDE EN BD ------------------

    public function eliminararSlideController($datos){
        //pedimos al modelo con la clase GestorSlideModel ejecute la funcion  eliminararSlideModel enviando los kos datos en la variable $datos en la tabla slide
        $respuesta = GestorSlideModel::eliminararSlideModel($datos, "slide");
        //eliminamos el archivo con la ruta completa con el metodo o funcion de php unlink()
        unlink($datos["rutaSlide"]);



        // mandamos la respuesta al archivo de ajax php
        echo $respuesta;


    }

     #-----ACTUALIZAR ITEM DEL SLIDE EN BD ------------------

     public function actualizarSlideController($datos){
        //pedimos al modelo con la clase GestorSlideModel ejecute la funcion  actualizarSlideModel enviando los kos datos en la variable $datos en la tabla slide
         GestorSlideModel::actualizarSlideModel($datos, "slide");


         $respuesta = GestorSlideModel::seleccionarActualizacionSlideModel($datos, "slide");
       

        $enviarDatos = array("titulo" => $respuesta["titulo"], "descripcion" => $respuesta["descripcion"]);

        // mandamos la respuesta al archivo de ajax php
        echo json_encode($enviarDatos);


    }










     #-----ACTUALIZAR ORDEN DEL SLIDE EN BD ------------------
     public function actualizarOrdenController($datos){
        //pedimos al modelo con la clase GestorSlideModel ejecute la funcion  actualizarSlideModel enviando los kos datos en la variable $datos en la tabla slide
        GestorSlideModel::actualizarOrdenModel($datos, "slide");
        

         $respuesta = GestorSlideModel::seleccionarOrdenModel($datos, "slide");
       
         foreach($respuesta as $row => $item){
            //no necesitamos concatenar con json sino en php para quitar caracteres usamos substr()
           
            echo '<li id="item'.$item["id"].'">
                    <span class="fa fa-pencil editarSlide" style="background:blue"></span>
                    <img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
                    <h1>'.$item["titulo"].'</h1>
                    <p>'.$item["descripcion"].'</p>
                </li>';

        }


     }


     #SLIDE DINAMICO BACKEND
     public function seleccionarSlideController(){

        $respuesta = GestorSlideModel::seleccionarSlideModel("slide");
        
        foreach($respuesta as $row => $item){
                    
            echo '<li>
                    <img src="'.substr($item["ruta"], 6).'">
                    <div class="slideCaption">
                        <h3>'.$item["titulo"].'</h3>
                        <p>'.$item["descripcion"].'</p>
                    </div>
                </li>';

        }

    }
    
}