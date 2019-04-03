<?php
class VController extends ApplicationController {

  private $viewUrl;
  private $options;
  private $view;
  private $user;

  public function __construct() {
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
  }

  public function util() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/code.css'),
        self::printCss('/assets/css/libraries/prettify/themes/sons-of-obsidian.css'),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'entries' => $this->view->loadEntries(self::returnGet('c'), 0),
      'category' => $this->view->getCategoryName(self::returnGet('c')),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/js/libraries/run_prettify.js')
      ]
    ]);
    die;
  }

  public function results($results) {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/code.css'),
        self::printCss('/assets/css/libraries/prettify/themes/sons-of-obsidian.css'),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'entries' => $results,
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/js/libraries/run_prettify.js')
      ]
    ]);
    die;
  }

  public function exec() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/code.css'),
        self::printCss('/assets/css/libraries/prettify/themes/sons-of-obsidian.css'),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'session' => parent::session(),
      'entry' => $this->view->loadEntry($_GET['id']),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/js/libraries/run_prettify.js')
      ]
    ]);
    die;
  }

  public function index() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/css/custom/home.css'),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/home.php', [
      'entries' => $this->view->loadEntries(null, 9),
      'categories' => $this->view->loadCategories(),
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
      	self::printCss('/assets/css/authentication.css'),
        self::printCss('/assets/css/custom/autentication.css'),
      ]
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    die;
  }

  public function sign_up() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/authentication.css'),
        self::printCss('/assets/css/custom/autentication.css'),
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
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', []);
    die;
  }

  public function profile() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/custom/profile.css'),
        self::printCss('/assets/css/libraries/animate.css'),
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
    	'user' => $this->user->getUserData(),
      'avatars' => self::renderAvatars(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/bundles/knob.bundle.js'),
        self::printScript('/assets/js/pages/charts/jquery-knob.js'),
        self::printScript('/assets/js/custom/profile.js'),
      ]
    ]);
    die;
  }

  public function newCode() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/plugins/bootstrap-select/css/bootstrap-select.css')
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'session' => parent::session(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/ckeditor/ckeditor.js'),
        self::printScript('/assets/js/pages/forms/editors.js'),
        self::printScript('/assets/js/custom/newCode.js'),
      ]
    ]);
    die;
  }

  public function edit() {
    if(!isset($_GET['type']) || !isset($_GET['id'])) {
      die('No se han recibido todos los parametros para poder realizar la operación solicitada.');
    }

    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/plugins/bootstrap-select/css/bootstrap-select.css')
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'_'.$_GET['type'].'.php', [
      'session' => parent::session(),
      'entry' => $this->view->loadEntry($_GET['id']),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/ckeditor/ckeditor.js'),
        self::printScript('/assets/js/pages/forms/editors.js'),
        self::printScript('/assets/js/custom/newCode.js'),
      ]
    ]);
    die;
  }

  public function rem() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css'),
      	self::printCss('/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css'),
      	self::printCss('/assets/css/custom/rem.css')
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/plugins/ion-rangeslider/js/ion.rangeSlider.js'),
    		self::printScript('/assets/js/pages/ui/range-sliders.js'),
    		self::printScript('/assets/js/custom/rem.js')
    	]
    ]);
    die;
  }

  public function gradient_generator() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'),
      	self::printCss('/assets/css/custom/gradient_generator.css')
      ]
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'),
    		self::printScript('/assets/js/custom/gradient_generator.js')
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
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/js/custom/text_generator.js')
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

  public function printCss($url) {
  	return '<link rel="stylesheet" href="'.$url.'">';
  }

  public function printScript($url) {
  	return '<script src="'.$url.'"></script>';
  }

  private function returnGet($get) {
    return isset($_GET[$get]) && !empty($_GET[$get]) ? $_GET[$get] : '';
  }

  public function __destruct() {}

}
