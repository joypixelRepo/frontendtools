<div class="authentication authentication-big">
  <div class="card">
    <div class="body">
      <div class="row">
        <div class="col-lg-12">
          <div class="header slideDown">
            <a href="/"><div class="logo"><img src="/assets/images/frontendtools-logo-desktop.svg" alt="frontendtools-logo"></div></a>
          </div>
        </div>
        <form class="col-lg-12" id="sign_up" method="POST" action="/user/sign_up">
          <input type="hidden" name="url" value="<?= isset($_GET['url']) ? urldecode($_GET['url']) : '' ?>">
          <input type="hidden" name="avatar" value="" >
          <div class="mb-4">
            <h5 class="title">Registro de nuevo usuario</h5>
            <span class="font-11">Los campos marcados con (*) son obligatorios</span>
          </div>

          <div class="row">
            <div class="col-md-6 col-12 mb-4">
              <input type="text" name="full-name" class="custom-input" placeholder="Nombre y apellidos" required>
            </div>
            <div class="col-md-6 col-12 mb-4">
              <input type="text" name="user" class="custom-input" minlength="3" maxlength="20" placeholder="Nombre de usuario" autocomplete="never" required>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-4">
                <select class="custom-select" name="job">
                  <option value="-1" selected class="disabled">- Selecciona a qué te dedicas -</option>
                  <option value="Web Designer">Web Designer</option>
                  <option value="Front End Developer">Front End Developer</option>
                  <option value="UI Designer">UI Designer</option>
                  <option value="UX Designer">UX Designer</option>
                  <option value="Interaction Designer">Interaction Designer</option>
                  <option value="Art Director">Art Director</option>
                  <option value="Web Developer">Web Developer</option>
                  <option value="Full Stack Developer">Full Stack Developer</option>
                  <option value="Content Strategist">Content Strategist</option>
                  <option value="IT Technician">IT Technician</option>
                  <option value="Dev Ops">Dev Ops</option>
                  <option value="Product Manager">Product Manager</option>
                  <option value="Customer Service Representative">Customer Service Representative</option>
                  <option value="SEO Specialist">SEO Specialist</option>
                  <option value="Graphic Designer">Graphic Designer</option>
                  <option value="Software Engineer / Programmer">Software Engineer / Programmer</option>
                  <option value="Otro">Otro</option>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-12 mb-4">
              <input type="email" name="email" class="custom-input" placeholder="Correo electrónico" required>
            </div>
            <div class="col-md-6 col-12 mb-4">
              <input type="email" name="emailConfirm" class="custom-input" placeholder="Confirmar correo electrónico" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-12 mb-4">
              <input type="password" name="password" class="custom-input" placeholder="Contraseña" required>
            </div>
            <div class="col-md-6 col-12 mb-4">
              <input type="password" name="passwordConfirm" class="custom-input" placeholder="Confirmar contraseña" required>
            </div>
          </div>

          <div class="row">
            <div class="col-1 mb-4">
              <img class="icon-social" src="/assets/images/github.svg">
            </div>
            <div class="col-11 mb-4">
              <input type="text" name="github" class="custom-input sign_up_icon" placeholder="https://github.com/..." pattern="https:\/\/github.com\/(.+)">
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div>
                <span class="title">Elige un avatar</span>
              </div>
              <span class="font-11">(podrás cambiarlo después)</span>
            </div>
            <div class="col-12">
              <div class="avatars">
                <? foreach ($avatars['files'] as $avatar) { ?>
                  <a href="#" data-image="<?= $avatar ?>"><img src="<?= $avatar ?>" alt="avatar"/></a>
                  <? } ?>
                </div>
              </div>
            </div>



            <div>
              <input type="checkbox" name="conditions" id="conditions" class="filled-in chk-col-amber" required>
              <label for="conditions">Al enviar el formulario, acepto la <a href="#" data-toggle="modal" data-target="#lopd">política de privacidad</a> de este sitio web.</label>
            </div>
            <div class="col-lg-12">
              <input type="submit" class="btn btn-large btn-raised bg-custom waves-effect" value="Registrarme">
            </div>
            <div class="col-lg-12" id="errors"></div>
          </form>
          <div class="col-lg-12 m-t-20">
            <a href="/<?= $_SERVER['VIEWS'] ?>/sign_in">Ya estoy registrado</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery Core Js -->
  <script src="/assets/bundles/libscripts.bundle.js"></script>    
  <script src="/assets/bundles/mainscripts.bundle.js"></script>
  <script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="/assets/js/custom/autentication.js"></script>
</body>
</html>