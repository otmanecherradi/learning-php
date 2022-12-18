<?php
$clients = array(
  array('code' => '123', 'nom' => 'nom1', 'prenom' => 'prenom1'),
  array('code' => '124', 'nom' => 'nom2', 'prenom' => 'prenom2'),
  array('code' => '125', 'nom' => 'nom3', 'prenom' => 'prenom3'),
);
?>

<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <table>
    <thead>
      <th>code</th>
      <th>nome</th>
      <th>prenom</th>
    </thead>
    <tbody>
      <?php
      foreach ($clients as $client) { ?>
      <tr>
        <?php
        foreach ($client as $value) { ?>
        <td>
          <?= $value ?>
        </td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>

</body>

</html>
