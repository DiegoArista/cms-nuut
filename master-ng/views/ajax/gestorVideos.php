<?php

require_once "../../controllers/gestorVideos.php";
require_once "../../models/gestorVideos.php";


#METODOS
#-------------------------------

class Ajax{

     #subiendo video
    #----------------------------
    public $videoTemporal;
    
    public function gestorVideoAjax(){
        $datos = $this->videoTemporal;

    $respuesta = GestorVideos::mostrarVideoController($datos);

    echo $respuesta;
        
    }




    
//eliminar item video
public $idVideo;
public $rutaVideo;

    public function eliminarVideoAjax(){
        $datos = array("idVideo"=> $this->idVideo,
                        "rutaVideo"=> $this->rutaVideo);
        $respuesta = GestorVideos::eliminarVideoController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }




    

     /*===================================================================
                        ACTUALIZAR ORDEN DE VIDEOS
    ======================================================================*/
    public $actualizarOrdenVideo;
    public $actualizarOrdenItem;

    

    public function actualizarOrdenAjax(){
        $datos = array("actualizarOrdenVideo"=> $this->actualizarOrdenVideo,
                        "actualizarOrdenItem"=> $this->actualizarOrdenItem);
        $respuesta = GestorVideos::actualizarOrdenController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }




}


#OBJETOS------------------

if(isset($_FILES["video"]["tmp_name"])){
    $a = new Ajax();
    $a -> videoTemporal = $_FILES["video"]["tmp_name"];
    $a -> gestorVideoAjax();

}

if(isset($_POST["idVideo"])){
    $b = new Ajax();
    $b-> idVideo = $_POST["idVideo"];
    $b-> rutaVideo = $_POST["rutaVideo"];
    $b -> eliminarVideoAjax();

}



if (isset($_POST["actualizarOrdenVideo"])) {
    $c = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $c-> actualizarOrdenVideo = $_POST["actualizarOrdenVideo"];
    $c-> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
    $c -> actualizarOrdenAjax();
}