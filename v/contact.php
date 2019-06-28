<section class="content pt-3">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="body">
            <h2>Contacta con frontendtools</h2>
            <div class="row">
              <div class="col-12">
                <p class="mb-4">Si tienes alguna pregunta que hacernos, estaremos encantado de atenderte.</p>
              </div>
              <div class="col-lg-4 col-xs-12">
                <div class="contact-info">
                  <div class="contact-detail">
                    <a href="mailto:info@frontendtools.net"><img src="/assets/images/contact.svg"> info@frontendtools.net</a>
                  </div>
                  <div class="contact-detail">
                    <a href="#"><img src="/assets/images/location.svg"> C/ Mayólica Nº5 1ºizq. 28037 Madrid.</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-xs-12">
                <div class="contact-form">
                  <h3>Escríbenos</h3>
                  <form action="/action/sendMessage" method="POST">
                    <input type="hidden" name="url" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>">
                    <input type="text" name="name" class="custom-input" placeholder="Nombre" required>
                    <input type="email" name="email" class="custom-input" placeholder="Correo electrónico" required>
                    <input type="text" name="subject" class="custom-input" placeholder="Asunto" required>
                    <textarea name="message" class="custom-textarea" placeholder="Mensaje" required></textarea>
                    <div class="g-recaptcha" data-sitekey="6LfZEqsUAAAAAPMQx77lOsDhyD35mpgzZfu06o3U"></div>
                    <input type="submit" class="btn btn-large btn-raised bg-custom waves-effect" value="Enviar mensaje">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
