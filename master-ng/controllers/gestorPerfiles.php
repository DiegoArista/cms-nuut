<?php


class GestorPerfiles{
    public function guardarPerfilController(){
        if (isset($_POST["nuevoUsuario"])) {
            $ruta = "";
            if (isset( $_FILES["nuevaImagen"]["tmp_name"])) {
            

            $imagen = $_FILES["nuevaImagen"]["tmp_name"];
            $aletorio = mt_rand(100,999);
            $ruta = "views/images/perfiles/perfil".$aletorio.".jpg";
            $origen = imagecreatefromjpeg($imagen);
            //imagecrop() recorta una imagen usando las coordenadas, el tamaño, x y y, ancho y alto
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 100, "height" => 100]);
            //propiedad o método de php imagejpeg() manejamos el translado del temporal a la ruta deseada (subida al servidor)
            imagejpeg($destino, $ruta);
            }
            if ($ruta  == "") {
                $ruta = "views/images/photo.jpg";
            }



            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]*$/', $_POST["nuevoPassword"])&&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"])
                ){
                     $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                        $datosController = array("usuario" => $_POST["nuevoUsuario"],
                                                "password" => $encriptar,
                                                "email" => $_POST["nuevoEmail"],
                                                "rol" => $_POST["nuevoRol"], 
                                                "photo" => $ruta);

                        $respuesta = GestorPerfilesModel::guardarPerfilModel($datosController, "usuarios");

                        if ($respuesta == "ok") {
                            echo ' <script>
                            swal({
                                title: "¡OK!",
                                text: "¡El usuario se ha registrado correctamente!",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                },
                                function(isConfirm){
                                    if (isConfirm) {
                                        window.location = "perfil"; 
                                    }
                              });
                            </script>';
                        }
            
            } else {
                echo '<div class= "alert alert-warning alerta text-center"> <b> ¡Error!</b> No ingrese caracteres especiales.</div>';
            }

        }


    }
/*=============VISUALIZAR PERFILL=============
===============================================================*/



    public function verPerfilController(){
        $respuesta = GestorPerfilesModel::verPerfilesModel("usuarios");
        $rol ="";
        foreach($respuesta as $row => $item){

            if ($item["rol"] == 0) {
                $rol = "Administrador";
            }else{
                $rol = "Editor";

            }
    
            echo '<tr>
                    <td>'.$item["usuario"].'</td>
                    <td>'.$rol.'</td>
                    <td>'.$item["email"].'</td>
                    <td>
                    <a href="#perfil'.$item["id"].'" data-toggle="modal"><button type="button" class="btn btn-info  "><i class="fas fa-user-edit"></i> </button></a>
                    <a href="index.php?action=perfil&idBorrar='.$item["id"].'&borrarImg='.$item["photo"].'"><button class="btn btn-danger "><i class="fas fa-user-times"></i> </button></a>
                    
                    </td>
                </tr>
                
                <div id="perfil'.$item["id"].'" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border:1px solid #eee;">
                                    <h3 class="modal-title">Editar Perfil</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"  style="border:1px solid #eee;">

                                    <form  style="padding:0PX 10px;" method="post" enctype="multipart/form-data" class="text-center">
                                    <input type="hidden" name="idPerfil" value="'.$item["id"].'">
                                    
                                    <div class="form-group">
                                    
                                    <input name="editarUsuario" type="text"  value="'.$item["usuario"].'"  class="form-control"  required>
                
                                    </div>
                
                                    <div class="form-group">
                
                                        <input name="editarPassword" type="password" placeholder="Ingrese la contraseña con 10 caracteres"  maxlength="10"  class="form-control" required>
                
                                    </div>
                
                                    <div class="form-group">
                
                                        <input name="editarEmail" type="email" value="'.$item["email"].'" class="form-control" required>
                
                                    </div>
                
                                    <div class="form-group">
                
                                    <select name="editarRol" class="form-control" required>
                
                                        <option value="">Seleccione el Rol</option>
                                        <option value="0">Administrador</option>
                                        <option value="1">Mesero</option>
                                        <option value="2">Recepcionista</option>
                
                                    </select>
                
                                    </div>
                
                                    <div class="form-group text-center">
                                        <div style="display:block">
                                            <img src="'.$item["photo"].'" alt="Imagen de usuario" width="20%" class="img-circle">        
                                          
                                            <input type="hidden" name="editarPhoto" value="'.$item["photo"].'">
                                        </div>

                                        <div class="custom-file">
							
                                            <input type="file" class="custom-file-input" name="editarImagen" >
                                            <label class="custom-file-label" for="fotoPerfil">Seleccionar archivo...</label>
                                        </div>
                                       



                                        <p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>
                
                                    </div>
                
                                    <div class="form-group text-center">

                                        <input type="submit" id="guardarPerfil" value="Actualizar Perfil" class="btn btn-primary">

                                    </div>
                
                                </form>
                                   
                                </div>
                                <div class="modal-footer"  style="border:1px solid #eee">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                    </div>
                </div>
                ';

        }
    }

