<?php
class Action extends ApplicationController {

  private $db;
  private $user;

  public function __construct() {
    $this->db = new Db();
    date_default_timezone_set('Europe/Madrid');

    $this->user = new User();
  }

  public function saveEntry() {
    $sql = 'INSERT INTO entries SET 
      title = ?,
      description = ?,
      explanation = ?,
      content = ?,
      css = ?,
      html = ?,
      javascript = ?,
      creator = ?,
      creation_date = ?,
      edition_date = ?,
      executable = ?
    ';

		$vars = [
      $_POST['title'],
      htmlspecialchars($_POST['description'], ENT_QUOTES | ENT_HTML5),
      htmlspecialchars($_POST['explanation'], ENT_QUOTES | ENT_HTML5),
      htmlspecialchars($_POST['content'], ENT_QUOTES | ENT_HTML5),
      $_POST['css'],
      htmlspecialchars($_POST['html'], ENT_QUOTES | ENT_HTML5),
      $_POST['javascript'],
      $_SESSION['user']['user'],
      strftime('%Y-%m-%d %H:%M:%S'),
      strftime('%Y-%m-%d %H:%M:%S'),
      isset($_POST['executable']) && $_POST['executable'] === 'on' ? 1 : 0
    ];
		$res = $this->db->query($sql, $vars);

    $insert_id = $this->db->lastInserted();

    foreach ($_POST['categories'] as $category) {
      $sql = 'INSERT INTO category_entry SET entry_id = ?, category_id = ?';
      $vars = [$insert_id, $category];
      $res = $this->db->query($sql, $vars);
    }

    $view = new View();
    $newEntry = $view->loadEntry($insert_id);
    
    if($newEntry[0]['executable']) {
      parent::createIframe($newEntry[0]);
      // $screenshot = parent::generateScreenshot($insert_id);
      // if(!empty($screenshot)) {
      //   $sql = 'UPDATE entries SET screenshot = ? WHERE id = ?';
      //   $vars = [$screenshot, $insert_id];
      //   $res = $this->db->query($sql, $vars);
      // }
    }

    if($res->rowCount() > 0) {
      return true;
    }
  }

  public function editEntry() {
    $sql = 'DELETE FROM category_entry WHERE entry_id = ?';
    $vars = [$_POST['id']];
    $res = $this->db->query($sql, $vars);

    $sql = 'UPDATE entries SET 
      title = ?,
      description = ?,
      explanation = ?,
      content = ?,
      css = ?,
      html = ?,
      javascript = ?,
      edition_date = ?,
      executable = ?
      WHERE id = ?
    ';

    $vars = [
      $_POST['title'],
      htmlspecialchars($_POST['description'], ENT_QUOTES | ENT_HTML5),
      htmlspecialchars($_POST['explanation'], ENT_QUOTES | ENT_HTML5),
      htmlspecialchars($_POST['content'], ENT_QUOTES | ENT_HTML5),
      $_POST['css'],
      htmlspecialchars($_POST['html'], ENT_QUOTES | ENT_HTML5),
      $_POST['javascript'],
      strftime('%Y-%m-%d %H:%M:%S'),
      isset($_POST['executable']) && $_POST['executable'] === 'on' ? 1 : 0,
      $_POST['id']
    ];
    $res = $this->db->query($sql, $vars);

    foreach ($_POST['categories'] as $category) {
      $sql = 'INSERT INTO category_entry SET entry_id = ?, category_id = ?';
      $vars = [$_POST['id'], $category];
      $res = $this->db->query($sql, $vars);
    }

    $view = new View();
    $editedEntry = $view->loadEntry($_POST['id']);

    if($editedEntry[0]['executable']) {
      parent::createIframe($editedEntry[0]);
      // $screenshot = parent::generateScreenshot($_POST['id']);
      // if(!empty($screenshot)) {
      //   $sql = 'UPDATE entries SET screenshot = ? WHERE id = ?';
      //   $vars = [$screenshot, $_POST['id']];
      //   $res = $this->db->query($sql, $vars);
      // }
    }

    if($res->rowCount() > 0) {
      return true;
    }
  }

  public function deleteEntry($id) {
    $this->user->entryBelongsToTheUser($id);
    $sql = 'DELETE FROM entries WHERE id = ?';
    $vars = [$id];
    $res = $this->db->query($sql, $vars);
    parent::deleteIframe($id);
    return $res;
  }

  public function search() {
    $where = '';
    if(!empty($_GET['keys'])) {
      $keys = explode(' ', $_GET['keys']);

      $where = 'WHERE entries.title LIKE "%'.$keys[0].'%" OR entries.description LIKE "%'.$keys[0].'%" ';

      for($i = 1; $i < count($keys); $i++) {
        if(!empty($keys[$i])) {
            $where .= " OR entries.title like '%".$keys[$i]."%' OR entries.description like '%".$keys[$i]."%'";
        }
      }
    }

    $sql = 'SELECT * FROM category_entry INNER JOIN entries ON entries.id = category_entry.entry_id INNER JOIN categories ON categories.id_category = category_entry.category_id '.$where;

    $sql .= ' GROUP BY entries.id ORDER BY entries.id DESC';

    $entries = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // delete duplicated entries
    //$entries = parent::unique_multidim_array($entries, 'id');
    // push categories into entries
    $entries = parent::pushCategories($entries, $this->db);

    if($entries) {
      return $entries;
    }
  }

  public function searchByUser() {
    $where = '';
    if(!empty($_GET['creator'])) {
      $where = 'WHERE entries.creator = "'.$_GET['creator'].'" ';

      $sql = 'SELECT * FROM category_entry INNER JOIN entries ON entries.id = category_entry.entry_id INNER JOIN categories ON categories.id_category = category_entry.category_id '.$where;

      $sql .= ' GROUP BY entries.id ORDER BY entries.id DESC';

      $entries = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

      // delete duplicated entries
      //$entries = parent::unique_multidim_array($entries, 'id');
      // push categories into entries
      $entries = parent::pushCategories($entries, $this->db);

      if($entries) {
        return $entries;
      }
    }
    return null;
  }

  public function identify() {
    header('Location: /v/identify');
  }

  public function __destruct() {}

}
