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

  public function loadEntries($category = null, $limitNumber = null) {
    $where = '';
    $limit = '';
    if(!empty($category)) {
      $where = 'WHERE categories.descriptive_name = "'.$category.'"';
    }
    if($limitNumber != null && $limitNumber > 0) {
      $limit = ' LIMIT '.$limitNumber;
    }

    $sql = 'SELECT * FROM category_entry INNER JOIN entries ON entries.id = category_entry.entry_id INNER JOIN categories ON categories.id_category = category_entry.category_id INNER JOIN login ON login.user = entries.creator '.$where.' GROUP BY entries.id ORDER BY entries.id DESC '.$limit;

    $entries = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // delete duplicated entries
    //$entries = parent::unique_multidim_array($entries, 'id');
    // push categories into entries
    $entries = parent::pushCategories($entries, $this->db);

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
