<?php

class GestorGaleria{


        #mostrar imagen ------------------

        public function mostrarImagenController($datos){
            list($ancho, $alto) = getimageSize($datos);
    
            if($ancho < 1024 || $alto < 768){
                echo 0;
    
            }
            else {
                $aletorio = mt_rand(100,999);
                $ruta = "../../views/images/galeria/gallery".$aletorio.".jpg";
                

                //definimos el nuevo ancho y alto
                $nuevo_ancho = 1024;
                $nuevo_alto = 768;
                
                // imagecreatefromjpeg() creamos un nuevo archivo con la fucnion de php apartir de un archivo existente 
                $origen = imagecreatefromjpeg($datos);
                //creamos una imagen de color verdadero con imagecreatetruecolor
                $destino = imagecreatetruecolor($nuevo_ancho,  $nuevo_alto);

                //imagecopyresize crea una copia de una porcion de imagen a otra imagen, es boleano, parametros
                //destino, origen, int swatino x, int destino y, int origen x, int origen y, ancho int, alto int, int origenw, int origen h
                //
                // imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
              
               
                //propiedad o método de php imagejpeg() manejamos el translado del temporal a la ruta deseada (subida al servidor)
                imagejpeg($destino, $ruta);

                GestorGaleriaModel::subirImagenGaleriaModel($ruta, "gallery_images");
                $respuesta = GestorGaleriaModel::mostrarImagenGaleriaModel($ruta, "gallery_images");

                echo $respuesta["route"];
            }
    
    
    
        }
        public function mostrarImagenVistaController(){
            $respuesta = GestorGaleriaModel::mostrarImagenVistaModel("gallery_images");
            foreach($respuesta as $row => $item){

                echo ' <li id="'.$item["id"].'" class="bloqueGaleria">
                <span class="fa fa-times eliminarFoto" ruta="'.$item["route"].'"></span>
                <a rel="grupo" href="'.substr($item["route"], 6).'">
                <img src="'.substr($item["route"], 6).'" class="handleImg">
                </a>
            </li>';

            }

        }




         #-----ELIMINAR ITEM DEL GALERIA EN BD ------------------

    public function eliminarGaleriaController($datos){
        //pedimos al modelo con la clase GestorSlideModel ejecute la funcion  eliminararSlideModel enviando los kos datos en la variable $datos en la tabla slide
        $respuesta = GestorGaleriaModel::eliminarGaleriaModel($datos, "gallery_images");
        //eliminamos el archivo con la ruta completa con el metodo o funcion de php unlink()
         unlink($datos["rutaGaleria"]);



        // mandamos la respuesta al archivo de ajax php
        echo $respuesta;


    }






      #-----ACTUALIZAR ORDEN DE KA GALERIA EN BD ------------------
      public function actualizarOrdenController($datos){
        //pedimos al modelo con la clase DEL MODELO ejecute la funcion  esa enviando los kos datos en la variable $datos en la tabla slide
        GestorGaleriaModel::actualizarOrdenModel($datos, "gallery_images");
        

         $respuesta = GestorGaleriaModel::seleccionarOrdenModel($datos, "gallery_images");
       
         foreach($respuesta as $row => $item){

            echo ' <li id="'.$item["id"].'" class="bloqueGaleria">
                    <span class="fa fa-times eliminarFoto" ruta="'.$item["route"].'"></span>
                    <a rel="grupo" href="'.substr($item["route"], 6).'">
                    <img src="'.substr($item["route"], 6).'" class="handleImg">
                    </a>
                </li>';

        }


     }

}