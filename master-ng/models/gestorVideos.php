<?php 
require_once "conexion.php";

class GestorVideosModel{


    #-----SUBIR RUTA DEL VIDEO  --------------------
    #--------------------------------------------------
    public function subirVideoModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( route) VALUES  (:ruta)");
      
        $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
    }

    #MOSTRAR VIDEOS EN EL BACKEND


    public function mostrarVideoModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT  route FROM $tabla WHERE route = :ruta");
        $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();

    }


    #mostrar video video vista ---------------

    public function mostrarVideoVistaModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT  id, route FROM $tabla ORDER BY order ASC");
        $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }




   #-----ELIMINAR ITEM DEL VIDEO EN BD ------------------
   public function eliminarVideoModel($datos, $tabla){
    $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
    $stmt -> bindParam(":id", $datos["idVideo"], PDO::PARAM_INT);

    if ($stmt->execute()) {
        return "ok";

    }else{
        return "error";

    }
    $stmt->close();



    }


  #-----ACTUALIZAR ORDEN DE LA VIDEO ------------------
  public function actualizarOrdenModel($datos, $tabla){
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET order = :orden WHERE id = :id");

    $stmt -> bindParam(":orden", $datos["actualizarOrdenItem"], PDO::PARAM_STR);
    $stmt -> bindParam(":id", $datos["actualizarOrdenVideo"], PDO::PARAM_INT);
    

    if ($stmt->execute()) {
        return "ok";

    }else{
        return "error";

    }
    $stmt->close();



    }


#-----SELEECIONAR ORDEN DEL VIDEO  ------------------

public function seleccionarOrdenModel($datos, $tabla){
    $stmt = Conexion::conectar()->prepare("SELECT  id, route FROM $tabla ORDER BY order ASC");
              
    $stmt->execute();
  
    return $stmt->fetchAll();
    $stmt->close();

}








}