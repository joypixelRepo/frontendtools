<?php
class ActionController extends ApplicationController {

  private $action;
  private $view;

  public function __construct() {
    $this->action = new Action();
    $this->view = new VController();
  }

  public function save_entry() {
  	if($this->action->saveEntry()) {
      parent::notify('success', 'Entrada creada', 'La entrada ha sido creada con éxito.', '/');
  	} else {
      parent::notify('error', 'Entrada no creada', 'No se ha guardado el extracto de código debido a un error inesperado.', '/');
  	}
  }

  public function edit_entry() {
    $prevUrl = isset($_POST['url']) ? $_POST['url'] : '/';

    if($this->action->editEntry()) {
      parent::notify('success', 'Entrada modificada', 'La entrada ha sido modificada correctamente.', urldecode($prevUrl));
    } else {
      parent::notify('error', 'Error modificando la entrada', 'La entrada no ha podido sido modificada por un error inesperado. Por favor, prueba de nuevo.', '/');
    }
  }

  public function delete() {
    if(!isset($_GET['type']) || !isset($_GET['id'])) {
      die('No se han recibido todos los parametros para poder realizar la operación solicitada.');
    }
    
    if($_GET['type'] == 'entry') {
      if($this->action->deleteEntry($_GET['id'])) {
        parent::notify('success', 'Entrada eliminada', 'La entrada ha sido eliminada.', '/');
      } else {
        parent::notify('error', 'Error eliminando la entrada', 'La entrada no ha podido ser eliminada por un error inesperado. Por favor, prueba de nuevo.', '/');
      }
    }
    else if($_GET['type'] == 'category') {
      if($this->action->deleteCategory($_GET['id'])) {
        parent::notify('success', 'Categoría eliminada', 'La categoría ha sido eliminada.', '/');
      } else {
        parent::notify('error', 'Error eliminando la categoría', 'La categoría no ha podido ser eliminada por un error inesperado. Por favor, prueba de nuevo.', '/');
      }
    }
    else if($_GET['type'] == 'comment') {
      $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/';
      if($this->action->deleteComment($_GET['id'])) {
        parent::notify('success', 'Comentario eliminado', 'El comentario ha sido eliminado.', $prevUrl);
      } else {
        parent::notify('error', 'Error eliminando el comentario', 'El comentario no ha podido ser eliminado por un error inesperado. Por favor, prueba de nuevo.', $prevUrl);
      }
    }
  }

  public function search() {
    $results = $this->action->search();
    $this->view->results($results);
  }

  public function searchByUser() {
    $results = $this->action->searchByUser();
    $this->view->results($results);
  }

  public function checkTitle() {
    if($this->action->checkTitle()) {
      echo 'exist';
    }
  }

  public function saveComment() {
    $prevUrl = isset($_POST['url']) ? $_POST['url'] : '/';

    if($this->action->saveComment()) {
      parent::notify('success', 'Comentario publicado', 'Tu comentario ha sido publicado correctamente.', urldecode($prevUrl));
    } else {
      parent::notify('error', 'Error', 'No se ha podido enviar tu comentario. Por favor, prueba de nuevo.', '/');
    }
  }

  public function sendMessage() {
    // google recaptcha
    $recaptcha = $_POST["g-recaptcha-response"];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LfZEqsUAAAAABshjNl4ASwt8xvXfx_Dv-1yXFVJ',
        'response' => $recaptcha
    );

    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data),
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
        )
    );

    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if (!$captcha_success->success) {
        die('No se ha enviado el formulario porque no se ha validado el captcha');
    }
    // end google recaptcha

    $prevUrl = isset($_POST['url']) ? $_POST['url'] : '/';

    if($this->action->sendMessage()) {
      parent::notify('success', 'Mensaje enviado', 'Tu mensaje ha sido enviado correctamente.', urldecode($prevUrl));
    } else {
      parent::notify('error', 'Error', 'No se ha podido enviar tu mensaje. Por favor, prueba de nuevo.', '/');
    }
  }

  public function __destruct() {}
}
