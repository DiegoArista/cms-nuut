<?php 
require_once "conexion.php";

class PremiosModel{


    #-----GUARDAR PREGUNTA  --------------------
    #--------------------------------------------------
    public function guardarPremiosModel($datosModel, $tabla){
        // var_dump($datosModel);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (premio, nombre, apellido, correo, user) VALUES 
        (:premio, :nombre, :apellido, :correo, :user)");
        $stmt -> bindParam(":premio", $datosModel["premio"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
  
    


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
    }

    #MOSTRAR ARTICULOS EN EL BACKEND


    public function mostrarPremiosModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, premio, nombre, apellido, correo ,user, fecha FROM $tabla ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


     #BORRAR PREGUNTAS EN EL BACKEND


     public function borrarPremioModel($datosModel, $tabla){
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

     public function editarPremioModel($datosModel, $tabla){ 

       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,
        apellido = :apellido,  correo = :correo, user = :user  WHERE id = :id");
       
        $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
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
