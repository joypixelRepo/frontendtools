﻿<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <a href="/"><div class="logo"><img src="/assets/images/frontendtools-logo-desktop.svg" alt="frontendtools-logo"></div></a>
                    </div>
                </div>
                <form class="col-lg-12" id="sign_in" method="POST" action="/user/sign_in">
                    <input type="hidden" name="url" value="<?= isset($_GET['url']) ? urldecode($_GET['url']) : '' ?>">
                    <h5 class="title">Acceder como usuario</h5>
                    <?php if(isset($_GET['e'])) { ?>
                    <div class="alert alert-danger mt-3">
                        El usuario introducido y/o la contraseña son incorrectos.
                    </div>
                    <?php } ?>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="user" class="form-control" required>
                            <label class="form-label">Usuario</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Contraseña</label>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-amber">
                        <label for="rememberme">Recordarme</label>
                    </div>
                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-large btn-raised bg-custom waves-effect" value="Entrar">
                    </div>
                </form>
                <div class="col-lg-12 m-t-20">
                    <a href="/<?= $_SERVER['VIEWS'] ?>/sign_up">Registro de nuevo usuario</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="/assets/bundles/libscripts.bundle.js"></script>    
<script src="/assets/bundles/vendorscripts.bundle.js"></script>
<script src="/assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>