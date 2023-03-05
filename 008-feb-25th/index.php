<?php
$chemin = substr($_SERVER['SCRIPT_FILENAME'], 0, -9);
define("ROOT", $chemin);



//chargement du modèle et du controleur principal
// include_once ROOT . 'models/Model.php';

// Connection::getInstance();


include_once ROOT . 'helpers.php';

include_once ROOT . 'Controllers/Users.php';
//..........................................

//Récupérez les paramètres du lien: Contrôleur, action et l'id
//Traitement en fonction de l'action



$usersController = new UsersController();



$url = $_GET['url'];

$controller = $action = $identifier = '';

$slash_count = substr_count($url, '/');

if ($slash_count === 2) {
  list($controller, $identifier, $action) = explode('/', $url);
}

if ($slash_count === 1) {
  list($controller, $action) = explode('/', $url);
}

if ($slash_count === 0) {
  list($controller) = explode('/', $url);

  $action = 'index';
}



// echo 'controller ' . $controller;
// echo '<br>';
// echo 'action ' . $action;
// echo '<br>';
// echo 'identifier ' . $identifier;

switch ($controller) {
  case 'users':

    switch ($action) {
      case 'index':
        $usersController->index();
        break;

      case 'create':
        $usersController->create();
        break;

      case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
          $usersController->edit($identifier);
        else
          $usersController->update($identifier, $_POST);
        break;
    }



    break;

}







?>
