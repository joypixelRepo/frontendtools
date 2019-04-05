<?php
class User {

  private $db;

  public function __construct() {
    $this->db = new Db();
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
    $user = isset($_SESSION['user']['user']) ? $_SESSION['user']['user'] : null;
    
    $sql = 'SELECT * FROM login WHERE user = ?';
    $vars = [$user];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  private function encrypt($password) {
    $salt = '92?8K37yrtQUysdf2*91qq';
    return hash('sha256', $password.$salt);
  }

  public function __destruct() {
    
  }
}
