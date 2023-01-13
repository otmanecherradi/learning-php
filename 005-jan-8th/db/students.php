<?php

class Students
{
  static function all()
  {
    global $pdo;

    $stm = $pdo->prepare("select * from students;");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  static function byCNE($cne)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from students where cne = :cne;");
    $stm->execute([
      'cne' => $cne,
    ]);

    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  static function add($data)
  {
    global $pdo;

    $stm = $pdo->prepare('insert into students (cne, name, "group") values (:cne, :name, :group);');
    $stm->execute([
      'cne' => $data['cne'],
      'name' => $data['name'],
      'group' => $data['group'],
    ]);
  }

  static function update($cne, $data)
  {
    global $pdo;


    $stm = $pdo->prepare('update students set name=:name, "group"=:group where cne=:cne;');
    $stm->execute([
      'cne' => $cne,
      'name' => $data['name'],
      'group' => $data['group'],
    ]);
  }

  static function delete($cne)
  {
    global $pdo;

    $stm = $pdo->prepare("delete from students where cne = :cne;");
    $stm->execute([
      'cne' => $cne,
    ]);
  }
}
