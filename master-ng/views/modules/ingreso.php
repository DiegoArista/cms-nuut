
<div class="hold-transition login-page">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Nuut Grill</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicia Sesión</p>

      <form method="post" id="formIngreso" onsubmit="return validarIngreso">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="usuarioIngreso" id="usuarioIngreso" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
          </div>
          <!-- /.col -->
        </div>


		

      </form>


      <?php

$ingreso = new Ingreso();
$ingreso-> ingresoController();

?>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Iniciar Sesión con Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="#">Olvidé mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Registrar usuario</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<!-- div body class -->
</div>