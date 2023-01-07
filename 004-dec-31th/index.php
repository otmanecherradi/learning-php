<?php

$pdo = require('./includes/db.php');

$stm = $pdo->query('select * from guests;');

$guests = $stm->fetchAll(PDO::FETCH_ASSOC);


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

  <?php

  if ($guests) {
    ?>

    <table border="1">
      <thead>
        <th>id</th>
        <th>Last name</th>
        <th>First name</th>
        <th>Email</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <?php

        foreach ($guests as $guest) {
          ?>

          <tr>

            <td>
              <?= $guest['id'] ?>
            </td>
            <td>
              <?= $guest['last_name'] ?>
            </td>
            <td>
              <?= $guest['first_name'] ?>
            </td>
            <td>
              <?= $guest['email'] ?>
            </td>
            <td>
              <a href="/update.php?id=<?= $guest['id'] ?>">Update</a>
              <a href="/delete.php?id=<?= $guest['id'] ?>">Delete</a>
            </td>

          </tr>

        <?php
        }
        ?>
      </tbody>
    </table>

  <?php
  } else {
    ?>

    <div>No guests available</div>
  <?php
  }
  ?>


  <div>
    <a href="/add.php">Add a guest</a>
  </div>

</body>

</html>