/*=============EDITAR PERFILL=============
===============================================================*/

    public function editarPerfilController(){
        if (isset($_POST["editarUsuario"])) {
            $ruta = "";
            if(isset($_FILES["editarImagen"]["tmp_name"])) {
            

            $imagen = $_FILES["editarImagen"]["tmp_name"];
            $aletorio = mt_rand(100,999);
            $ruta = "views/images/perfiles/perfil".$aletorio.".jpg";
            $origen = imagecreatefromjpeg($imagen);
            //imagecrop() recorta una imagen usando las coordenadas, el tamaño, x y y, ancho y alto
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 100, "height" => 100]);
            //propiedad o método de php imagejpeg() manejamos el translado del temporal a la ruta deseada (subida al servidor)
            imagejpeg($destino, $ruta);
            }
            if ($ruta  == "") {
                $ruta =  $_POST["editarPhoto"];
            }
            //si la ruta viene llena pero tambien se cambio la foto y no es la ruta por defecto se elimina la foto antigua
            if ($ruta  != "" && $_POST["editarPhoto"] != "views/images/photo.jpg") {
                //eliminamos la foto creada en la carpeta perfiles
               unlink($_POST["editarPhoto"]);
            }



            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["editarUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]*$/', $_POST["editarPassword"])&&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"])
                ){
                     $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                        $datosController = array("id" => $_POST["idPerfil"],
                                                "usuario" => $_POST["editarUsuario"],
                                                "password" => $encriptar,
                                                "email" => $_POST["editarEmail"],
                                                "rol" => $_POST["editarRol"], 
                                                "photo" => $ruta);

                        $respuesta = GestorPerfilesModel::editarPerfilModel($datosController, "usuarios");

                        if ($respuesta == "ok") {


                            if (isset($_POST["actualizarSesion"])) {
                                
                            
                                $_SESSION["usuario"] = $_POST["editarUsuario"];
                                $_SESSION["id"] = $_POST["idPerfil"];
                                $_SESSION["password"] =  $encriptar;
                                $_SESSION["email"] = $_POST["editarEmail"];
                                $_SESSION["photo"] = $ruta;
                                $_SESSION["rol"] = $_POST["editarRol"];
                            }

                            echo ' <script>
                            swal({
                                title: "¡OK!",
                                text: "¡El usuario se ha actualizado correctamente!",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                },
                                function(isConfirm){
                                    if (isConfirm) {
                                        window.location = "perfil"; 
                                    }
                              });
                            </script>';
                        }
            
            }
            else {
                echo '<div class= "alert alert-warning alerta text-center"> <b> ¡Error!</b> No ingrese caracteres especiales.</div>';
            }

        }


    }


    #Borrar perfil ------------------------------------------------------------
    public function borrarPerfilController(){
        if(isset($_GET["idBorrar"])){
            $datosController =  $_GET["idBorrar"];
            $idImagen = $_GET["borrarImg"];
         

            if($idImagen == "views/images/photo.jpg"){
                $idImagen = "";
            }
            unlink($idImagen);
            $respuesta = GestorPerfilesModel::borrarPerfilModel($datosController, "usuarios");
            if ($respuesta == "ok") {
                echo ' <script>
                swal({
                    title: "¡OK!",
                    text: "¡El usuario se ha borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "perfil"; 
                        }
                  });
                </script>
                ';
            }

        }

    }









}





