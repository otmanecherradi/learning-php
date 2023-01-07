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


function redirectWithError($error)
{
  header("Location: /?err=$error");
  die();
}

$pdo = require('./includes/db.php');

if (ip('lastName') && ip('firstName') && ip('email')) {
  $stm = $pdo->prepare('insert into guests (email, last_name, first_name) values (:email, :lastName, :firstName);');

  $stm->execute([
    'email' => p('email'),
    'lastName' => p('lastName'),
    'firstName' => p('firstName'),
  ]);

  header("Location: /");
  die();
}

// if (!ip('lastName')) {
//   redirectWithError('lastName');
// }
// if (!ip('firstName')) {
//   redirectWithError('firstName');
// }
// if (!ip('email')) {
//   redirectWithError('email');
// }



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
    <form action="/add.php" method="post">
      <div>
        <label for="">Last name</label>
        <input type="text" name="lastName">
      </div>

      <div>
        <label for="">First name</label>
        <input type="text" name="firstName">
      </div>

      <div>
        <label for="">Email</label>
        <input type="email" name="email">
      </div>

      <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
      </div>
    </form>
  </fieldset>

</body>

</html>
