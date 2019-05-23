<!doctype html>
<html class="no-js" lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

	<title>Web Tools for Front-end developers</title>
	<!-- Favicon-->
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<!-- common styles -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
	<link rel="stylesheet" href="/assets/plugins/morrisjs/morris.css">
	<link rel="stylesheet" href="/assets/css/main.css">
	<link rel="stylesheet" href="/assets/plugins/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="/assets/css/color_skins.css">
	<link rel="stylesheet" href="/assets/css/custom/custom.css?v=<?= time() ?>">
	<link rel="stylesheet" type="text/css" href="/assets/css/custom/dynamic.php?v=<?= time() ?>">

	<!-- common scrips -->
	<script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>
	
	<?php if(isset($styles) && !empty($styles)) {
		echo '<!-- required styles for this view -->'."\n\t";
		foreach ($styles as $style) {
			echo $style."\n\t";
		}
	} ?>

</head>
<body class="theme-orange">
	<div id="cookies" style="display: none;">
		<p>Este sitio utiliza cookies propias y de terceros para mejorar tu experiencia de usuario. Si continuas navegando estás aceptando el uso de las cookies. <a href="#" id="accept-cookies">Aceptar y no mostrar más</a>.</p>
	</div>