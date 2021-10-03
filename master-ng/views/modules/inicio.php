<?php 
session_start();
//Validamos la sesion si es false nos redirige al formualrio de inicio de sesion
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/top.php";
// include "views/modules/header.php";
?>




			
			
			

 <!-- Small boxes (Stat box) -->
 <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h4>Slider</h4>
               <!-- <p>6</p> -->
              </div>
              <div class="icon">
                <i class="fa fa-layer-group"></i>
              </div>
              <a href="#" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Promos</h4>

            
              </div>
              <div class="icon">
                <i class="fa fa-percent"></i>
              </div>
              <a href="#" class="small-box-footer">Administar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Videos</h4>

              </div>
              <div class="icon">
                <i class="fa fa-play"></i>
              </div>
              <a href="#" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
			  <h4>Galería</h4>
               
              </div>
              <div class="icon">
                <i class="fa fa-images"></i>
              </div>
              <a href="#" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->




		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
			  <h4>Menú Digital</h4>
            
              </div>
              <div class="icon">
                <i class="fa fa-qrcode"></i>
              </div>
              <a href="menu" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

      <?php 
        if($_SESSION["rol"] == 0 || $_SESSION["rol"] == 1){

      echo ' <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                  <div class="inner">
                    <h4> Ruleta</h4>
                
                  </div>
                  <div class="icon">
                    <i class="fa fa-trophy"></i>
                  </div>
                  <a href="ruleta" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              ';
						}
					?>

          <?php 
						if($_SESSION["rol"] == 2 || $_SESSION["rol"] == 0){

					echo '


		  <div class="col-lg-3 col-6">
          
            <div class="small-box bg-light">
              <div class="inner">
			  <h4>Encuestas</h4>
            
              </div>
              <div class="icon">
                <i class="fa fa-question"></i>
              </div>
              <a href="encuestas" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          ';
						}
					?>


		  <?php 
						if($_SESSION["rol"] == 0){

					echo ' <div class="col-lg-3 col-6">
								<div class="small-box bg-dark">
								<div class="inner">
								<h4>Clientes VIP</h4>
								
								</div>
								<div class="icon">
									<i class="fa fa-user"></i>
								</div>
								<a href="#" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>';
						}
					?>

		 


        </div>
        <!-- /.row -->



       
       

				
		</div><!-- /.container-fluid -->
		



<?php
include "views/modules/footer.php"
?>