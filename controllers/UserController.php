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

      parent::notify('success', LANG['session_started'], LANG['session_sucefull'], $prevUrl);
    } else {
      header('Location: /'.$_SERVER['VIEWS'].'/sign_in?e');
    }
  }

  public function sign_up() {
    if(self::validate_sign_up()) {
      if($this->user->sign_up()) {
        parent::notify('success', LANG['sign_up_sucefull'], LANG['email_sign_up_sent'], '/'.$_SERVER['VIEWS'].'/sign_in', 0);
      } else {
        parent::notify('error', LANG['sign_up_error'], LANG['sign_up_error_text'], '/'.$_SERVER['VIEWS'].'/sign_up');
      }
    } else {
      parent::notify('error', LANG['sign_up_error'], LANG['sign_up_error_text'], '/'.$_SERVER['VIEWS'].'/sign_up');
    }
  }

  private function validate_sign_up() {
    if(
      preg_match('/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/i', $_POST['full-name'])
      &&
      preg_match('/^[a-z0-9]{3,20}$/i', $_POST['user'])
      &&
      preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])
      &&
      preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])?[A-Za-z\d@$!%*?&]{6,30}$/', $_POST['password'])
      &&
      (isset($_POST['avatar']) && !empty($_POST['avatar']))
      &&
      (isset($_POST['conditions']) && $_POST['conditions'] == 'on')
    ) {
      return true;
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

  public function activate() {
    if($this->user->activateUser($_GET['user'], $_GET['code'])) {
      parent::notify('success', LANG['account_activated'], LANG['now_you_can_login'], '/'.$_SERVER['VIEWS'].'/sign_in');
    } else {
      parent::notify('error', LANG['account_no_activated'], LANG['account_no_activated_text'], '/'.$_SERVER['VIEWS'].'/sign_in');
    }
  }

  public function sign_out() {
    session_destroy();
    setcookie('fet_net_session_login', null, -1, '/');
    $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/';
    parent::notify('success', LANG['see_you_soon'], LANG['logout_sucefull'], urldecode($prevUrl));
  }

  public function deleteAccount() {
    if($this->user->deleteAccount()) {
      session_destroy();
      setcookie('fet_net_session_login', null, -1, '/');
      $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/';
      parent::notify('success', LANG['come_back_when_you_want'], LANG['account_deleted_sucefull'], urldecode($prevUrl));
    }
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

  public function editProfile() {
    if($this->user->editProfile()) {
      $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/v/profile';
      parent::notify('success', LANG['change_made'], LANG['profile_edited_correctly'], urldecode($prevUrl));
    } else {
      $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/v/profile';
      parent::notify('error', LANG['error_title'], LANG['error_editing_profile'], urldecode($prevUrl));
    }
  }

  public function __destruct() {
    
  }
}
