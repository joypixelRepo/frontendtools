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
              <input type="text" name="user" class="custom-input" minlength="3" maxlength="20" placeholder="Nombre de usuario" required>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-4">
              <input type="text" name="job" class="custom-input" placeholder="Ocupación">
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
              <input type="text" name="github" class="custom-input sign_up_icon" placeholder="https://github.com/...">
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <span class="title">Elige un avatar</span>
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
              <input type="checkbox" name="conditions" id="conditions" class="filled-in chk-col-amber">
              <label for="conditions">Acepto las <a href="#">condiciones generales de uso</a>.</label>
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
  <script src="/assets/bundles/vendorscripts.bundle.js"></script>
  <script src="/assets/bundles/mainscripts.bundle.js"></script>
  <script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="/assets/js/custom/autentication.js"></script>
</body>
</html>