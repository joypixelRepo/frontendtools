<?php
class ApplicationController {

  protected function render($view, $vars = []) {
    if (file_exists($view)) {
      extract($vars);
      include($view);
    } else {
      echo "<script>console.log('El archivo ".$view." no existe'"."\n".");</script>";
    }
  }

  protected function session() {
    if(!empty(session_id()) && isset($_SESSION['id']) && $_SESSION['id'] === 'aR_3vG_88KlpZ') {
      return true;
    }
  }

  protected function unique_multidim_array($array, $key) {
    $temp_array = [];
    $i = 0;
    $key_array = [];
    
    foreach($array as $val) {
      if(!in_array($val[$key], $key_array)) {
        $key_array[$i] = $val[$key];
        $temp_array[$i] = $val;
      }
      $i++;
    }
    return $temp_array;
  }

  protected function deleteIframe($id) {
    $file = $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/iframes/page'.$id.'.php';
    if (file_exists($file)) {
      unlink($file);
    }
  }

  protected function createIframe($entry) {
    if(isset($entry['executable']) && $entry['executable']) {

$html = 
'<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  '.$entry['css'].'
  </style>
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  '.html_entity_decode($entry['html']).'
  <script>
    '.$entry['javascript'].'
  </script>
</body>
</html>';

      $file = $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/iframes/page'.$entry['id'].'.php';
      $handle = fopen($file,'w+');
      fwrite($handle,$html);
      fclose($handle); 
    }

    return true;
  }

  protected function generateScreenshot($id) {
    $pagina = 'https://frontendtools.net/'.$_SERVER['VIEWS'].'/iframes/page'.$id.'.php';
    //Declaramos la Url enviada desde un formulario
    $URLpagina = "".$pagina."";
     
    //Llamamos a Google PageSpeed Insights API
    $PagespeedDataGoogle = file_get_contents('https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url='.$URLpagina.'&screenshot=true');
     
    //Decodificar datos con JSON
    $PagespeedDataGoogle = json_decode($PagespeedDataGoogle, true);
     
    //La imagen de la captura de pantalla
    $captura = $PagespeedDataGoogle['screenshot']['data'];
    $captura = str_replace(array('_','-'),array('/','+'),$captura); 
     
    //Mostramos en el navegador la captura de pantalla
    return 'data:image/jpeg;base64,'.$captura;
  }

  protected function pushCategories($entries, $db) {
    $sql_categories = 'SELECT * FROM category_entry INNER JOIN categories ON category_entry.category_id = categories.id_category';

    $entryCategories = $db->query($sql_categories)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($entries as $entryKey => $entry) {
      foreach ($entryCategories as $category) {
        if($entry['id'] == $category['entry_id']) {
          $entries[$entryKey]['categories'][] = $category;
        }
      }
    }
    return $entries;
  }

}
