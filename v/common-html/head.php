<!doctype html>
<html class="no-js" lang="es">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141935705-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-141935705-1');
  </script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<title><?= !empty($entry['title']) ? $entry['title'] : 'FrontEndTools - Tu repositorio online para guardar y no olvidar fragmentos de código usados por los desarrolladores FrontEnd' ?></title>
  <meta name="description" content="<?= !empty($entry['description']) ? $entry['description'] : 'Entrada sin descripción establecida.' ?>">

	<!-- Favicon-->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png<?= '?v='.hash('md5', time()) ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png<?= '?v='.hash('md5', time()) ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png<?= '?v='.hash('md5', time()) ?>">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

	<!-- common styles -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" media="all">
	<link rel="stylesheet" href="/assets/plugins/morrisjs/morris.css" media="all">
	<link rel="stylesheet" href="/assets/css/main.css" media="all">
	<link rel="stylesheet" href="/assets/plugins/sweetalert/sweetalert.css" media="all">
	<link rel="stylesheet" href="/assets/css/color_skins.css" media="all">
	<link rel="stylesheet" href="/assets/css/custom/custom.css?v=<?= time() ?>" media="all">
	<link rel="stylesheet" type="text/css" href="/assets/css/custom/dynamic.php?v=<?= time() ?>" media="all">

  <!-- SEO -->
  <meta property="og:site_name" content="Frontendtools" />
  <meta property="og:image" content="/assets/images/frontendtools-entry.jpg" />
  <?php if(isset($entry)) { ?>
  <meta property="og:title" content="<?= $entry['title'] ?>" />
  <meta property="og:description" content="<?= $entry['description'] ?>" />
  <?php } else if(isset($seo)) { ?>
  <meta property="og:title" content="<?= $seo['ogtitle'] ?>" />
  <meta property="og:description" content="<?= $seo['ogdescription'] ?>" />
  <?php } ?>

	<!-- common scrips -->
	<script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>
	
	<?php if(isset($styles) && !empty($styles)) {
		echo '<!-- required styles for this view -->'."\n\t";
		foreach ($styles as $style) {
			echo $style."\n\t";
		}
	} ?>

  <?php if(isset($scripts) && !empty($scripts)) {
    echo '<!-- required scripts for this view -->'."\n\t";
    foreach ($scripts as $script) {
      echo $script."\n\t";
    }
  } ?>

</head>
<body class="theme-orange">
	<div id="cookies" style="display: none;">
		<p>Este sitio utiliza cookies propias y de terceros para mejorar tu experiencia de usuario. Si continuas navegando estás aceptando el uso de las cookies. <input type="button" id="accept-cookies" class="btn btn-large btn-raised bg-custom waves-effect ml-2" value="Aceptar y no mostrar más"></p>
	</div>