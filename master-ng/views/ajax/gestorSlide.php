
<?php 
//se hacen peticiones al controlador y al modelo
require_once "../../controllers/gestorSlide.php";
require_once "../../models/gestorSlide.php";

#-----CLASES Y MÉTODOS-----
class Ajax{

    #SUBIR IMAGEN DEL SLIDE

    public $nombreImagen;
    public $imagenTemporal;

    public function gestorSlideAjax(){
        $datos = array("nombreImagen"=> $this->nombreImagen,
                     "imagenTemporal"=> $this->imagenTemporal);
        $respuesta = GestorSlide::mostrarImagenController($datos);
    }



    /*===================================================================
                        ELIMINAR ITEM DEL SLIDER
    ======================================================================*/

    public $idSlide;
    public $rutaSlide;
    

    public function eliminarSlideAjax(){
        $datos = array("idSlide"=> $this->idSlide,
                        "rutaSlide"=> $this->rutaSlide);
        $respuesta = GestorSlide::eliminararSlideController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }

     /*===================================================================
                        ACTUALIZAR ITEM DEL SLIDER
    ======================================================================*/
    public $enviarId;
    public $enviarTitulo;
    public $enviarDescripcion;
    

    public function actualizarSlideAjax(){
        $datos = array("enviarId"=> $this->enviarId,
                        "enviarTitulo"=> $this->enviarTitulo,
                        "enviarDescripcion"=> $this->enviarDescripcion);
        $respuesta = GestorSlide::actualizarSlideController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }






     /*===================================================================
                        ACTUALIZAR ORDEN DE LAS IMAGENES DEL SLIDER
    ======================================================================*/
    public $actualizarOrdenSlide;
    public $actualizarOrdenItem;

    

    public function actualizarOrdenAjax(){
        $datos = array("actualizarOrdenSlide"=> $this->actualizarOrdenSlide,
                        "actualizarOrdenItem"=> $this->actualizarOrdenItem);
        $respuesta = GestorSlide::actualizarOrdenController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }




}






#OBJETOS---------------------

if (isset($_FILES["imagen"] ["name"])) {
    $a = new Ajax();
    $a-> nombreImagen = $_FILES["imagen"] ["name"];
    $a-> imagenTemporal = $_FILES["imagen"] ["tmp_name"];
    $a -> gestorSlideAjax();

}
 




if (isset($_POST["idSlide"])) {
    $b = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $b-> idSlide = $_POST["idSlide"];
    $b-> rutaSlide = $_POST["rutaSlide"];
    $b -> eliminarSlideAjax();
}






//creamos el objeto qeu recibe esas variables
if (isset($_POST["enviarId"])) {
    $c = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $c-> enviarId = $_POST["enviarId"];
    $c-> enviarTitulo = $_POST["enviarTitulo"];
    $c-> enviarDescripcion = $_POST["enviarDescripcion"];
    $c -> actualizarSlideAjax();
}




if (isset($_POST["actualizarOrdenSlide"])) {
    $d = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $d-> actualizarOrdenSlide = $_POST["actualizarOrdenSlide"];
    $d-> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
    $d -> actualizarOrdenAjax();
}
