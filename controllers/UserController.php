<?php
class UserController {

  private $user;

  public function __construct() {
    $this->user = new User();
  }

  public function sign_in() {
    $prevUrl = isset($_POST['url']) && !empty($_POST['url']) ? $_POST['url'] : '/';

    if($userData = $this->user->sign_in()) {
      //session_start();
      $_SESSION['id'] = 'aR_3vG_88KlpZ';
      $_SESSION['user'] = $userData;
      header('Location: '.urldecode($prevUrl));
    } else {
      header('Location: /'.$_SERVER['VIEWS'].'/sign_in?e');
    }
  }

  public function sign_up() {
    if($this->user->sign_up()) {
      die('usuario creado.');
    }
  }

  public function sign_out() {
    session_destroy();
    $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/';
    header('Location: '.urldecode($prevUrl));
  }

  public function changeImage() {
    $this->user->changeImage();
  }

  public function __destruct() {
    
  }
}
