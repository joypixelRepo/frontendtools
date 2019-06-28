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
      css = ?,
      html = ?,
      javascript = ?,
      php = ?,
      mysql = ?,
      git = ?,
      reactjs = ?,
      xampp = ?,
      terminal = ?,
      creator = ?,
      creation_date = ?,
      edition_date = ?,
      executable = ?,
      url = ?
    ';

		$vars = [
      $_POST['title'],
      $_POST['description'],
      $_POST['explanation'],
      $_POST['css'],
      $_POST['html'],
      $_POST['javascript'],
      $_POST['php'],
      $_POST['mysql'],
      $_POST['git'],
      $_POST['reactjs'],
      $_POST['xampp'],
      $_POST['terminal'],
      $_SESSION['user']['user'],
      strftime('%Y-%m-%d %H:%M:%S'),
      strftime('%Y-%m-%d %H:%M:%S'),
      !empty($_POST['html']) || !empty($_POST['css']) || !empty($_POST['javascript']) || !empty($_POST['jquery']) ? 1 : 0,
      str_replace('+', '-', urlencode($_POST['title']))
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
    
    if($newEntry['executable']) {
      parent::createIframe($newEntry);
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
      css = ?,
      html = ?,
      javascript = ?,
      php = ?,
      mysql = ?,
      git = ?,
      reactjs = ?,
      xampp = ?,
      terminal = ?,
      edition_date = ?,
      executable = ?,
      url = ?
      WHERE id = ?
    ';

    $vars = [
      $_POST['title'],
      $_POST['description'],
      $_POST['explanation'],
      $_POST['css'],
      $_POST['html'],
      $_POST['javascript'],
      $_POST['php'],
      $_POST['mysql'],
      $_POST['git'],
      $_POST['reactjs'],
      $_POST['xampp'],
      $_POST['terminal'],
      strftime('%Y-%m-%d %H:%M:%S'),
      !empty($_POST['html']) || !empty($_POST['css']) || !empty($_POST['javascript']) || !empty($_POST['jquery']) ? 1 : 0,
      str_replace('+', '-', urlencode($_POST['title'])),
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

    if($editedEntry['executable']) {
      parent::createIframe($editedEntry);
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

    $sql = '
      DELETE FROM comments WHERE comment_entry_id = ?;
      DELETE FROM entries WHERE id = ?;
    ';
    $vars = [$id, $id];
    $res = $this->db->query($sql, $vars);

    parent::deleteIframe($id);

    return $res;
  }

  public function deleteComment($id) {
    $this->user->commentBelongsToTheUser($id);
    $sql = 'DELETE FROM comments WHERE comment_id = ?';
    $vars = [$id];
    $res = $this->db->query($sql, $vars);
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

  public function checkTitle() {
    $id = isset($_GET['entryId']) ? $_GET['entryId'] : null;

    $sql = 'SELECT * FROM entries WHERE title = ?';

    $vars = [$_GET['title']];
    
    if($id != null) {
      $sql .= ' AND id != ?';
      $vars = [$_GET['title'], $id];
    }
    
    $res = $this->db->query($sql, $vars);
    if($res->rowCount() > 0) {
      return true;
    }
  }

  public function saveComment() {
    $sql = 'INSERT INTO comments SET 
      comment_entry_id = ?,
      comment_user_id = ?,
      comment = ?,
      comment_date = ?
    ';

    $vars = [$_POST['id'], $_SESSION['user']['user_id'], $_POST['comment'], date('Y-m-d H:i:s')];
    $res = $this->db->query($sql, $vars);
    
    if($res->rowCount() > 0) {
      return true;
    }
  }

  public function sendMessage() {
    $config['name'] = 'Frontendtools';
    $config['email'] = 'info@frontendtools.net';
    $message = '
    <html>
    <head>
      <title>Mensaje de contacto en Frontendtools</title>
    </head>
    <body>
      <p><strong>Asunto:</strong> '.$_POST['subject'].'</p>
      <p><strong>Nombre:</strong> '.$_POST['name'].'</p>
      <p><strong>Email:</strong> '.$_POST['email'].'</p>
      <p><strong>Mensaje:</strong> <pre>'.$_POST['message'].'</pre></p>
    </body>
    </html>
    ';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    // Cabeceras adicionales
    $headers .= 'To: '.$config['name'].' <'.$config['email'].'>' . "\r\n";
    $headers .= 'From: '.$_POST['name'].' <'.$_POST['email'].'>' . "\r\n";
    $headers .= 'Reply-To: '.$_POST['email'] . "\r\n";
    //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
    //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    $to = $config['email'];
    $subject = $_POST['subject'];

    return mail($to, $subject, $message, $headers);
  }

  public function __destruct() {}

}
