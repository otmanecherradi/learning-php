<?php

$pdo = require_once('../db/connection.php');

include_once('../includes/helpers.php');

if (!ic('user')) {
  header('location: /login.php');
  die();
}


include_once('../db/students.php');


if (!ig('action')) {
  header('Location: /ihm/students/index.php');
  die();
}


switch (g('action')) {
  case 'add':
    Students::add([
      'cne' => p('cne'),
      'name' => p('name'),
      'group' => p('group')
    ]);
    break;
  case 'update':
    Students::update(p('cne'), [
      'name' => p('name'),
      'group' => p('group')
    ]);
    break;
  case 'delete':
    Students::delete(p('cne'));
    break;
}

header('Location: /ihm/students/index.php');
die();
