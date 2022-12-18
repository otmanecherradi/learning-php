<html>

<head>
  <title>PHP Test</title>


  <style>
    fieldset,
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
  <?php if (empty($_POST)) { ?>
  <fieldset>
    <legend>Information Personnel</legend>


    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <label for="">Nom</label>
      <input type="text" placeholder="votre nom" name="name">

      <label for="">Sexe</label>
      <div>
        <label for="F">F</label>
        <input type="radio" name="sexe" value="F">
        <label for="M">M</label>
        <input type="radio" name="sexe" value="M">
      </div>



      <label for="">language</label>
      <div>
        <label for="Ar">Ar</label>
        <input type="checkbox" name="lang[]" value="Ar">
        <label for="Fr">Fr</label>
        <input type="checkbox" name="lang[]" value="Fr">
        <label for="Esp">Esp</label>
        <input type="checkbox" name="lang[]" value="Esp">
        <label for="Ang">Ang</label>
        <input type="checkbox" name="lang[]" value="Ang">
      </div>

      <label for="">Specialite</label>
      <select name="spec">
        <option value="Informatique">Informatique</option>
        <option value="Managment">Managment</option>
        <option value="Telecommunication">Telecommunication</option>
        <option value="Logistic">Logistic</option>
      </select>

      <label for="">Address</label>
      <textarea name="address" id="" cols="30" rows="4"></textarea>

      <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
      </div>

    </form>
  </fieldset>


  <?php } else { ?>


  <?= $_POST['name']; ?> is a
    <?= $_POST['sexe'] == 'F' ? 'Female' : 'Male'; ?> and knows
      <?php foreach ($_POST['lang'] as $l)
      echo "$l/"; ?>

      specialized in <?= $_POST['spec']; ?>
        and lives in <?= $_POST['address']; ?>

          <?php } ?>
</body>

</html>
