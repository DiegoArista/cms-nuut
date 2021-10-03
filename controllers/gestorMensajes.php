<?php


class MensajesController{
    public function resgistroMensajesController(){
        if(isset($_POST["nombre"])){
            if (preg_match('/^[a-zA-Z\s]+$/', $_POST["nombre"]) && 
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}+$/', $_POST["email"]) && 
                preg_match('/^[a-zA-Z\s\.,]+$/', $_POST["mensaje"])) {


                    #ENVIAR CORREO EECTRONICO
                    #---mail(Correo  destino, asunto del mensaje, mensaje, cabecera del correo);

                    $correoDestino = "reservaciones@restaurantenuutgrill.com";
                    $asunto = "Mensaje de restaurantenuutgrill.com";
                    $mensaje = "Nombre:".$_POST["nombre"]."\n"."\n"."\n".
                                "Email:" .$_POST["email"]."\n"."\n"."\n".
                                "Mensaje:" .$_POST["mensaje"]."\n"."\n"."\n";
                   
                    $cabecera = "From: Sitio Web"."\r\n".
                    "CC:".$_POST['email'];
                    $envio = mail($correoDestino, $asunto, $mensaje, $cabecera);
                   
                    
                    $datosController  = array("nombre" => $_POST["nombre"],
                                                "email" => $_POST["email"],
                                                "mensaje" => $_POST["mensaje"]);
                      #Almacenar en  suscriptores
                    
                    
                    $datosSuscriptor = $_POST["email"];
                    $revisarSuscriptor = MensajesModel::revisarSuscriptorModel($datosSuscriptor, "suscriptores");
                    
                  
                   
                
                        if(count($revisarSuscriptor) == 0){

                            MensajesModel::registroSuscriptoresModel($datosController, "suscriptores");
                        }
                       
                  
                    
                    
                    
                    
               

                   
                   #enviar datos a la bd---------
                   
                  


                    $respuesta = MensajesModel::registroMensajesModel($datosController, "mensajes");
                    if ($respuesta == "ok") {
                        

                                    echo '<script>
                                                swal({
                                                    title: "¡OK!",
                                                    text: "¡Elmensaje se ha enviado correctamente!",
                                                    type: "success",
                                                    confirmButtonText: "Cerrar",
                                                    closeOnConfirm: true
                                                    },
                                                    function(isConfirm){
                                                        if (isConfirm) {
                                                            window.location = "index.php"; 
                                                        }
                                                });
                                    
                                    </script>';

                                }

            }else{
                echo'<div class= "alert alert-danger alerta text-center">!No se pudo enviar el mensaje, no se permiten 
                números ni caracteres especiales</div>';
            }

        }
    }
}