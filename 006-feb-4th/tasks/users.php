<?php

$pdo = require_once('../db/connection.php');

include_once('../includes/helpers.php');


include_once('../db/users.php');


if (!ig('action')) {
  header('Location: /ihm/users/index.php');
  die();
}


switch (g('action')) {
  case 'add':
    if (!ic('user')) {
      header('location: /login.php');
      die();
    }
    Users::add([
      'username' => p('username'),
      'pwd' => p('pwd'),
      'student' => p('student'),
    ]);
    break;

  case 'update':
    if (!ic('user')) {
      header('location: /login.php');
      die();
    }
    Users::update(p('id'), [
      'username' => p('username'),
      'pwd' => p('pwd'),
      'student' => p('student'),
    ]);
    break;

  case 'delete':
    if (!ic('user')) {
      header('location: /login.php');
      die();
    }
    Users::delete(p('id'));
    break;

  case 'login':
    $res = Users::login(p('username'), p('pwd'));

    if ($res == true) {
      setcookie('user', p('username'), time() + 60 * 60 * 24, '/');
      header('Location: /ihm/index.php');
      die();
    }
    header('Location: /login.php?err=true');
    die();

  case 'logout':
    if (!ic('user')) {
      header('location: /login.php');
      die();
    }
    setcookie('user', '', time() - 1000, '/');
    header('Location: /index.php');
    die();
}

header('Location: /ihm/users/index.php');
die();
