<?php
require_once "../../controllers/gestorGaleria.php";
require_once "../../models/gestorGaleria.php";
#CLASES Y METODOS----------------------------------

class Ajax{

       #subiendo imagen
    #----------------------------
    public $imagenTemporal;
    
    public function gestorGaleriaAjax(){
        $datos = $this->imagenTemporal;

    $respuesta = GestorGaleria::mostrarImagenController($datos);

    echo $respuesta;
        
    }



//eliminar item galeria
public $idGaleria;
public $rutaGaleria;

    public function eliminarGaleriaAjax(){
        $datos = array("idGaleria"=> $this->idGaleria,
                        "rutaGaleria"=> $this->rutaGaleria);
        $respuesta = GestorGaleria::eliminarGaleriaController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }






    

     /*===================================================================
                        ACTUALIZAR ORDEN DE LAS IMAGENES DE LA GALERIA
    ======================================================================*/
    public $actualizarOrdenGaleria;
    public $actualizarOrdenItem;

    

    public function actualizarOrdenAjax(){
        $datos = array("actualizarOrdenGaleria"=> $this->actualizarOrdenGaleria,
                        "actualizarOrdenItem"=> $this->actualizarOrdenItem);
        $respuesta = GestorGaleria::actualizarOrdenController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }






}



#OBJETOS
#---------------------------------------------
if(isset($_FILES["imagen"]["tmp_name"])){
    $a = new Ajax();
    $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a -> gestorGaleriaAjax();

}

if (isset($_POST["idGaleria"])) {
    $b = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $b-> idGaleria = $_POST["idGaleria"];
    $b-> rutaGaleria = $_POST["rutaGaleria"];
    $b -> eliminarGaleriaAjax();
}


if (isset($_POST["actualizarOrdenGaleria"])) {
    $c = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $c-> actualizarOrdenGaleria = $_POST["actualizarOrdenGaleria"];
    $c-> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
    $c -> actualizarOrdenAjax();
}
