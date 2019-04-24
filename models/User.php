<?php
class User {

  private $db;
  private $sessionUser;

  public function __construct() {
    $this->db = new Db();
    $this->sessionUser = isset($_SESSION['user']['user']) ? $_SESSION['user']['user'] : null;
  }

  public function sign_in() {
    $sql = 'SELECT * FROM login WHERE user = ? AND password = ?';
    $vars = [$_POST['user'], self::encrypt($_POST['password'])];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function sign_up() {
    $sql = 'INSERT INTO login SET user = ?, email = ?, password = ?, name = ?, image = ?, rol = ?, active = ?';
    $vars = [$_POST['user'], $_POST['email'], self::encrypt($_POST['password']), $_POST['full-name'], $_POST['avatar'], 'user', 1];
    $res = $this->db->query($sql, $vars)->rowCount();

    if($res == 1) {
      return true;
    }
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
      header('Location: /v/identify');
      die;
    }
  }

  public function idAdmin() {
    $sql = 'SELECT * FROM login WHERE user = ? AND rol = ?';
    $vars = [$this->sessionUser, 'admin'];
    $res = $this->db->query($sql, $vars)->rowCount();
    return $res;
  }

  public function __destruct() {
    
  }
}
