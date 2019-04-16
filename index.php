<?php
ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

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
