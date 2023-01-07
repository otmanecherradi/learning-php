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

if (ip('firstName') && ip('firstName') && ip('email')) {

  $stm = $pdo->prepare('update guests set email = :email, last_name = :lastName, first_name = :firstName where id = :id;');

  $stm->execute([
    'id' => $guest['id'],
    'email' => p('email'),
    'lastName' => p('lastName'),
    'firstName' => p('firstName'),
  ]);

  header("Location: /");
  die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <fieldset>
    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $guest['id'] ?>" method="post">
      <div>
        <label for="">Last name</label>
        <input type="text" name="lastName" value="<?= $guest['last_name'] ?>">
      </div>

      <div>
        <label for="">First name</label>
        <input type="text" name="firstName" value="<?= $guest['first_name'] ?>">
      </div>

      <div>
        <label for="">Email</label>
        <input type="email" name="email" value="<?= $guest['email'] ?>">
      </div>

      <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
      </div>
    </form>
  </fieldset>

</body>

</html>
