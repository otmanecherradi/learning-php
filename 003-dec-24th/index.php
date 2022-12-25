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
  if (!ig('show')) {
  ?>
  <?php
    if (!ig('date') && !ig('nbr')) {
  ?>
  <fieldset>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get">
      <div>
        <label for="">Date d'achat</label>
        <input type="date" name="date">
      </div>

      <div>
        <label for="">Nombre de produits</label>
        <input type="number" name="nbr">
      </div>

      <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
      </div>
    </form>
  </fieldset>
  <?php
    } else {

  ?>

  <div>
    Date : <?= g('date') ?>
  </div>
  <form action="<?= $_SERVER['PHP_SELF']; ?>?show=true" method="post">
    <input type="hidden" name="date" value="<?= g('date') ?>">
    <input type="hidden" name="nbr" value="<?= g('nbr') ?>">
    <?php
      for ($i = 0; $i < intval(g('nbr')); $i++) {
    ?>
    <fieldset style="margin-bottom:1em">
      <legend>Produit <?= $i + 1 ?></legend>
      <div>
        <label for="">Reference</label>
        <input type="text" name="ref[]">
      </div>

      <div>
        <label for="">Designation</label>
        <input type="text" name="des[]">
      </div>

      <div>
        <label for="">Price</label>
        <input type="text" name="price[]">
      </div>

      <div>
        <label for="">Quantity</label>
        <input type="text" name="qty[]">
      </div>
    </fieldset>
    <?php
      }
    ?>
    <div>
      <button type="submit">Envoyer</button>
      <button type="reset">Annuler</button>
    </div>
  </form>

  <?php
    }
  } else {
  ?>


  <div>
    Date : <?= p('date') ?>
  </div>

  <table border="1">
    <thead>
      <th>Reference</th>
      <th>Designation</th>
      <th>Price</th>
      <th>Quantity</th>
    </thead>
    <tbody>
      <?php

    for ($i = 0; $i < intval(p('nbr')); $i++) {
      ?>

      <tr>

        <td><?= p('ref')[$i] ?></td>
        <td><?= p('des')[$i] ?></td>
        <td><?= p('price')[$i] ?></td>
        <td><?= p('qty')[$i] ?></td>

      </tr>

      <?php
    }
      ?>

      <tr>
        <td colspan="2">
          Total
        </td>
        <td>
          <?= array_reduce(p('price'), function ($a, $b) {
      return $a + intval($b);
    }, 0); ?>
        </td>
        <td>
          <?= array_reduce(p('qty'), function ($a, $b) {
      return $a + intval($b);
    }, 0); ?>
        </td>
      </tr>
    </tbody>
  </table>

  <?php
  }
  ?>

</body>

</html>


<!-- ref, des, price, qty

table + total -->
