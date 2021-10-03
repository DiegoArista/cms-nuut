<?php 
require_once "conexion.php";

class CategoriesModel{


    #-----GUARDAR CATEGORIA  --------------------
    #--------------------------------------------------
    public function guardarCategoriaModel($datosModel, $tabla){
        // var_dump($datosModel, $tabla);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (category, user) VALUES 
        (:categoria, :user)");
        $stmt -> bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
  
      


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
       
    }





















      #MOSTRAR CATEGORIAS


      public function mostrarCategoriasModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, category, user, date_creation FROM $tabla ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


     #BORRAR CATEGORIAS


     public function borrarCategoriaModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();

    }

    
     #ACTUALIZAR CATEGORIAS

     public function editarCategoriaModel($datosModel, $tabla){ 

       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET category = :categoria,
        user = :user  WHERE id = :id");
       
        $stmt -> bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_STR);
       
        $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();





     }




}