<?php
class VController extends ApplicationController {

  private $viewUrl;
  private $options;
  private $view;
  private $user;

  public function __construct() {
    $userController = new UserController();
    $userController->checkCookiesSession();

    $this->view = new View();
    $this->user = new User();

    $this->viewUrl = $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'];
    // MAINTENANCE
    $this->options = new Options();

    if($this->options->loadOptions()['maintenance'] == 'on') {
      // si no hay sesión Y la IP no está permitida
      if(!parent::session() && !$this->options->maintenance_ips()) {
      	if(!isset($_GET['action']) || empty($_GET['action'])) {
      		$_GET['action'] = '';
      	}
      	if($_GET['action'] != 'sign_in') {
          self::maintenance();
        }
      }
      if(!$this->user->isAdmin() && !$this->options->maintenance_ips()) {
        if($_GET['action'] != 'sign_in') {
          self::maintenance();
        }
      }
    }
    // END MAINTENANCE
    
    if(parent::session()) {
      $this->user->setLastConnection();
    }
  }

  public function sessionActive() {
    if(!parent::session()) {
      parent::notify('error', LANG['no_logged'], LANG['no_permission_must_login'], '/', 0);
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

  public function index() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
      	self::printCss('/assets/css/custom/home.css',0),
        self::printCss('/assets/plugins/bootstrap-select/css/bootstrap-select.css',0),
      ],
      'seo' => [
        'ogtitle' => LANG['index_title'],
        'ogdescription' => LANG['index_description'],
      ],
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/home.php', [
      'entries' => $this->view->loadEntries(''),
      'categories' => $this->view->loadCategories(),
      'viewCategory' => $this->view->getCategoryName(self::returnGet('c')),
      'user' => $this->user->getUserData(),
      'usersOrdered' => $this->user->getUsersOrdered(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);

    $keys = null;
    if(isset($_GET['keys']) && !empty($_GET['keys'])) {
      $keyWords = explode(" ", $_GET['keys']);

      $keys = [];

      foreach ($keyWords as $key) {
        $keys[] = $key;
      }

      $keys = json_encode($keys);
      echo '<script>var keys = '.$keys.'</script>';
    } else {
      echo '<script>var keys = null</script>';
    }

    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/js/custom/advanced-search.js',0),
      ],
    ]);
    die;
  }

  public function searchKeywordsAjax() {
    $result = $this->view->loadEntries(8);
    // delete pages key
    unset($result['pages']);
    echo json_encode($result);
  }

  public function dateDiff($date) {
    $datetime = $date;

    // check datetime var type
    $strTime = (is_object($datetime)) ? $datetime->format('Y-m-d H:i:s') : $datetime;

    $time = strtotime($strTime);
    $time = time() - $time;
    $time = ($time<1)? 1 : $time;

    $tokens = array (
      31536000 => LANG['year'],
      2592000 => LANG['month'],
      604800 => LANG['week'],
      86400 => LANG['day'],
      3600 => LANG['hour'],
      60 => LANG['minute'],
      1 => LANG['second']
    );

    foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      $plural = ($unit == 2592000) ? 'es' : 's';
      return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? $plural : '');
    }
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/modals.php', []);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'avatars' => self::renderAvatars(),
    ]);
    die;
  }

  public function blank() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', []);
    die;
  }

  public function contact() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/css/libraries/animate.css',1),
        self::printCss('/assets/css/custom/contact.css',0),
      ],
      'scripts' => [
        self::printScript('https://www.google.com/recaptcha/api.js?hl='.LANG['metaLang'],0),
      ],
      'seo' => [
        'ogtitle' => LANG['contact_title'],
        'ogdescription' => LANG['contact_description'],
      ],
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/modals.php', []);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/bootstrap-notify/bootstrap-notify.js',1),
        self::printScript('/assets/js/custom/contact.js',0),
        self::printScript('/assets/js/custom/maxLength.js',0),
      ]
    ]);
    die;
  }

  public function error404() {
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', []);
    die;
  }

  public function base64() {
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/menu.php', [
      'session' => parent::session(),
      'user' => $this->user->getUserData(),
      'users' => $this->user->getUsers(),
      'options' => $this->options->loadOptions(),
      'categories' => $this->view->loadCategories(),
    ]);
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/js/custom/base64.js',0),
      ]
    ]);
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
      'userCategories' => $this->view->userCategories(),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
    	'scripts' => [
    		self::printScript('/assets/bundles/knob.bundle.js',1),
        self::printScript('/assets/js/pages/charts/jquery-knob.js',1),
        self::printScript('/assets/js/custom/profile.js',0),
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
        self::printCss('/assets/plugins/codemirror/addon/display/fullscreen.css',1),
        self::printCss('/assets/plugins/codemirror/theme/monokai.css',1),
        self::printCss('/assets/css/libraries/animate.css',1),
      ],
      'entry' => $this->view->loadEntry(null, $_GET['u']),
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
      'entry' => $this->view->loadEntry(null, $_GET['u']),
      'user' => $this->user->getUserData(),
      'comments' => $this->view->loadComments($_GET['u']),
    ]);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/codemirror/lib/codemirror.js',1),
        self::printScript('/assets/plugins/codemirror/addon/edit/closebrackets.js',1),
        self::printScript('/assets/plugins/codemirror/addon/edit/matchbrackets.js',1),
        self::printScript('/assets/plugins/codemirror/mode/shell/shell.js',1),
        self::printScript('/assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js',1),
        self::printScript('/assets/plugins/codemirror/mode/xml/xml.js',1),
        self::printScript('/assets/plugins/codemirror/mode/css/css.js',1),
        self::printScript('/assets/plugins/codemirror/mode/javascript/javascript.js',1),
        self::printScript('/assets/plugins/codemirror/mode/jsx/jsx.js',1),
        self::printScript('/assets/plugins/codemirror/mode/scheme/scheme.js',1),
        self::printScript('/assets/plugins/codemirror/mode/clike/clike.js',1),
        self::printScript('/assets/plugins/codemirror/mode/php/php.js',1),
        self::printScript('/assets/plugins/codemirror/mode/sql/sql.js',1),
        self::printScript('/assets/plugins/codemirror/keymap/sublime.js',1),
        self::printScript('/assets/plugins/codemirror/addon/display/fullscreen.js',1),
        self::printScript('/assets/plugins/bootstrap-notify/bootstrap-notify.js',1),
        self::printScript('/assets/js/custom/editors.js',0),
        self::printScript('/assets/js/custom/exec.js',0),
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
        self::printCss('/assets/plugins/codemirror/addon/display/fullscreen.css',1),
        self::printCss('/assets/plugins/codemirror/theme/monokai.css',1),
      ],
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/ckeditor/ckeditor.js',1),
        self::printScript('/assets/js/pages/forms/editors.js',1),
        self::printScript('/assets/plugins/codemirror/lib/codemirror.js',1),
        self::printScript('/assets/plugins/codemirror/addon/edit/closebrackets.js',1),
        self::printScript('/assets/plugins/codemirror/addon/edit/matchbrackets.js',1),
        self::printScript('/assets/plugins/codemirror/mode/shell/shell.js',1),
        self::printScript('/assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js',1),
        self::printScript('/assets/plugins/codemirror/mode/xml/xml.js',1),
        self::printScript('/assets/plugins/codemirror/mode/css/css.js',1),
        self::printScript('/assets/plugins/codemirror/mode/javascript/javascript.js',1),
        self::printScript('/assets/plugins/codemirror/mode/jsx/jsx.js',1),
        self::printScript('/assets/plugins/codemirror/mode/scheme/scheme.js',1),
        self::printScript('/assets/plugins/codemirror/mode/clike/clike.js',1),
        self::printScript('/assets/plugins/codemirror/mode/php/php.js',1),
        self::printScript('/assets/plugins/codemirror/mode/sql/sql.js',1),
        self::printScript('/assets/plugins/codemirror/keymap/sublime.js',1),
        self::printScript('/assets/plugins/codemirror/addon/display/fullscreen.js',1),
        self::printScript('/assets/plugins/codemirror/addon/display/autorefresh.js',1),
        self::printScript('/assets/js/custom/editors.js',0),
        self::printScript('/assets/js/custom/newCode.js',0),
        self::printScript('/assets/js/custom/maxLength.js',0),
      ]
    ]);
    die;
  }

  public function edit() {
    self::sessionActive();
    $this->user->entryBelongsToTheUser($_GET['id']);
    if(!isset($_GET['type']) || !isset($_GET['id'])) {
      die(LANG['no_received_all_parameters']);
    }

    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/head.php', [
      'session' => parent::session(),
      'styles' => [
        self::printCss('/assets/plugins/bootstrap-select/css/bootstrap-select.css',1),
        self::printCss('/assets/plugins/codemirror/lib/codemirror.css',1),
        self::printCss('/assets/plugins/codemirror/addon/display/fullscreen.css',1),
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/footer.php', [
      'scripts' => [
        self::printScript('/assets/plugins/ckeditor/ckeditor.js',1),
        self::printScript('/assets/js/pages/forms/editors.js',1),
        self::printScript('/assets/plugins/codemirror/lib/codemirror.js',1),
        self::printScript('/assets/plugins/codemirror/addon/edit/closebrackets.js',1),
        self::printScript('/assets/plugins/codemirror/addon/edit/matchbrackets.js',1),
        self::printScript('/assets/plugins/codemirror/mode/shell/shell.js',1),
        self::printScript('/assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js',1),
        self::printScript('/assets/plugins/codemirror/mode/xml/xml.js',1),
        self::printScript('/assets/plugins/codemirror/mode/css/css.js',1),
        self::printScript('/assets/plugins/codemirror/mode/javascript/javascript.js',1),
        self::printScript('/assets/plugins/codemirror/mode/jsx/jsx.js',1),
        self::printScript('/assets/plugins/codemirror/mode/scheme/scheme.js',1),
        self::printScript('/assets/plugins/codemirror/mode/clike/clike.js',1),
        self::printScript('/assets/plugins/codemirror/mode/php/php.js',1),
        self::printScript('/assets/plugins/codemirror/mode/sql/sql.js',1),
        self::printScript('/assets/plugins/codemirror/keymap/sublime.js',1),
        self::printScript('/assets/plugins/codemirror/addon/display/fullscreen.js',1),
        self::printScript('/assets/plugins/codemirror/addon/display/autorefresh.js',1),
        self::printScript('/assets/js/custom/editors.js',0),
        self::printScript('/assets/js/custom/newCode.js',0),
        self::printScript('/assets/js/custom/maxLength.js',0),
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
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
    parent::render($this->viewUrl.'/'.$_SERVER['PARTS'].'/notifications.php', []);
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

  public function languageUrl($lang) {
    $url = $_SERVER['REQUEST_URI'];
    parse_str(parse_url($url, PHP_URL_QUERY), $url_params);
    unset($url_params['lang']);

    $languageUrl = '?';

    foreach ($url_params as $key => $param) {
      $languageUrl .= $key.'='.$param.'&';
    }

    if(empty($url_params)) {
      $languageUrl = '?lang='.$lang;
    } else {
      $languageUrl .= 'lang='.$lang;
    }

    return $languageUrl;
  }

  public function sitemap() {
    parent::render($this->viewUrl.'/'.__FUNCTION__.'.php', [
      'sitemap' => $this->view->getSitemap(),
    ]);
    die;
  }

  private function printCss($url, $cache) {
    $caching = self::removeCache($cache);
  	return '<link rel="stylesheet" href="'.$url.$caching.'" media="all">';
  }

  private function printScript($url, $cache) {
    $caching = self::removeCache($cache);
  	return '<script src="'.$url.$caching.'" defer></script>';
  }

  private function removeCache($cache) {
    return !$cache ? '?v='.hash('md5', time()) : '';
  }

  private function returnGet($get) {
    return isset($_GET[$get]) && !empty($_GET[$get]) ? $_GET[$get] : '';
  }

  public function __destruct() {}

}
