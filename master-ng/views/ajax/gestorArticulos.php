<?php 
require_once "../../controllers/preguntasController.php";
require_once "../../models/preguntasModel.php";
#CLASES Y METODOS
#-------------------------------

class Ajax{

    #subiendo imagen
    #----------------------------
    public $imagenTemporal;
    
    public function gestorArticulosAjax(){
        $datos = $this->imagenTemporal;

    $respuesta = GestorArticulos::mostrarImagenController($datos);

    echo $respuesta;
        
    }
    #ACTUALIZAR EL ORDEN DE ARTICULOS--------------------------------

    public $actualizarOrdenArticulos;
    public $actualizarOrdenItem;

    

    public function actualizarOrdenAjax(){
        $datos = array("OrdenArticulo"=> $this->actualizarOrdenArticulos,
                        "OrdenItem"=> $this->actualizarOrdenItem);
     //lo mandamos al controlador
                        $respuesta = GestorArticulos::actualizarOrdenController($datos);
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta;
    }





    
}



#OBJETOS
#---------------------------------------------
if(isset($_FILES["imagen"]["tmp_name"])){
    $a = new Ajax();
    $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a -> gestorArticulosAjax();

}



if(isset($_POST["actualizarOrdenArticulos"])){
    $d = new Ajax();
    //recibimos las variables del js con ajax y jquery Y le metemos lo que hay en post
    $d -> actualizarOrdenArticulos = $_POST["actualizarOrdenArticulos"];
    $d -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
    $d -> actualizarOrdenAjax();

}