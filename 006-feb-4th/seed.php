<?php


$pdo = require_once('./db/connection.php');

include_once('./db/users.php');
include_once('./includes/helpers.php');

$user = Users::byUsername(g('user'));

if (!$user) {
  Users::add([
    'username' => g('user'),
    'pwd' => g('user'),
    'student' => null
  ]);

  echo 'user added';
} else
  echo 'user already exists';
