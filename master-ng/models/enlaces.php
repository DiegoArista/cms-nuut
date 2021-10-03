<?php 

class EnlacesModels{
    public function enlacesModel($enlaces){
        if($enlaces == "inicio" ||
            $enlaces == "ingreso" ||
            $enlaces == "slides" ||
            $enlaces == "promos" ||
            $enlaces == "videos" ||
            $enlaces == "galeria" ||
            $enlaces == "menu" ||
            $enlaces == "ruleta" ||
            $enlaces == "encuestas" ||
            $enlaces == "suscriptores" ||
            $enlaces == "mensajes" ||
            $enlaces == "perfil" ||
            $enlaces == "salir"
            ){

             $module =   "views/modules/".$enlaces.".php";

        }
        else if($enlaces == "index"){
            $module =   "views/modules/ingreso.php";
        }
        else{
            $module =   "views/modules/ingreso.php";

        }
        return $module;
    }
}