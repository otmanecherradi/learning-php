<?php
$operators = array(
  '+' => function ($nbr1, $nbr2) {
    return $nbr1 + $nbr2;
  },
  '-' => function ($nbr1, $nbr2) {
    return $nbr1 - $nbr2;
  },
  '/' => function ($nbr1, $nbr2) {
    return $nbr1 / $nbr2;
  },
  '*' => function ($nbr1, $nbr2) {
    return $nbr1 * $nbr2;
  },
);
?>

<html>

<head>
  <title>PHP Test</title>

  <style>
    form {
      width: 400px;
    }

    form {
      display: grid;
      grid-template-columns: 1fr 2fr;
      row-gap: 1em;
    }

  </style>
</head>

<body>
  <h1>Calculator</h1>

  <?php
  if (!empty($_GET)) {
  ?>
  <div>
    <?php echo $_GET['nbr1'] . ' ' . $_GET['op'] . ' ' . $_GET['nbr2'] . ' = ' . $operators[$_GET['op']](intval($_GET['nbr1']), intval($_GET['nbr2'])) ?>
  </div>
  <?php
  }
  ?>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get">

    <label for="">First number</label>
    <input type="text" placeholder="" name="nbr1">

    <label for="op">Operator</label>
    <select name="op" id="">
      <?php

      foreach ($operators as $op => $f)
        echo "<option value=\"$op\">$op</option>";
      ?>

    </select>

    <label for="">Second number</label>
    <input type="text" placeholder="" name="nbr2">

    <div>
      <button type="submit">Calc</button>
    </div>

  </form>
</body>

</html>
