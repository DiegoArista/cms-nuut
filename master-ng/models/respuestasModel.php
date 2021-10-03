<?php 
require_once "conexion.php";

class GestorRespuestasModel{


    #-----GUARDAR PREGUNTA  --------------------
    #--------------------------------------------------
    // public function guardarPreguntaModel($datosModel, $tabla){
    //     $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
    //     (pregunta, user) VALUES 
    //     (:pregunta, :user)");
    //     $stmt -> bindParam(":pregunta", $datosModel["pregunta"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
  
      


    //     if ($stmt->execute()) {
    //         return "ok";

    //     }else{
    //         return "error";

    //     }
    //     $stmt->close();
       
    // }

    #MOSTRAR RESPUESTAS EN EL BACKEND


    public function mostrarRespuestasModel($tabla1, $tabla2, $tabla3){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1, $tabla2,  $tabla3 WHERE $tabla1.id = $tabla2.id_encuesta");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


     #BORRAR ENCUSTADO EN EL BACKEND


     public function borrarRespuestaModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();

    }

    
     #ACTUALIZAR PREGUNTAS

     public function editarRespuestaModel($datosModel, $tabla){ 
       // var_dump($datosModel, $tabla);
       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre, apellidos, email = :nombre, :apellidos, :email
        WHERE id = :id");
       
        $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
      
       
        $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error eDITAR ENCUESTA";

        }
        $stmt->close();





     }





      #-----ACTUALIZAR ORDEN DEL ARTICULOS ------------------
      public function actualizarOrdenModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

        $stmt -> bindParam(":orden", $datos["OrdenItem"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["OrdenArticulo"], PDO::PARAM_INT);
        

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();



        }
          #-----SELEECIONAR ORDEN DEL ARTICULOS  ------------------

          public function seleccionarOrdenModel( $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT  id, titulo, introducción, ruta, contenido  FROM $tabla ORDER BY orden ASC");
                      
            $stmt->execute();
          
            return $stmt->fetchAll();
            $stmt->close();

        }






}
