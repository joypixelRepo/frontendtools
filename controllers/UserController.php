<?php
class UserController extends ApplicationController {

  private $user;

  public function __construct() {
    $this->user = new User();
  }

  public function sign_in() {
    $prevUrl = isset($_POST['url']) && !empty($_POST['url']) ? $_POST['url'] : '/';
    $prevUrl = urldecode($prevUrl);

    if($userData = $this->user->sign_in($_POST['user'], $_POST['password'])) {
      //session_start();
      $_SESSION['id'] = 'aR_3vG_88KlpZ';
      $_SESSION['user'] = $userData;

      if(isset($_POST['rememberme']) && $_POST['rememberme'] == 'on') {
        $cookieSession = [
          'user' => $userData['user'],
          'password' => $userData['password']
        ];
        // la cookie caducará en 1 año (31536000 segundos)
        setcookie('fet_net_session_login', serialize($cookieSession), time()+31536000, '/');
      } else {
        // eliminamos la cookie
        setcookie('fet_net_session_login', null, -1, '/');
      }

      parent::notify('success', 'Sesión iniciada', 'Has iniciado sesión correctamente.', $prevUrl);
    } else {
      header('Location: /'.$_SERVER['VIEWS'].'/sign_in?e');
    }
  }

  public function checkCookiesSession() {
    if(isset($_COOKIE['fet_net_session_login'])) {
      $cookieSession = unserialize($_COOKIE['fet_net_session_login']);
      $session = [
        'user' => $cookieSession['user'],
        'password' => $cookieSession['password'],
      ];

      if($userData = $this->user->sign_in_cookie($session['user'], $session['password'])) {
        $_SESSION['id'] = 'aR_3vG_88KlpZ';
        $_SESSION['user'] = $userData;
      }
    }
  }

  public function sign_up() {
    if($this->user->sign_up()) {
      parent::notify('success', 'Te has registrado satisfactoriamente', 'Te hemos enviado un email. Revisa tu correo electrónico para poder activar tu usuario (si no lo encuentras mira en la carpeta de spam).', '/'.$_SERVER['VIEWS'].'/sign_in');
    } else {
      parent::notify('error', 'Error en el registro', 'Ha ocurrido un error inesperado al registrarte. Por favor, prueba de nuevo.', '/'.$_SERVER['VIEWS'].'/sign_up');
    }
  }

  public function activate() {
    if($this->user->activateUser($_GET['user'], $_GET['code'])) {
      parent::notify('success', 'Cuenta activada', 'Ya puedes iniciar sesión con tu usuario y contraseña.', '/'.$_SERVER['VIEWS'].'/sign_in');
    } else {
      parent::notify('error', 'Cuenta no activada', 'No se ha podido activar tu cuenta. Por favor, verifica que el enlace de activación es el correcto.', '/'.$_SERVER['VIEWS'].'/sign_in');
    }
  }

  public function sign_out() {
    session_destroy();
    setcookie('fet_net_session_login', null, -1, '/');
    $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/';
    parent::notify('success', '¡Hasta pronto!', 'Has cerrado tu sesión correctamente.', urldecode($prevUrl));
  }

  public function changeImage() {
    $this->user->changeImage();
  }

  public function userExist() {
    $this->user->userExist();
  }

  public function emailExist() {
    $this->user->emailExist();
  }

  public function __destruct() {
    
  }
}
