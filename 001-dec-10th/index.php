<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <table border="1" width="480">
    <tbody>
      <?php
      $X = 10;

      for ($i = 1; $i < $X; $i++) {
        if ($i == 1)
          echo '<tr style="background:#5FFBF8">';
        elseif ($i % 2 != 0)
          echo '<tr style="background:#F601BF">';
        else
          echo '<tr>';

        echo '<td style="background:#5FFBF8">';
        if ($i != 1) {
          echo "<strong><center>" . $i . "</center></strong>";
        }
        echo '</td>';

        for ($j = 2; $j < $X; $j++) {
          echo '<td>';
          if ($i == 1 || $i == $j)
            echo '<strong><center>' . $j . '</center></strong>';
          else
            echo '<center>' . $i * $j . '</center>';
          echo '</td>';
        }
        echo '</tr>';
      }

      ?>
    </tbody>
  </table>
</body>

</html>
