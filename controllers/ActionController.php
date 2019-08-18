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
      parent::notify('success', LANG['entry_created'], LANG['entry_created_successfully'], '/');
  	} else {
      parent::notify('error', LANG['entry_not_created'], LANG['entry_not_created_description'], '/');
  	}
  }

  public function edit_entry() {
    $prevUrl = isset($_POST['url']) ? $_POST['url'] : '/';

    if($this->action->editEntry()) {
      parent::notify('success', LANG['entry_modified'], LANG['entry_modified_correctly'], urldecode($prevUrl));
    } else {
      parent::notify('error', LANG['error_modifying_entry'], LANG['entry_not_created_try_again'], '/');
    }
  }

  public function delete() {
    if(!isset($_GET['type']) || !isset($_GET['id'])) {
      die(LANG['not_all_parameters_received']);
    }
    
    if($_GET['type'] == 'entry') {
      if($this->action->deleteEntry($_GET['id'])) {
        parent::notify('success', LANG['entry_deleted'], LANG['entry_has_been_deleted'], '/');
      } else {
        parent::notify('error', LANG['error_deleting_entry'], LANG['entry_not_deleted_unexpected_error'], '/');
      }
    }
    else if($_GET['type'] == 'category') {
      if($this->action->deleteCategory($_GET['id'])) {
        parent::notify('success', LANG['category_deleted'], LANG['category_has_been_deleted'], '/');
      } else {
        parent::notify('error', LANG['error_deleting_category'], LANG['category_deleted_unexpected_error'], '/');
      }
    }
    else if($_GET['type'] == 'comment') {
      $prevUrl = isset($_GET['url']) ? $_GET['url'] : '/';
      if($this->action->deleteComment($_GET['id'])) {
        parent::notify('success', LANG['comment_deleted'], LANG['comment_has_been_deleted'], $prevUrl);
      } else {
        parent::notify('error', LANG['error_deleting_comment'], LANG['comment_not_deleted_unexpected_error'], $prevUrl);
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
      parent::notify('success', LANG['comment_posted'], LANG['comment_published_correctly'], urldecode($prevUrl));
    } else {
      parent::notify('error', LANG['error'], LANG['not_send_comment'], '/');
    }
  }

  public function sendMessage() {
    if($this->action->sendMessage()) {
      echo 'ok';
    } else {
      echo 'ko';
    }
  }

  public function __destruct() {}
}
