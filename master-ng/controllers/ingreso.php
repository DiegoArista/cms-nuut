<?php 

class Ingreso{
    public function ingresoController(){
        if (isset($_POST["usuarioIngreso"])) {
           
      

            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioIngreso"]) &&
                preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordIngreso"])){

                    $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $datosController = array("usuario" => $_POST["usuarioIngreso"],
                                            "password" => $encriptar);
                
                $respuesta = IngresoModels::ingresoModel($datosController, "usuarios");

                $intentos = $respuesta["intentos"];
                $usuarioActual =  $_POST["usuarioIngreso"];
                $maximoIntentos = 2;
                //RECAPTCHA
                // if (isset($_POST["g-recaptcha-response"])) {
                //     $secret = "6LfR71gbAAAAAK-0JUPUjKy4aIrPoz0P_X_UVdnG";
                //     $response = $_POST["g-recaptcha-response"];
                //     $remoteip = $_SERVER["REMOTE_ADDR"];
                //     $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
                
                //     $array = json_decode($result, TRUE);

                //     if($array["success"]){
                //         $intentos = 0;
                //     }
                // }



                if($intentos <  $maximoIntentos){ 


                    if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"]  == $encriptar){

                        $intentos = 0; 
                        $datosController = array("usuarioActual" =>  $usuarioActual, "actualizarIntentos" =>$intentos);
                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");
                        
                        session_start();
                        //definimos las variables de sesion
                        $_SESSION["validar"] = true;
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["photo"] = $respuesta["photo"];
                        $_SESSION["rol"] = $respuesta["rol"];
                        header("location:inicio");
                    }
                        else {
                            ++$intentos;
                            $datosController = array("usuarioActual" =>  $usuarioActual, "actualizarIntentos" =>$intentos);
                            $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");



                            echo "<div class='alert alert-danger'>Error al ingresar</di>";
                        }
                    
                    }
                    else {
                        // $intentos = 0; 
                        $datosController = array("usuarioActual" =>  $usuarioActual, "actualizarIntentos" =>$intentos);
                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");
                    
                    
                        echo "<div class='alert alert-danger'>Ha fallado tres veces, compruebe el catcha</div>
                        
                        <div class='g-recaptcha' data-sitekey='6LfR71gbAAAAAIsUYYueJNcJ3hXUS_TOaYTcf_Ly'></div>
                        ";
                
                       
                    }
                }
            }
    }
}