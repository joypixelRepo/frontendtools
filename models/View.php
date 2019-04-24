<?php
class View extends ApplicationController {

  private $db;

  public function __construct() {
    $this->db = new Db();
  }

  public function loadCategories() {

    $sql = 'SELECT * FROM categories ORDER BY category_name ASC';
    $categories = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT categories.`id_category`, count(category_entry.`category_id`) as entriesCount FROM category_entry LEFT JOIN categories ON categories.`id_category` = category_entry.`category_id` GROUP BY category_entry.`category_id`';

    $categoriesCount = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($categories as $categoryKey => $category) {
      foreach ($categoriesCount as $categoryCount) {
        if($category['id_category'] == $categoryCount['id_category']) {
          $categories[$categoryKey]['count'] = $categoryCount['entriesCount'];
        }
      }
    }

    if($categories) {
      return $categories;
    }
  }

  public function loadEntries() {
    // pagination
    $entriesPosition = 0;
    $entriesNum = 12;
    if(isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'] > 1 ? $_GET['page'] : 1;
      $entriesPosition = $entriesNum * ($page-1);
    }

    $where = 'WHERE 1';
    $limit = '';

    // search by category
    if(isset($_GET['c'])) {
      $where .= ' AND categories.descriptive_name = "'.$_GET['c'].'"';
    }
    // search by creator
    if(isset($_GET['creator'])) {
      $where .= ' AND entries.creator = "'.$_GET['creator'].'"';
    }
    // search by keywords
    if(isset($_GET['keys'])) {
      $keys = explode(' ', $_GET['keys']);

      $where .= ' AND entries.title LIKE "%'.$keys[0].'%" OR entries.description LIKE "%'.$keys[0].'%" ';

      for($i = 1; $i < count($keys); $i++) {
        if(!empty($keys[$i])) {
            $where .= " OR entries.title like '%".$keys[$i]."%' OR entries.description like '%".$keys[$i]."%'";
        }
      }
    }

    if($entriesNum != null && $entriesNum > 0) {
      $limit = ' LIMIT '.$entriesPosition.', '.$entriesNum;
    }

    $countSql = 'SELECT * FROM category_entry INNER JOIN entries ON entries.id = category_entry.entry_id INNER JOIN categories ON categories.id_category = category_entry.category_id INNER JOIN login ON login.user = entries.creator '.$where.' GROUP BY entries.id ORDER BY entries.id DESC ';

    $count = $this->db->query($countSql)->fetchAll();
    $totalPages = ceil(count($count) / $entriesNum);

    $sql = $countSql.$limit;
    $entries = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // delete duplicated entries
    // $entries = parent::unique_multidim_array($entries, 'id');
    // push categories into entries
    $entries = parent::pushCategories($entries, $this->db);

    $entries['pages'] = $totalPages;

    if($entries) {
      return $entries;
    }
  }

  public function loadEntry($id) {
    $sql = 'SELECT * FROM entries WHERE id = '.$id;
    $entry = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // push categories into entries
    $entry = parent::pushCategories($entry, $this->db);

    if($entry) {
      return $entry;
    }
  }

  public function getCategoryName($descriptive_name = null) {
    $sql = 'SELECT * FROM categories WHERE descriptive_name = "'.$descriptive_name.'"';
    $category = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

    $sql = 'SELECT categories.`id_category`, count(category_entry.`category_id`) as entriesCount FROM category_entry LEFT JOIN categories ON categories.`id_category` = category_entry.`category_id` WHERE categories.`descriptive_name` = "'.$descriptive_name.'" GROUP BY category_entry.`category_id`';

    $categoryCount = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

    $category['count'] = $categoryCount['entriesCount'];

    return $category;
  }

  public function __destruct() {}
}
