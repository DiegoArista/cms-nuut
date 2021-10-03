<?php 

class EnlacesModels{
    public function enlacesModel($enlaces){
       
       
        if(  $enlaces == "inicio" ||
        $enlaces == "login" ||
        $enlaces == "encuestas" ||
             $enlaces == "menu" 

            
             
             
             
             
             ){

             $module =   "views/modules/".$enlaces.".php";

        }
        else if($enlaces == "index"){
            $module =   "views/modules/inicio.php";
        }
        // else if($enlaces == "login"){
        //     $module =   "/login";
        // }
        else if($enlaces == "menu/alimentos"){
            $module =   "views/modules/menu/".$enlaces.".php";
        }
       
        else if( $enlaces == "alimentos"||
        $enlaces == "entradas" ||
        $enlaces == "tacos" ||
        $enlaces == "tacos-tostadas-y-volcanes" ||
        $enlaces == "del-mar-a-tu-mesa" ||
        $enlaces == "pastas" ||
        $enlaces == "sopas" ||
        $enlaces == "saludable" ||
        $enlaces == "promociones2" ||
        $enlaces == "promociones1" ||
        $enlaces == "pizzas" ||
        $enlaces == "compartir" ||
        $enlaces == "mixologia" ||
       
        $enlaces == "grill" ||
        $enlaces == "ensaladas" ||
        $enlaces == "creaciones" ||
        $enlaces == "cervezas" ||
        $enlaces == "cafe" ||
        $enlaces == "sinalcohol" ||
        $enlaces == "aperitivos" ||
        $enlaces == "acompanamientos" ||
        $enlaces == "postres" ||
        $enlaces == "infantil" ||
        $enlaces == "bebidas" ){
           

     
            $module =   "views/modules/menu/".$enlaces.".php";
        }
       
        else{
            $module =   "views/modules/inicio.php";

        }
        return $module;
    }
}