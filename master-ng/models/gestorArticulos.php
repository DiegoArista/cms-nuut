<?php 
require_once "conexion.php";

class GestorArticuloModel{


    #-----SUBIR RUTA DE LA IMAGEN  --------------------
    #--------------------------------------------------
    public function guardarArticuloModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (titulo, introduccion, ruta, contenido) VALUES 
        (:titulo, :introduccion, :ruta, :contenido)");
        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
    


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
    }

    #MOSTRAR ARTICULOS EN EL BACKEND


    public function mostrarArticulosModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


     #BORRAR ARTICULOS EN EL BACKEND


     public function borrarArticuloModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();

    }

    
     #ACTUALIZAR ARTICULOS

     public function editarArticuloModel($datosModel, $tabla){ 

       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo,
        introduccion = :introduccion, ruta = :ruta, contenido = :contenido  WHERE id = :id");
       
        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
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
            $stmt = Conexion::conectar()->prepare("SELECT  id, titulo, introducci??n, ruta, contenido  FROM $tabla ORDER BY orden ASC");
                      
            $stmt->execute();
          
            return $stmt->fetchAll();
            $stmt->close();

        }






}
