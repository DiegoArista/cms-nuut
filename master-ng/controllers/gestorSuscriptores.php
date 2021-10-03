<?php

class SuscriptoresController{
    public function mostrarSuscriptoresController(){
        $respuesta = SuscriptoresModel::mostrarSubscriptoresModel("suscriptores");
        foreach($respuesta as $row => $item){
    
            echo '<tr>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["email"].'</td>
                    <td>
                    <a href="index.php?action=suscriptores&idBorrar='.$item["id"].'"> <button type="button" class="btn btn-danger  quitarSuscriptor"><i class="fa fa-times"></i></button></a>
                    </td>
                    <td></td>
                </tr>';

        }
    }



     #-----ELIMINAR SUSCRIPTORES ------------------

     public function borrarSuscriptoresController(){
        if(isset($_GET["idBorrar"])){
            $datosController =  $_GET["idBorrar"];
            $respuesta = SuscriptoresModel::borrarSuscriptoresModel($datosController, "suscriptores");
            if ($respuesta == "ok") {
                echo ' <script>
                swal({
                    title: "¡OK!",
                    text: "¡El Suscriptor se ha borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "suscriptores"; 
                        }
                  });
                </script>
                ';
            }

        }
    }




    #IMPRIMIR EN PDF LOS SUSCRIPTORES-------------------------
    public function impresionSuscriptoresController($datos){
        $datosController = $datos;
        $respuesta = SuscriptoresModel::mostrarSubscriptoresModel($datosController);
        return $respuesta;
    }


        #SUSCRIPTORES SIN REVISAR------------------------------------------
        public function suscriptoresSinRevisarController(){

            $respuesta = SuscriptoresModel::suscriptoresSinRevisarModel("suscriptores");

            $sumaRevision = 0;
            
            foreach($respuesta as $row => $item){
                $totalSuscriptores = $item["revision"];
            
                if( $totalSuscriptores == 0){
                    ++$sumaRevision;

                    echo '<span>'.$sumaRevision.'</span>';

                }
                

                }

            



        }



            #SUSCRIPTORES REVISADOS--------------------------------
            public function suscriptoresRevisadosController($datos){
                $datosController = $datos;
                $respuesta = SuscriptoresModel::suscriptoresRevisadosModel($datosController, "suscriptores");
                echo $respuesta;
            }







}

