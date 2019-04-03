<?php
class Options {

  private $db;

  public function __construct() {
    $this->db = new Db();
  }

  public function maintenance_ips() {
    $sql = 'SELECT ips FROM options';
		$res = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

    $ips = explode(',', $res['ips']);

    if(in_array($_SERVER['REMOTE_ADDR'], $ips)) {
      return true;
    }
  }

  public function loadOptions() {
    $sql = 'SELECT * FROM options WHERE id = 1';
    $res = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function save() {
    // si el valor viene vacio, le asignamos el valor "off"
    if(empty($_POST['maintenance'])) {
      $_POST['maintenance'] = 'off';
    }

    // quitamos espacios en blanco del campo ips
    $_POST['ips'] = str_replace(' ', '', $_POST['ips']);

    $sql = 'UPDATE options SET 
      maintenance = ?,
      ips = ?
      WHERE id = 1
    ';

    $vars = [$_POST['maintenance'], $_POST['ips']];
    $res = $this->db->query($sql, $vars);

    if($res) {
      return true;
    }
  }

  public function __destruct() {}
}
