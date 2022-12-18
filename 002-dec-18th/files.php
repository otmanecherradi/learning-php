<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <?php
  $file = file('./db.csv');
  print_r($file);

  ?>

  <table>
    <tbody>
      <?php
      foreach ($file as $client) { ?>
      <tr>
        <?php
        foreach (explode(',', $client) as $value) { ?>
        <td>
          <?= $value ?>
        </td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
</body>

</html>
