<?php
class OptionsController {

  private $options;

  public function __construct() {
    $this->options = new Options();
  }

  public function save() {
    $this->options->save();
    header('Location: /');
  }

  public function __destruct() {}
}
