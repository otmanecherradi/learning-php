<?php

$pdo = require_once('../db/connection.php');

include_once('../includes/helpers.php');

if (!ic('user')) {
  header('location: /login.php');
  die();
}


include_once('../db/absences.php');


if (!ig('action')) {
  header('Location: /ihm/absences/index.php');
  die();
}


switch (g('action')) {
  case 'add':
    Absences::add([
      'cne' => p('student'),
      'week' => p('week'),
      'nbr' => p('nbr'),
    ]);
    break;
  case 'update':
    Absences::update(p('student'), p('week'), p('nbr'));
    break;
  case 'delete':
    list($cne, $week) = explode('::', p('id'));
    Absences::delete($cne, $week);
    break;
}

header('Location: /ihm/absences/index.php');
die();
