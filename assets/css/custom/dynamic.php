<?php 
header("Content-type: text/css");
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Db.php';

$db = new Db();

$sql = 'SELECT * FROM categories';
$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($categories as $category) {
	echo '.check-categories .category'.$category['id_category'].':checked+label:after{
		background-color: '.$category['background'].' !important;
		border: 2px solid '.$category['background'].' !important;
	}';
	echo '.check-categories .category'.$category['id_category'].':checked+label:before{
		border-right: 2px solid '.$category['font-color'].' !important;
		border-bottom: 2px solid '.$category['font-color'].' !important;
	}';

	echo '.border'.$category['id_category'].'{
		border-bottom: 2px solid '.$category['background'].';
	}';
}