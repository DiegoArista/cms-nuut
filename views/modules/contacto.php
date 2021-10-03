<section class="ftco-section bg-light" id="seccion-contacto">
      <div class="container">
        <div class="row">

          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="display-4">Contáctanos</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Queremos saber qué piensas de nosotros.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-5 ftco-animate">

            <!-- <div class="d-flex justify-content-center align-items-center">
              <a  class="btn btn-primary btn-lg" href="mailto:darista319@gmail.com">Escribir correo</a>
            </div> -->
          
            <form  method="post" onsubmit="return validarMensaje()">
              <div class="form-group">
                <label for="name" class="sr-only">Nombre: </label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe tu nombre completo"  required>
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Correo: </label>
                <input  type="mail" class="form-control" name="email" id="email" placeholder="Escribe tu correo"  required>
              </div>
              <div class="form-group">
                <label for="message" class="sr-only">Mensaje: </label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10" class="form-control" placeholder="Escribe tu mensaje"  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" value="Enviar mensaje">
              </div>
            </form>
            <?php
						$mensajes = new MensajesController();
						$mensajes -> resgistroMensajesController();
					
					
					?>
          </div>
          
        </div>
      </div>
    </section>
    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.9303794624984!2d-100.35884198555172!3d20.631694406591507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d35bfea3d50dc3%3A0xf964c3ffd9ebefe!2sNUUT%20GRILL!5e0!3m2!1ses-419!2smx!4v1628031637407!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


    </div>
    <!-- END section -->