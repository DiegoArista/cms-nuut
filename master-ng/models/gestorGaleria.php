<?php

require_once "conexion.php";

class GestorGaleriaModel{

    #subir ruta imagen a la bd

    public function subirImagenGaleriaModel($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (route) VALUES 
        (:ruta)");
       
        $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
      
    


        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();

    }



        #SELECCIONAR Y MOSTRAR IMAGEN EN EL BACKEND


        public function mostrarImagenGaleriaModel($datos, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT  route FROM $tabla WHERE ruta = :ruta");
            $stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
           
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
    
        }

            #MOSTRAR IMAGEN EN LA VISTA


        public function mostrarImagenVistaModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, route FROM gallery_images ORDER BY orden ASC");
           
           
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
    
        }


          #-----ELIMINAR ITEM DEL GALERIA EN BD ------------------
     public function eliminarGaleriaModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos["idGaleria"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();



        }

            #-----ACTUALIZAR ORDEN DE LA GALERIA ------------------
            public function actualizarOrdenModel($datos, $tabla){
                $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET order = :orden WHERE id = :id");
        
                $stmt -> bindParam(":orden", $datos["actualizarOrdenItem"], PDO::PARAM_STR);
                $stmt -> bindParam(":id", $datos["actualizarOrdenGaleria"], PDO::PARAM_INT);
                
        
                if ($stmt->execute()) {
                    return "ok";
        
                }else{
                    return "error";
        
                }
                $stmt->close();
        
        
        
                }
    
    
            #-----SELEECIONAR ORDEN DEL SLIDE  ------------------
    
            public function seleccionarOrdenModel($datos, $tabla){
                $stmt = Conexion::conectar()->prepare("SELECT  id, route FROM $tabla ORDER BY orden ASC");
                          
                $stmt->execute();
              
                return $stmt->fetchAll();
                $stmt->close();
    
            }
    
    

}