 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fa fa-layer-group"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-percent"></i>
              <p>
                Promos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-play"></i>
              <p>
                Videos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-images"></i>
              <p>
                Galería
              </p>
            </a>
          </li> -->

          <?php 
        if($_SESSION["rol"] == 0){

      echo '

          <li class="nav-item">
            <a href="menu" class="nav-link">
              <i class="nav-icon fa fa-qrcode"></i>
              <p>
              Menú Digital
              </p>
            </a>
          </li> 
          ';
        }
      ?>

          <?php 
        if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 0){

      echo '




          
          <li class="nav-item">
            <a href="ruleta" class="nav-link">
              <i class="nav-icon fa fa-trophy"></i>
              <p>
              Ruleta
              </p>
            </a>
          </li>
          ';
        }
      ?>

<?php 
        if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 0){

      echo '

          <li class="nav-item">
            <a href="encuestas" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
              Encuestas
              </p>
            </a>
          </li>

          ';
        }
      ?>


          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              Suscriptores
              </p>
            </a>
          </li>-->


          <?php 
        if($_SESSION["rol"] == 0){

      echo '
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
              Clientes VIP
              </p>
            </a>
          </li> 

          ';
        }
      ?>





          
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->