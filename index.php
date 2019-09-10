<?php
// gzip compression
ob_start("ob_gzhandler");
// set cache life
header('Cache-Control: max-age=31557600');

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Languages.php';
$languages = new Languages();

setlocale(LC_TIME, LANG['setlocale']);

spl_autoload_register(function ($class) {
  $folder = (strpos($class, 'Controller')) ? 'controllers/' : 'models/';
  $path = $_SERVER['DOCUMENT_ROOT'].'/'.$folder. $class . '.php';
	if(file_exists($path)) {
		require_once $path;
	}
});

$controller = $_SERVER['VIEWS'];
$action = 'index';

if(isset($_GET['controller'])) {
	$controller = $_GET['controller'];
}
if(isset($_GET['action'])) {
	$action = $_GET['action'];
}

$controller = ucwords($controller).'Controller';

try {
  if(strpos($controller, 'Assets') === false) {
	  $init = new $controller();
	  $init->$action();
  }
}
catch (Exception $e) {
	echo $e->getMessage(), "<br/>";
}

ob_flush();
