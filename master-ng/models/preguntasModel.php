<?php 
require_once "conexion.php";

class GestorPreguntaModel{


    #-----GUARDAR PREGUNTA  --------------------
    #--------------------------------------------------
    public function guardarPreguntaModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (pregunta, user) VALUES 
        (:pregunta, :user)");
        $stmt -> bindParam(":pregunta", $datosModel["pregunta"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
  
      


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
       
    }

    #MOSTRAR ARTICULOS EN EL BACKEND


    public function mostrarPreguntasModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, pregunta, user, fecha FROM $tabla ORDER BY orden ASC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


     #BORRAR PREGUNTAS EN EL BACKEND


     public function borrarPreguntaModel($datosModel, $tabla){
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

     public function editarPreguntaModel($datosModel, $tabla){ 

       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pregunta = :pregunta,
        user = :user  WHERE id = :id");
       
        $stmt -> bindParam(":pregunta", $datosModel["pregunta"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_STR);
       
        $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

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
