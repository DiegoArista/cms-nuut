<?php

class MensajesController{
    public function mostrarMensajesController(){
       

            $respuesta = MensajesModel::seleccionarMensajesModel("mensajes");
            
            foreach($respuesta as $row => $item){
                        
                echo ' <div class="well well-sm" id="'.$item["id"].'">
                   
                        <a href="index.php?action=mensajes&idBorrar='.$item["id"].'"> <span class="fa fa-times pull-right"></span></a>
                        <p>Fecha: '.$item["fecha"].'</p>
                        <h3>De: '.$item["nombre"].'</h3>
                        <h5>Email:  '.$item["email"].'</h5>
                        <input type="text" class="form-control" value="'.$item["mensaje"].'" readonly>
                        <button class="btn btn-info btn-sm leerMensaje">Leer</button>

                    </div>';
    
            }
    
        }


        #-----ELIMINAR MENSAJE ------------------

    public function borrarMensajesController(){
        if(isset($_GET["idBorrar"])){
            $datosController =  $_GET["idBorrar"];
            $respuesta = MensajesModel::borrarMensajeModel($datosController, "mensajes");
            if ($respuesta == "ok") {
                echo ' <script>
                swal({
                    title: "¡OK!",
                    text: "¡El mensaje se ha borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "mensajes"; 
                        }
                  });
                </script>
                ';
            }

        }
      
        
     
      


    }

    #RESPONDER MENSAJES --------------------------------------------

    public function responderMensajesController(){
        if (isset($_POST["enviarEmail"])) {
            $email = $_POST["enviarEmail"];
            $nombre = $_POST["enviarNombre"];
            $titulo = $_POST["enviarTitulo"];
            $mensaje = $_POST["enviarMensaje"];

            $para =  $email. ', ';//concatenamos el espacio y ponemos la coma para separar
            $para .= 'diego_arista@outlook.com';

            $titulo = 'Respuesta a su mensaje';
            $mensaje = '<html>
                                <head>
                                    <title>Respuesta a su Mensaje</title>
                                </head>
                                <body>
                                <h1>Hola '.$nombre.'</h1>
                                <p>'.$mensaje.'</p>
                                <hr>
                                <p><b>Ever deen</b></p>
                                Ever Deen tutoriales<br>
                                Sinahua, Guerrero</br>
                                Whatsapp +52 344 34 34</br>
                                Diseño de sitios web</p>
                                <a  href="https://www.instagram.com/sinahuagro/" target="blank" ><img width="50px" src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"></a>
                                <img width="100px" src="https://sinahua.com.mx/assets/images/logo_svg.svg">


                            </body>

                        </html>';
                        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras = 'Content-type: text/html; charset=UTF-8' . "\r\n";
                        $cabeceras = 'FROM: <darista319@gmail.com>' . "\r\n";
                        $envio = mail($para, $titulo, $mensaje, $cabeceras);
                    if($envio){
                        echo ' <script>
                                swal({
                                    title: "¡OK!",
                                    text: "¡El correo se ha enviado correctamente!",
                                    type: "success",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                    },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location = "mensajes"; 
                                        }
                                });
                                </script>
                        ';

                    }

        }
    }


#MENSAJES MASIVOS-----------------------------------
                    public function mensajesMasivosController(){

                        if(isset($_POST["tituloMasivo"])){
                            $respuesta = MensajesModel::seleccionarEmailSuscriptores("suscriptores");
                           
                           foreach($respuesta as $row => $item){
                           
                            $titulo = $_POST["tituloMasivo"];
                            $mensaje = $_POST["mensajeMasivo"];

                            
                            $título = 'Mensaje para todos';

                            $para = $item["email"];

                            $mensaje = '<html>
                                            <head>
                                                <title>Respuesta a su Mensaje</title>
                                            </head>
                                            <body>
                                            <h1>Hola '.$item["nombre"].'</h1>
                                            <p>'.$mensaje.'</p>
                                            <hr>
                                            <p><b>Ever deen</b></p>
                                            Ever Deen tutoriales<br>
                                            Sinahua, Guerrero</br>
                                            Whatsapp +52 344 34 34</br>
                                            Diseño de sitios web</p>
                                            <a  href="https://www.instagram.com/sinahuagro/" target="blank" ><img width="50px" src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"></a>
                                            <img width="100px" src="https://sinahua.com.mx/assets/images/logo_svg.svg">


                                            </body>
                                        </html>';
                                        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                                        $cabeceras = 'Content-type: text/html; charset=UTF-8' . "\r\n";
                                        $cabeceras = 'FROM: <darista319@gmail.com>' . "\r\n";
                                        $envio = mail($para, $titulo, $mensaje, $cabeceras);
                                    if($envio){
                                        echo ' <script>
                                                swal({
                                                    title: "¡OK!",
                                                    text: "¡El correo se ha enviado correctamente!",
                                                    type: "success",
                                                    confirmButtonText: "Cerrar",
                                                    closeOnConfirm: false
                                                    },
                                                    function(isConfirm){
                                                        if (isConfirm) {
                                                            window.location = "mensajes"; 
                                                        }
                                                });
                                                </script>';

                                    }

                        }

                       
            
                        
                    }

                }




                #REVISAR MENSAJES------------------------------------------
			public function mesnajesSinRevisarController(){

                $respuesta = MensajesModel::mensajesSinRevisarModel("mensajes");

                $sumaRevision = 0;
              
//para cada item si la respuesta es igual a 0 la incrementa y la vuelve UNO por cada item que recorre el ciclo
                foreach($respuesta as $row => $item){
                    $totalMensajes = $item["revision"];
               
                    if( $totalMensajes == 0){
                        ++$sumaRevision;

                        echo '<span>'.$sumaRevision.'</span>';

                    }
                    

                    }

                



            }



            #MENSAJES REVISADOS--------------------------------
            public function mensajesRevisadosController($datos){
                $datosController = $datos;
                $respuesta = MensajesModel::mensajesRevisadosModel($datosController, "mensajes");
                echo $respuesta;
            }



}