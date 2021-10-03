<?php 

require_once "master-ng/models/conexion.php";
// require_once "../master-ng/models/conexion.php";
class GestorPreguntaModel{



    #consultar pregunta

    public function consultarPreguntasModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        // $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }
    public function numeroPrguntasModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla");
        // $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }




    public function consultarEncuestasModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT  MAX(id) AS id FROM $tabla");
        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

    }



 #-----GUARDAR ENCUESTA  --------------------

 public function guardarEncuestaModel($datosModel, $tabla){

    
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellidos, email) VALUES (:nombre, :apellido, :email)");
   
    $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
    $stmt -> bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
    $stmt -> bindParam(":email", $datosModel["correo"], PDO::PARAM_STR);
   
  
    if ($stmt->execute()) {
        return "ok";

    }else{
        return "error encuesta";

    }
    $stmt->close();
}




    #-----GUARDAR RESPUESTAS  --------------------
    #--------------------------------------------------
    public function guardarRespuestasModel($encuesta, $preguntas, $datosModel, $correo,    $tabla){
     var_dump( $encuesta, $preguntas, $datosModel, $correo, $tabla);
    
      
         
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[0], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[0], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);


            if ($stmt->execute()) {
                return "ok";
    
            }else{
                return "error RESPUESTAS";
    
            }
            $stmt->close();
           
               
           
          
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[1], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[1], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);


            if ($stmt->execute()) {
                return "ok";
    
            }else{
                return "error RESPUESTAS";
    
            }
            $stmt->close();
          
         
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[2], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[2], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);


            if ($stmt->execute()) {
                return "ok";
    
            }else{
                return "error RESPUESTAS";
    
            }
            $stmt->close();
           
          
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[3], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[3], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);

              if ($stmt->execute()) {
            return "ok";

        }else{
            return "error RESPUESTAS";

        }
        $stmt->close();


           
          
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[4], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[4], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);

              if ($stmt->execute()) {
            return "ok";

        }else{
            return "error RESPUESTAS";

        }
        $stmt->close();


         
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[5], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[5], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);

              if ($stmt->execute()) {
            return "ok";

        }else{
            return "error RESPUESTAS";

        }
        $stmt->close();


           
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
            (id_encuesta, pregunta, respuesta, email) VALUES 
            (:idEncuesta, :pregunta, :respuesta, :email)");
             $stmt -> bindParam(":idEncuesta",  $encuesta, PDO::PARAM_INT);
            $stmt -> bindParam(":pregunta", $preguntas[6], PDO::PARAM_INT);
            $stmt -> bindParam(":respuesta", $datosModel[6], PDO::PARAM_INT);
           
            $stmt -> bindParam(":email", $correo, PDO::PARAM_STR);

              if ($stmt->execute()) {
            return "ok";

        }else{
            return "error RESPUESTAS";

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
      public function actualizarOrdenModel($datos,  $EncuestaId, $tabla){


        var_dump( $datos,  $EncuestaId, $tabla);
        




        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (id_encuesta, pregunta, respuesta, email) VALUES 
        (:id_encuesta, :pregunta, :respuesta :email)");
   
        $stmt -> bindParam(":id_encuesta", $EncuestaId["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":pregunta", $datosModel["almacenarId"], PDO::PARAM_INT);
        $stmt -> bindParam(":respuesta", $datosModel["valorRespuesta"], PDO::PARAM_INT);
        $stmt -> bindParam(":email", $datosModel["correo"], PDO::PARAM_STR);








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
