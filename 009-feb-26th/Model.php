<?php

class Connection
{
  public $id = -1;
  // déclaration d'une variable qui va contenir des objets PDO
  private static ?PDO $pdo = null;

  public static function getInstance(): PDO
  {
    if (self::$pdo == null) {
      $chemin = substr($_SERVER['SCRIPT_FILENAME'], 0, -9);
      $fichier = file($chemin . ".env");
      $server = trim(explode('=', $fichier[1])[1]);
      $dbname = trim(explode('=', $fichier[3])[1]);
      $user = trim(explode('=', $fichier[4])[1]);
      $password = trim(explode('=', $fichier[5])[1]);
      self::$pdo = new PDO(
        'mysql:host=' . $server . ';dbname=' . $dbname,
        $user,
        $password,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    }

    return self::$pdo;
  }

}

abstract class Model
{
  public $id = -1;
  // déclaration d'une variable qui va contenir des objets PDO

  public abstract static function mapToModel(array $dbRecord);

  public function save()
  {
    if (Connection::getInstance() == null)
      return;

    $data = (array) $this;
    $req = [];
    if ($this->id == -1) {
      array_push($req, 'insert into');
      array_push($req, get_class($this));
      array_push($req, '(');

      $fields = $values = [];

      foreach ($data as $key => $value)
        if ($key != "id") {
          array_push($fields, $key);
          array_push($values, "'$value'");
        }

      array_push($req, join(', ', $fields));
      array_push($req, ') values (');
      array_push($req, join(', ', $values));

      array_push($req, ')');
    } else {
      array_push($req, 'update');
      array_push($req, get_class($this));
      array_push($req, 'set');

      $fields = [];

      foreach ($data as $key => $value)
        if ($key != "id") {
          array_push($fields, "$key = '$value'");
        }

      array_push($req, join(', ', $fields));

      array_push($req, 'where id=' . $this->id);
    }

    Connection::getInstance()->exec(join(' ', $req));
  }


  public function delete()
  {
    if (Connection::getInstance() == null)
      return;

    if ($this->id == -1) {
      $stm = Connection::getInstance()->prepare('delete from ' . get_class($this) . ' where id = :id');

      $stm->bindValue('id', $this->id);

      return $stm->execute();
    }
  }


  public static function find($id)
  {
    if (Connection::getInstance() == null)
      return;

    $stm = Connection::getInstance()->prepare('select from * from ' . get_called_class() . ' where id = :id');
    $stm->execute([
      'id' => $id,
    ]);

    $dbRecord = $stm->fetch(PDO::FETCH_ASSOC);
    return self::mapToModel($dbRecord);
  }


  public static function All()
  {
    if (Connection::getInstance() == null)
      return;

    $stm = Connection::getInstance()->prepare('select from * from ' . get_called_class());

    $stm->execute();
    $dbRecords = $stm->fetchAll();

    return array_map(fn($record) => self::mapToModel($record), $dbRecords);
  }
}
?>
