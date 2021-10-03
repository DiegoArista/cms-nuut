
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="views/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="views/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="views/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--=====================================
			 CABEZOTE             
			======================================-->

			
			<div id="cabezote" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					

				<?php

				if ($_SESSION["rol"] == 0) {
				echo  '<ul>
						<li  style="background: #333">
							<a href="mensajes" style="color: #fff">
                  			<i class="fa fa-envelope"></i> ';
                  			
							  
							  $revisarMensajes = new MensajesController();
							  $revisarMensajes ->  mesnajesSinRevisarController();


							 
							
                		echo '</a>
						</li>

						<li  style="background: #333">
							<a href="suscriptores" style="color: #fff">
                  			<i class="fa fa-bell"></i>';
							  
							  $revisarSuscriptores = new SuscriptoresController();
							  $revisarSuscriptores ->  suscriptoresSinRevisarController();


							
                			echo '</a>
						</li>
						
					</ul>';

}
?>

				</div>

				<div id="time" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					

					<div class="text-center">
					<br>
					<?php 

					switch (date("l")) {
						case 'Monday':
						$dia = "Lunes";
						break;
						case 'Tuesday':
							$dia = "Martes";
						break;
						case 'Wenesday':
							$dia = "Miércoles";
						break;
						case 'Thursday':
							$dia = "Jueves";
						break;
						case 'Friday':
							$dia = "Viernes";
						break;
						case 'Saturday':
							$dia = "Sábado";
								break;
						case 'Sunday':
							$dia = "Domingo";
								break;
						
			
					}

					switch(date("F")){
						case "January":
						$mes = "Enero";
						break;
						case "February":
						$mes = "Febrero";
						break;
						case "March":
						$mes = "Marzo";
						break;
						case "April":
						$mes = "Abril";
						break;
						case "May":
						$mes = "Mayo";
						break;
						case "June":
						$mes = "Junio";
						break;
						case "July":
						$mes = "Julio";
						break;
						case "August":
						$mes = "Agosto";
						break;
						case "September":
						$mes = "Septiembre";
						break;
						case "October":
						$mes = "Octubre";
						break;
						case "November":
						$mes = "Noviembre";
						break;
						case "December":
						$mes = "Diciembre";
						break;	
					}


					echo $dia.", ".date("d")." de ".$mes." de ".date("Y");
					?>

					</div>
					<div class="text-center">
					<?php

						date_default_timezone_set("America/Mexico_City");

						echo '<div id="hora" hora="'.date("h").'" minutos="'.date("i").'"  segundos="'.date("s").'" meridiano="'.date("a").'"></div>';

					?>
				</div>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
					
					<img src="<?php   echo $_SESSION["photo"]  ?>" class="img-circle">
					
					<p id="member"><?php  echo $_SESSION["usuario"] ?>  <span class="fa fa-chevron-down"></span>
						<br>
						<ol id="admin">
							<li><a href="perfil"><span class="fa fa-user"></span>Editar Perfil</a></li>
							<li><a href=""><span class="fa fa-file-text"></span>Términos y Condiciones</a></li>
							<li><a href="salir"><span class="fa fa-times"></span>Salir</a></li>
						</ol>

					</p>

				</div>

			</div>




			
<script>

/*=============================================
RELOJ DINÁMICO        
=============================================*/

function reloj(){
	//buscamos el id hora y sus atributos y obteneos el valor
	hora = $("#hora").attr("hora");
	minutos = $("#hora").attr("minutos");
	segundos = $("#hora").attr("segundos");
	meridiano = $("#hora").attr("meridiano");
	//con setInterval decimos que se ejecute cada segundo = 1000
	setInterval(function(){
		
//cuando los segundos sea mayor  a 59 el minuto incremente mas uno y los segundos valen 0 y sigue incrementando
		if(segundos == 59){

			segundos = "0" + 0;

			minutos = Number(minutos) + 1;

		}

		else{

			segundos++;
//si segundo esta entre cero y 10 le agregamos a segundos un cero
			if(segundos > 0 && segundos < 10){
//se vuelva cero y siga incrementando
				segundos = "0" + segundos++;

			}

		}
//cuando los minutos sean mayor que 59 la pagina se recarga
		if(minutos > 59){

			window.location.reload();

		}
		//agregamos contenido html 
		
		$("#hora").html(hora+":"+minutos+":"+segundos+" "+meridiano)

	},1000);

}

reloj();

</script>

			<!--====  Fin de CABEZOTE  ====-->