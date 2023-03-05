<?php

class Connection
{
  public $id = -1;
  // déclaration d'une variable qui va contenir des objets PDO
  private static ?PDO $pdo = null;

  public static function getInstance(): PDO
  {
    if (self::$pdo == null) {
      $env_file = file(ROOT . ".env");
      $sgbd = trim(explode('=', $env_file[0])[1]);
      $server = trim(explode('=', $env_file[1])[1]);
      $dbname = trim(explode('=', $env_file[3])[1]);
      $user = trim(explode('=', $env_file[4])[1]);
      $password = trim(explode('=', $env_file[5])[1]);
      self::$pdo = new PDO(
        $sgbd . ':host=' . $server . ';dbname=' . $dbname,
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

  static $table_name = '';

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
      array_push($req, get_class($this)::$table_name);
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
      array_push($req, Model::$table_name);
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
      $stm = Connection::getInstance()->prepare('delete from ' . self::$table_name . ' where id = :id');

      $stm->bindValue('id', $this->id);

      return $stm->execute();
    }
  }


  public static function find($id)
  {
    if (Connection::getInstance() == null)
      return;

    $stm = Connection::getInstance()->prepare('select * from ' . get_called_class()::$table_name . ' where id = :id');
    $stm->execute([
      'id' => $id,
    ]);

    $dbRecord = $stm->fetch(PDO::FETCH_ASSOC);
    return get_called_class()::mapToModel($dbRecord);
  }


  public static function All()
  {
    if (Connection::getInstance() == null)
      return;

    $stm = Connection::getInstance()->prepare('select * from ' . get_called_class()::$table_name);

    $stm->execute();
    $dbRecords = $stm->fetchAll();

    return array_map(fn($record) => get_called_class()::mapToModel($record), $dbRecords);
  }
}
?>
