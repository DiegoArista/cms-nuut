<?php include "views/modules/header-menu.php"; ?>

<!-- <script>
  $( document ).ready(function() {
    $('#promosModal').modal('toggle')
});
</script> -->











<!-- MAIN CONTENT -->

    <div class="container">
        <div class="main-menu">
          
            <h1 class="main-menu__title main-menu__title--line"> <span class="main-menu__title__circulo main-menu__title__circulo--l">•</span>   Menú <span class="main-menu__title__circulo main-menu__title__circulo--r">•</span></h1>
        
            <nav class="nav-secondary-menu">
                <ul class="nav-secondary-menu__content">
                    <li class="nav-secondary-menu__item"><a class="nav-secondary-menu__link" href="alimentos">Alimentos</a></li>
                    <li class="nav-secondary-menu__item"><a class="nav-secondary-menu__link" href="postres">Postres</a></li>
                    <li class="nav-secondary-menu__item"><a class="nav-secondary-menu__link" href="infantil">Menú Infantil</a></li>
                    <li class="nav-secondary-menu__item"><a class="nav-secondary-menu__link" href="bebidas">Bebidas</a></li>
                </ul>
            </nav>
        </div>

    </div>






<!-- Modal -->
<div class="modal fade" id="promosModal" tabindex="-1" role="dialog" aria-labelledby="promosModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="promosModalLabel">Nuestras Promociones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img width="100%" src="views/images/promos/Promos-Nuut.jpg" alt="Promociones Nuut" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>


















<!-- END MAIN CONTENT -->

<?php include "views/modules/footer-menu.php"; ?>

