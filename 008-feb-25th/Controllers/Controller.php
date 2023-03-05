<?php

abstract class Controller
{
  public $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function checkAuth()
  {

    if (!ic('user')) {
      $this->redirect('login');
    }

    $account = User::find(c('user_id'));
    if (isset($account->student_cne)) {
      $this->redirect('absences/all');
    }

    return $account;
  }

  public function view(string $file, $ctx = [])
  {
    include_once ROOT . 'views/includes/head.php';
    include_once ROOT . 'views/' . $this->model::$table_name . '/' . $file . '.php';
    include_once ROOT . 'views/includes/tail.php';
  }

  public function redirect($location)
  {
    header('Location: /index.php?url=' . $location);
    die();
  }
}

?>
