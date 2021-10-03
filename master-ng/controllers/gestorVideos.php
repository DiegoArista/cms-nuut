<?php

class  GestorVideos{

   #mostrar video ajax ------------------

   public function mostrarVideoController($datos){
      
        $aletorio = mt_rand(100,999);
        $ruta = "../../views/videos/video".$aletorio.".mp4";
        move_uploaded_file($datos, $ruta);

        GestorVideosModel::subirVideoModel($ruta, "videos");
     
    
        $respuesta =  GestorVideosModel::mostrarVideoModel($ruta, "videos");
   
        $enviarDatos = $respuesta["route"];
        echo $enviarDatos;


    }




    #MOSTRAR VIDEOS EN LA VISTA ----------------------------

    public function mostrarVideoVistaController(){
        $respuesta =  GestorVideosModel::mostrarVideoVistaModel("videos");
        foreach($respuesta as $row => $item){
            //no necesitamos concatenar con json sino en php para quitar caracteres usamos substr()
           
            echo '<li id="'.$item["id"].'" class="bloqueVideo">
                    <span class="fa fa-times eliminarVideo" ruta="'.$item["route"].'"></span>
                    <video controls class="handleVideo">
                        <source src="'.substr($item["route"], 6).'" type="video/mp4">
                    </video>	
                </li>';

        }
    }


     #-----ELIMINAR ITEM DEL VIDEO EN BD ------------------

     public function eliminarVideoController($datos){
        //pedimos al modelo con la clase GestorSlideModel ejecute la funcion  eliminararSlideModel enviando los kos datos en la variable $datos en la tabla slide
        $respuesta = GestorVideosModel::eliminarVideoModel($datos, "videos");
        //eliminamos el archivo con la ruta completa con el metodo o funcion de php unlink()
         unlink($datos["rutaVideo"]);



        // mandamos la respuesta al archivo de ajax php
        echo $respuesta;


    }


          #-----ACTUALIZAR ORDEN VIDEOS ------------------
          public function actualizarOrdenController($datos){
            //pedimos al modelo con la clase DEL MODELO ejecute la funcion  esa enviando los kos datos en la variable $datos en la tabla slide
            GestorVideosModel::actualizarOrdenModel($datos, "videos");
            
    
             $respuesta = GestorVideosModel::seleccionarOrdenModel($datos, "videos");
           
             foreach($respuesta as $row => $item){
    
                echo '<li id="'.$item["id"].'" class="bloqueVideo">
                <span class="fa fa-times eliminarVideo" ruta="'.$item["route"].'"></span>
                <video controls class="handleVideo">
                    <source src="'.substr($item["route"], 6).'" type="video/mp4">
                </video>	
            </li>';
    
            }
    
    
         }

} 