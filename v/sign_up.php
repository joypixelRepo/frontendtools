<div class="authentication authentication-big">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <a href="/"><div class="logo"><img src="/assets/images/logo.png" alt="Nexa"></div></a>
                        <h1>Front End Tools</h1>
                        <ul class="list-unstyled l-social">
                            <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>                            
                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                        </ul>
                    </div>                        
                </div>
                <form class="col-lg-12" id="sign_in" method="POST" action="/user/sign_up">
                    <input type="hidden" name="url" value="<?= isset($_GET['url']) ? urldecode($_GET['url']) : '' ?>">
                    <input type="hidden" name="avatar" value="" >
                    <h5 class="title">Registro de nuevo usuario</h5>
                    <?php if(isset($_GET['e'])) { ?>
                    <div class="alert alert-danger mt-3">
                        El usuario introducido y/o la contraseña son incorrectos.
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="full-name" class="form-control" required>
                                    <label class="form-label">Nombre y apellidos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="user" class="form-control" minlength="3" maxlength="20" required>
                                    <label class="form-label">Nombre de usuario</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" class="form-control" required>
                                    <label class="form-label">Correo electrónico</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" required>
                                    <label class="form-label">Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="passwordConfirm" class="form-control" required>
                                    <label class="form-label">Confirmar contraseña</label>
                                </div>
                            </div>
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
<script src="/assets/js/custom/autentication.js"></script>
</body>
</html>