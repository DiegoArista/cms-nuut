<?php 
require_once "conexion.php";

class SubcategoriesModel{


    #-----GUARDAR CATEGORIA  --------------------
    #--------------------------------------------------
    public function guardarSubcategoriaModel($datosModel, $tabla){
        // var_dump($datosModel, $tabla);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (id_category, subcategory, user) VALUES 
        (:category, :subcategoria, :user)");
        $stmt -> bindParam(":category", $datosModel["categoria"], PDO::PARAM_INT);
        $stmt -> bindParam(":subcategoria", $datosModel["subcategoria"], PDO::PARAM_STR);
        $stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
  
      


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
       
    }





















      #MOSTRAR SUBCATEGORIAS


      public function mostrarSubcategoriasModel($tabla1, $tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.id, $tabla1.category, $tabla2.id, $tabla2.id_category, $tabla2.subcategory, $tabla2.date_creation FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.id_category");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


      #MOSTRAR CATEGORIAS


      public function mostrarCategoriasModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, category FROM $tabla ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


     #BORRAR CATEGORIAS


     public function borrarSubcategoriaModel($datosModel, $tabla){
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

     public function editarSubcategoriaModel($datosModel, $tabla){ 

       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_category = :category, subcategory = :subcategoria,
        user = :user  WHERE id = :id");
           $stmt -> bindParam(":category", $datosModel["categoria"], PDO::PARAM_INT);
        $stmt -> bindParam(":subcategoria", $datosModel["subcategoria"], PDO::PARAM_STR);
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