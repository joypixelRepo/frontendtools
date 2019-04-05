<?php
class ActionController {

  private $action;
  private $view;

  public function __construct() {
    $this->action = new Action();
    $this->view = new VController();
  }

  public function save_entry() {
  	if($this->action->saveEntry()) {
  		header('Location: /v/newCode?s=1');
  	} else {
  		// TODO redirigir a página de error
  		die('No se ha guardado el extracto de código debido a un error inesperado.');
  	}
  }

  public function edit_entry() {
    $prevUrl = isset($_POST['url']) ? $_POST['url'] : '/';

    if($this->action->editEntry()) {
      header('Location: '.urldecode($prevUrl));
    } else {
      // TODO redirigir a página de error
      die('No se ha modificado el extracto de código debido a un error inesperado.');
    }
  }

  public function delete() {
    if(!isset($_GET['type']) || !isset($_GET['id'])) {
      die('No se han recibido todos los parametros para poder realizar la operación solicitada.');
    }
    
    if($_GET['type'] == 'entry') {
      if($this->action->deleteEntry($_GET['id'])) {
        header('Location: /');
      } else {
        // TODO redirigir a página de error
        die('No se ha eliminado la entrada debido a un error inesperado.');
      }
    }
    else if($_GET['type'] == 'category') {
      if($this->action->deleteCategory($_GET['id'])) {
        header('Location: /');
      } else {
        // TODO redirigir a página de error
        die('No se ha eliminado la entrada debido a un error inesperado.');
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

  public function __destruct() {}
}
