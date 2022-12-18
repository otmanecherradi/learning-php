<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <?php
  $X = 10;

  $T = array(
    $X++ => 'Lundi',
    $X++ => 'Mardi',
    'Mercredi',
  );


  foreach ($T as $key => $value) {
    echo "$key = $value <br>";
  }

  ?>
</body>

</html>
