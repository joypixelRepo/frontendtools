<?php
class VController extends ApplicationController {

  private $viewUrl;
  private $options;
  private $view;
  private $user;

  public function __construct() {
  	setlocale(LC_TIME, "es_ES.UTF8");
    // https://mothereff.in/html-entities
    // view model
    $this->view = new View();

    $this->viewUrl = $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'];
    // MAINTENANCE
    $this->options = new Options();
    if($this->options->loadOptions()['maintenance'] == 'on') {
      if(!parent::session() && !$this->options->maintenance_ips()) {
      	if(!isset($_GET['action']) || empty($_GET['action'])) {
      		$_GET['action'] = '';
      	}
      	if($_GET['action'] != 'sign_in' && $_GET['action'] != 'sign_up') {
          self::maintenance();
        }
      }
    }
    // END MAINTENANCE
    $this->user = new User();
    
    if(parent::session()) {
      $this->user->setLastConnection();
    }
  }

  public function sessionActive() {
    if(!parent::session()) {
      header('Location: /v/identify');
    }
  }

  public function entryBelongsToTheUser($entryId) {
    if(!$this->user->entryBelongsToTheUser($entryId)) {
      header('Location: /v/identify');
    }
  }

  public function identify() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session()
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', []);
    die;
  }

  public function util() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/code.css',0),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'entries' => $this->view->loadEntries(),
      'category' => $this->view->getCategoryName(self::returnGet('c')),
      'user' => $this->user->getUserData(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        
      ]
    ]);
    die;
  }

  public function results($results) {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/code.css',0),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'entries' => $results,
      'user' => $this->user->getUserData(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        
      ]
    ]);
    die;
  }

  public function exec() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/code.css',0),
        self::printCss('/assets/plugins/codemirror/lib/codemirror.css',1),
        self::printCss('/assets/plugins/codemirror/theme/monokai.css',1),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'session' => parent::session(),
      'entry' => $this->view->loadEntry($_GET['id']),
      'user' => $this->user->getUserData(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/codemirror/lib/codemirror.js',1),
        self::printScript('/assets/plugins/codemirror/mode/xml/xml.js',1),
        self::printScript('/assets/plugins/codemirror/mode/css/css.js',1),
        self::printScript('/assets/plugins/codemirror/mode/javascript/javascript.js',1),
        self::printScript('/assets/plugins/codemirror/keymap/sublime.js',1),
        self::printScript('/assets/js/custom/editors.js',0),
      ]
    ]);
    die;
  }

  public function index() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/css/custom/home.css',0),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/home.php', [
      'entries' => $this->view->loadEntries(),
      'categories' => $this->view->loadCategories(),
      'user' => $this->user->getUserData(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', []);
    die;
  }

  public function maintenance() {
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    die;
  }

  public function sign_in() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/css/authentication.css',0),
        self::printCss('/assets/css/custom/autentication.css',0),
      ]
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    die;
  }

  public function sign_up() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/authentication.css',0),
        self::printCss('/assets/css/custom/autentication.css',0),
      ]
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'avatars' => self::renderAvatars(),
    ]);
    die;
  }

  public function blank() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session()
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', []);
    die;
  }

  public function profile() {
    self::sessionActive();
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/profile.css',0),
        self::printCss('/assets/css/libraries/animate.css',1),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
    	'user' => $this->user->getUserData(),
      'avatars' => self::renderAvatars(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/bundles/knob.bundle.js',1),
        self::printScript('/assets/js/pages/charts/jquery-knob.js',1),
        self::printScript('/assets/js/custom/profile.js',0),
      ]
    ]);
    die;
  }

  public function newCode() {
    self::sessionActive();
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/plugins/bootstrap-select/css/bootstrap-select.css',1),
        self::printCss('/assets/plugins/codemirror/lib/codemirror.css',1),
        self::printCss('/assets/plugins/codemirror/theme/monokai.css',1),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'session' => parent::session(),
      'categories' => $this->view->loadCategories(),
      'user' => $this->user->getUserData(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/ckeditor/ckeditor.js',1),
        self::printScript('/assets/js/pages/forms/editors.js',1),
        self::printScript('/assets/plugins/codemirror/lib/codemirror.js',1),
        self::printScript('/assets/plugins/codemirror/mode/xml/xml.js',1),
        self::printScript('/assets/plugins/codemirror/mode/css/css.js',1),
        self::printScript('/assets/plugins/codemirror/mode/javascript/javascript.js',1),
        self::printScript('/assets/plugins/codemirror/keymap/sublime.js',1),
        self::printScript('/assets/js/custom/editors.js',0),
        self::printScript('/assets/js/custom/newCode.js',0),
      ]
    ]);
    die;
  }

  public function edit() {
    self::sessionActive();
    self::entryBelongsToTheUser($_GET['id']);
    if(!isset($_GET['type']) || !isset($_GET['id'])) {
      die('No se han recibido todos los parametros para poder realizar la operación solicitada.');
    }

    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/plugins/bootstrap-select/css/bootstrap-select.css',1),
        self::printCss('/assets/plugins/codemirror/lib/codemirror.css',1),
        self::printCss('/assets/plugins/codemirror/theme/monokai.css',1),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'_'.$_GET['type'].'.php', [
      'session' => parent::session(),
      'entry' => $this->view->loadEntry($_GET['id']),
      'categories' => $this->view->loadCategories(),
      'user' => $this->user->getUserData(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/ckeditor/ckeditor.js',1),
        self::printScript('/assets/js/pages/forms/editors.js',1),
        self::printScript('/assets/plugins/codemirror/lib/codemirror.js',1),
        self::printScript('/assets/plugins/codemirror/mode/xml/xml.js',1),
        self::printScript('/assets/plugins/codemirror/mode/css/css.js',1),
        self::printScript('/assets/plugins/codemirror/mode/javascript/javascript.js',1),
        self::printScript('/assets/plugins/codemirror/keymap/sublime.js',1),
        self::printScript('/assets/js/custom/editors.js',0),
        self::printScript('/assets/js/custom/newCode.js',0),
      ]
    ]);
    die;
  }

  public function rem() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css',1),
      	self::printCss('/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css',1),
      	self::printCss('/assets/css/custom/rem.css',0)
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/plugins/ion-rangeslider/js/ion.rangeSlider.js',1),
    		self::printScript('/assets/js/pages/ui/range-sliders.js',1),
    		self::printScript('/assets/js/custom/rem.js',0)
    	]
    ]);
    die;
  }

  public function gradient_generator() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',1),
      	self::printCss('/assets/css/custom/gradient_generator.css',0)
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',1),
    		self::printScript('/assets/js/custom/gradient_generator.js',0)
    	]
    ]);
    die;
  }

  public function text_generator() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session()
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/js/custom/text_generator.js',0)
    	]
    ]);
    die;
  }

  public function renderAvatars() {
    $images = [];
    $url = '/assets/images/avatars/';
    $dir = $_SERVER['DOCUMENT_ROOT'].$url;

    // create array with files and folders
    $avatars = scandir($dir);

    foreach ($avatars as $avatar) {
      if(is_file($dir.$avatar) && $avatar != "." && $avatar != "..") {
        $images['files'][] = $url.$avatar;
      }
      else if(is_dir($dir.$avatar) && $avatar != "." && $avatar != "..") {
        $images['folders'][] = $dir.$avatar;
      }
    }

    return $images;
  }

  private function printCss($url, $cache) {
    $caching = self::removeCache($cache);
  	return '<link rel="stylesheet" href="'.$url.$caching.'">';
  }

  private function printScript($url, $cache) {
    $caching = self::removeCache($cache);
  	return '<script src="'.$url.$caching.'"></script>';
  }

  private function removeCache($cache) {
    return !$cache ? '?v='.hash('md5', time()) : '';
  }

  private function returnGet($get) {
    return isset($_GET[$get]) && !empty($_GET[$get]) ? $_GET[$get] : '';
  }

  public function __destruct() {}

}
