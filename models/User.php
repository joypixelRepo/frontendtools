<?php
class User extends ApplicationController {

  private $db;
  private $sessionUser;

  public function __construct() {
    $this->db = new Db();
    $this->sessionUser = isset($_SESSION['user']['user']) ? $_SESSION['user']['user'] : null;
  }

  public function sign_in() {
    $sql = 'SELECT * FROM login WHERE user = ? AND password = ? AND active = ?';
    $vars = [$_POST['user'], self::encrypt($_POST['password']), 1];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function sign_up() {
    $sql = 'INSERT INTO login SET user = ?, email = ?, password = ?, name = ?, image = ?, rol = ?, active = ?';
    $vars = [$_POST['user'], $_POST['email'], self::encrypt($_POST['password']), $_POST['full-name'], $_POST['avatar'], 'user', 0];
    $res = $this->db->query($sql, $vars)->rowCount();

    if($res == 1) {
      self::sendActivationEmail($_POST['user'], $_POST['full-name'], $_POST['email']);
      return true;
    }
  }

  private function sendActivationEmail($user, $name, $email) {
    $cred = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config/email.ini', true);

    $config = [
      'email'     => $cred['email'],
      'name'      => $cred['name'],
    ];

    $to = $email;
    $subject = 'Activar cuenta en Frontendtools';

    $message = '
<html>
<head>
  <title>Activar cuenta en Frontendtools</title>
</head>
<body>
  <h3>Hola '.$name.'</h3>
  <p>Haz click en el siguiente enlace para activar tu cuenta en Frontendtools:</p>
  <p><a href="https://'.$_SERVER['SERVER_NAME'].'/user/activate?user='.$user.'&code='.self::activationCode($user).'">Activar mi cuenta</a></p>
  <p>Si no puedes acceder al enlace, copia y pega el siguiente código en la barra de direcciones de tu navegador:</p>
  https://'.$_SERVER['SERVER_NAME'].'/user/activate?user='.$user.'&code='.self::activationCode($user).'
</body>
</html>
';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    // Cabeceras adicionales
    $headers .= 'To: '.$name.' <'.$email.'>' . "\r\n";
    $headers .= 'From: '.$config['name'].' <'.$config['email'].'>' . "\r\n";
    $headers .= 'Reply-To: '.$config['email'] . "\r\n";
    //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
    //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
  }

  public function activateUser($user, $activationCode) {
    if($activationCode == self::activationCode($user)) {
      $sql = 'UPDATE login SET active = ? WHERE user = ?';

      $vars = [1, $user];
      $res = $this->db->query($sql, $vars);

      if($res) {
        return true;
      }
    }
  }

  private function activationCode($user) {
    $salt = 'jka¡HS_dg234ah2';
    return hash('sha256', $user.$salt);
  }

  public function setLastConnection() {
    date_default_timezone_set('Europe/Madrid');
    $sql = 'UPDATE login SET last_connection = ? WHERE user = ?';
    $vars = [strftime('%Y-%m-%d %H:%M:%S'), self::getUserData()['user']];
    $res = $this->db->query($sql, $vars);
  }

  public function changeImage() {
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$_GET['image'])) {
      $sql = 'UPDATE login SET image = ? WHERE user = ?';
      $vars = [$_GET['image'], self::getUserData()['user']];
      $res = $this->db->query($sql, $vars)->rowCount();

      if($res == 1) {
        echo 'ok';
      }
    } else {
      echo 'no_image';
    }
  }

  public function getUserData() {
    
    $sql = 'SELECT * FROM login WHERE user = ?';
    $vars = [$this->sessionUser];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function getUsers() {
    $sql = 'SELECT * FROM login ORDER BY last_connection DESC LIMIT 5';
    $res = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  private function encrypt($password) {
    $salt = '92?8K37yrtQUysdf2*91qq';
    return hash('sha256', $password.$salt);
  }

  public function entryBelongsToTheUser($entryId) {
    $sql = 'SELECT entries.id FROM entries INNER JOIN login ON entries.creator = login.user WHERE login.user = ? AND (entries.id = ? OR login.rol = ?)';
    $vars = [$this->sessionUser, $entryId, 'admin'];
    $res = $this->db->query($sql, $vars)->rowCount();
    if($res == 0) {
      parent::notify('error', 'Acceso denegado', 'No tienes permisos para la acción que quieres realizar.', '/');
      die;
    }
  }

  public function isAdmin() {
    $sql = 'SELECT * FROM login WHERE user = ? AND rol = ?';
    $vars = [$this->sessionUser, 'admin'];
    $res = $this->db->query($sql, $vars)->rowCount();
    return $res;
  }

  public function userExist() {
    $sql = 'SELECT * FROM login WHERE user = ?';
    $vars = [$_GET['user']];
    $res = $this->db->query($sql, $vars)->rowCount();
    if($res > 0) {
      echo 1;
      return true;
    }
  }

  public function __destruct() {
    
  }
}
