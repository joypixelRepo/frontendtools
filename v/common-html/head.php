<!doctype html>
<html class="no-js" lang="<?= LANG['metaLang'] ?>">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141935705-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-141935705-1');
  </script>

  <? $langVars = json_encode(LANG) ?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<title><?= !empty($entry['title']) ? $entry['title'] : LANG['defaultTitle'] ?></title>

  <!-- SEO -->
  <?php if(isset($entry)) { ?>

  <meta name="description" content="<?= !empty($entry['description']) ? $entry['description'] : $entry['title'] ?>">
  <meta property="og:title" content="<?= $entry['title'] ?>" />
  <meta property="og:description" content="<?= $entry['description'] ?>" />

  <?php } else if(isset($seo)) { ?>

  <meta name="description" content="<?= $seo['ogdescription'] ?>">
  <meta property="og:title" content="<?= $seo['ogtitle'] ?>" />
  <meta property="og:description" content="<?= $seo['ogdescription'] ?>" />

  <?php } ?>

  <meta property="og:site_name" content="Frontendtools" />
  <meta property="og:image" content="/assets/images/frontendtools-entry.jpg" />
  <!-- end SEO -->

	<!-- Favicon-->
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />

  <script>var LANG_JS = <?= $langVars ?></script>

	<!-- common styles -->
  <?php

  $csss = [
    '/assets/plugins/bootstrap/css/bootstrap.min.css',
    '/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css',
    '/assets/plugins/morrisjs/morris.css',
    '/assets/plugins/sweetalert/sweetalert.css',
    '/assets/css/color_skins.css',
    '/assets/css/main.css',
    '/assets/css/custom/custom.css',
  ];

  // push required styles for this view
  if(isset($styles) && !empty($styles)) {
    foreach ($styles as $style) {
      array_push($csss, $style);
    }
  }

  $allCss = '';
  foreach ($csss as $css) {
    $allCss .= file_get_contents($_SERVER['DOCUMENT_ROOT'].$css);
    $allCss .= "\n";
  }
  // minimize
  $allCss = preg_replace('/\/\*((?!\*\/).)*\*\//','',$allCss); // negative look ahead
  $allCss = preg_replace('/\s{2,}/',' ',$allCss);
  $allCss = preg_replace('/\s*([:;{}])\s*/','$1',$allCss);
  $allCss = preg_replace('/;}/','}',$allCss);

  echo '<style type="text/css">'.$allCss.'</style>';
  ?>

	<link rel="stylesheet" type="text/css" href="/assets/css/custom/dynamic.php?v=<?= time() ?>" media="all">

	<!-- common scrips -->
	<script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>

  <?php if(isset($scripts) && !empty($scripts)) {
    echo '<!-- required scripts for this view -->'."\n\t";
    foreach ($scripts as $script) {
      echo $script."\n\t";
    }
  } ?>

</head>
<body class="theme-orange">
	<div id="cookies" style="display: none;">
		<p><?= LANG['cookiesTxt'] ?> <input type="button" id="accept-cookies" class="btn btn-large btn-raised bg-custom waves-effect ml-2" value="<?= LANG['cookiesAccept'] ?>"></p>
	</div>