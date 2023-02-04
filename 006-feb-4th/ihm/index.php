<?php
$pdo = require_once('../db/connection.php');

include('../includes/head.php');

include_once('../includes/helpers.php');

include_once('../db/users.php');
if (!ic('user')) {
  header('location: /login.php');
  die();
}
$account = Users::byUsername(c('user'));

include_once('../includes/nav.php');
?>

<?php
nav('home');
?>

<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Home</h1>
  </div>
</header>

<?php
include('../includes/tail.php');
?>
