<?php 
require_once "conexion.php";

class GestorSlideModel{


    #-----SUBIR RUTA DE LA IMAGEN  --------------------
    #--------------------------------------------------
    public function subirImagenSlideModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (route) VALUES (:ruta)");
        $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
    }


#-----   SELECCIOANR RUTA DE LA IMAGEN  ------------------
#---------------------------------------------------------

//MOSTRAMOS LAS IMEGENES DELA BD SUBIR AL SERVIDOR 
    public function mostrarImagenSlideModel($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT route, title, description FROM $tabla WHERE ruta = :ruta");
        $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
        
        $stmt->execute();
        //retorna la ruta que coincida con la ruta deseada
        return $stmt->fetch();
        $stmt->close();

    }
#-----   MOSTRAR IMAGEN EN LA VISTA  ------------------
#---------------------------------------------------------

    public function mostrarImagenVistaModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id, route, title, description FROM $tabla ORDER BY orden ASC");
        $stmt->execute();
        //retorna las filas de todas las imagenes en la bd,
        //un fechtAll es un array dentro de un array principal
        return $stmt->fetchAll();
        $stmt->close();

    }


     #-----ELIMINAR ITEM DEL SLIDE EN BD ------------------
     public function eliminararSlideModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos["idSlide"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();



         }

           #-----ACTUALIZAR ITEM DEL SLIDE EN BD ------------------
        public function actualizarSlideModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET title = :titulo,
        description = :descripcion  WHERE id = :id");

        $stmt -> bindParam(":titulo", $datos["enviarTitulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $datos["enviarDescripcion"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);
        

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();



        }
         #-----SELEECIONAR ITEM DEL SLIDE  ------------------

        public function seleccionarActualizacionSlideModel($datos, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT  title, description FROM $tabla WHERE id = :id");
            $stmt -> bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);
            
            
            $stmt->execute();
          
            return $stmt->fetch();
            $stmt->close();

        }


         #-----ACTUALIZAR ORDEN DEL SLIDE ------------------
         public function actualizarOrdenModel($datos, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET order = :orden WHERE id = :id");
    
            $stmt -> bindParam(":orden", $datos["actualizarOrdenItem"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["actualizarOrdenSlide"], PDO::PARAM_INT);
            
    
            if ($stmt->execute()) {
                return "ok";
    
            }else{
                return "error";
    
            }
            $stmt->close();
    
    
    
            }


        #-----SELEECIONAR ORDEN DEL SLIDE  ------------------

        public function seleccionarOrdenModel($datos, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT  id, route, title, description FROM $tabla ORDER BY order ASC");
                      
            $stmt->execute();
          
            return $stmt->fetchAll();
            $stmt->close();

        }

        #MOSTRAMOS SLIDE DINAMICO EN TIEMPO REAL
        public function seleccionarSlideModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT  id, route, title, description FROM $tabla  ORDER BY order ASC");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }






}


    