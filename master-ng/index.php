<?php
require_once "models/enlaces.php";
require_once "controllers/template.php";
require_once "controllers/enlaces.php";
require_once "controllers/gestorSlide.php";
// require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorVideos.php";

require_once "controllers/gestorMensajes.php";
require_once "controllers/gestorSuscriptores.php";
require_once "controllers/gestorPerfiles.php";
require_once "controllers/preguntasController.php";
require_once "controllers/premiosController.php";
require_once "controllers/respuestasController.php";
require_once "controllers/categoriesMenuController.php";
require_once "controllers/subcategoriesMenuController.php";


require_once "models/subcategoriesMenuModel.php";
require_once "models/categoriesMenuModel.php";
require_once "models/respuestasModel.php";
require_once "models/premiosModel.php";
require_once "models/preguntasModel.php";
require_once "models/gestorPerfiles.php";
require_once "models/gestorSuscriptores.php";
require_once "models/gestorMensajes.php";

require_once "models/gestorVideos.php";
require_once "models/gestorGaleria.php";
// require_once "models/gestorArticulos.php";
require_once "models/gestorSlide.php";

require_once "models/ingreso.php";
require_once "controllers/ingreso.php";

$template = new TemplateController();
$template -> template();