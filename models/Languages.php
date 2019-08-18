<?php
class Languages {

  private $db;

  public function __construct() {
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/Db.php';
    $this->db = new Db();

    $defaultLanguage = 'en';

    if(isset($_GET['lang'])) {
      $lang = $_SESSION['lang'] = $_GET['lang'];
    }
    else if(isset($_SESSION['lang'])) {
      $lang = $_SESSION['lang'];
    }
    else if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      $user_explorer_language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

      if(!empty($user_explorer_language)) {
        $lang = $_SESSION['lang'] = $user_explorer_language;
      } else {
        $lang = $_SESSION['lang'] = $defaultLanguage;
      }
    }
    else {
      $lang = $defaultLanguage;
    }

    switch ($lang) {
      case 'en':
        $language = 'en';
        break;

      case 'es':
        $language = 'es';
        break;
      
      default:
        $language = $defaultLanguage;
        break;
    }

    $translationsArray = self::getTranslations($language);

    // create LANG environment variable
    define('LANG', $translationsArray);

    // *************************************
    // script with json vars set in head.php
    // variable name: LANG_JS
    // *************************************
  }

  public function getTranslations($lang) {
    $sql = 'SELECT `variable`, `'.$lang.'` FROM languages';
    $res = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $translations = [];

    foreach ($res as $value) {
      $translations[$value['variable']] = $value[$lang];
    }

    return $translations;
  }

  public function __destruct() {}
}
