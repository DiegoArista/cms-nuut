<?php
require_once "../../controllers/preguntasController.php";
require_once "../../models/preguntasModel.php";
#CLASES Y METODOS----------------------------------

class Ajax{

       #subiendo imagen
    #----------------------------
    // public $imagenTemporal;
    
    // public function gestorGaleriaAjax(){
    //     $datos = $this->imagenTemporal;

    // $respuesta = GestorGaleria::mostrarImagenController($datos);

    // echo $respuesta;
        
    // }



//eliminar item galeria
// public $idGaleria;
// public $rutaGaleria;

//     public function eliminarGaleriaAjax(){
//         $datos = array("idGaleria"=> $this->idGaleria,
//                         "rutaGaleria"=> $this->rutaGaleria);
//         $respuesta = GestorGaleria::eliminarGaleriaController($datos);
//         // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
//         echo $respuesta;
//     }






    

     /*===================================================================
                        ACTUALIZAR ORDEN DE LAS IMAGENES DE LA GALERIA
    ======================================================================*/
    public $idEncuesta;
    public $guardarIdPreguntas;
    public $guardarIdRespuestas;
    public $email;
    

    

    public function guardarRespuestasAjax(){
        $datos = array("idEncuesta"=> $this->idEncuesta,
                        "guardarIdPreguntas"=> $this->guardarIdPreguntas,
                        "guardarIdRespuestas"=> $this->guardarIdRespuestas,
                        "email"=> $this->email);
                        $respuesta1 = PreguntasController::guardarRespuestasController($datos);
      
        // recibe la respuesta del controlador y la enviamos al  ajax archivo js 
        echo $respuesta1;
    }






}



#OBJETOS
#---------------------------------------------
// if(isset($_FILES["imagen"]["tmp_name"])){
//     $a = new Ajax();
//     $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
//     $a -> gestorGaleriaAjax();

// }

// if (isset($_POST["idGaleria"])) {
//     $b = new Ajax();
//     //recibimos variables POST del archivo gestorSlide.js con ajax
//     $b-> idGaleria = $_POST["idGaleria"];
//     $b-> rutaGaleria = $_POST["rutaGaleria"];
//     $b -> eliminarGaleriaAjax();
// }


if (isset($_POST["idEncuesta"])) {
    $c = new Ajax();
    //recibimos variables POST del archivo gestorSlide.js con ajax
    $c-> idEncuesta = $_POST["idEncuesta"];
    $c-> guardarIdPreguntas = $_POST["guardarIdPreguntas"];
    $c-> guardarIdRespuestas = $_POST["guardarIdRespuestas"];
    $c-> email = $_POST["email"];


    $c -> guardarRespuestasAjax();
}
