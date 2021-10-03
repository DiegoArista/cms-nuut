<?php
require_once "conexion.php";
class SuscriptoresModel{
    public function mostrarSubscriptoresModel($tabla){
       
        $stmt = Conexion::conectar()->prepare("SELECT  id, nombre, email FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
           
            
           
        }



         #-----ELIMINAR SUSCRIPTORES ------------------
      public function borrarSuscriptoresModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();



        }


        
#SUSCRIPTORES SIN REVISAR------------------
public function  suscriptoresSinRevisarModel($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT revision FROM $tabla");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();

}



 #-----SUSCRIPTORES REVISADOS ------------------
public function suscriptoresRevisadosModel($datosModel, $tabla){
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET revision= :revision");
$stmt -> bindParam(":revision", $datosModel, PDO::PARAM_INT);

if ($stmt->execute()) {
return "ok";

}else{
return "error";

}
$stmt->close();



}






}
