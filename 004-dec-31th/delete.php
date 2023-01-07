<?php

function ig($key)
{
  return isset($_GET[$key]);
}
function ip($key)
{
  return isset($_POST[$key]);
}
function g($key)
{
  return $_GET[$key];
}
function p($key)
{
  return $_POST[$key];
}

$pdo = require('./includes/db.php');

if (!ig('id')) {
  header("Location: /");
  die();
}

$stm = $pdo->prepare('select * from guests where id = :id;');

$stm->execute([
  'id' => g('id'),
]);

$guest = $stm->fetch(PDO::FETCH_ASSOC);

if (!$guest) {
  header("Location: /update.php?err=invalid_id");
  die();
}

$stm = $pdo->prepare('delete from guests where id = :id;');

$stm->execute([
  'id' => $guest['id'],
]);

header("Location: /");
die();

?>
