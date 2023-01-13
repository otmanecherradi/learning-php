<?php



class Absences
{
  static function all()
  {
    global $pdo;

    $stm = $pdo->prepare("select * from absences order by week ASC;");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  static function byCNE($cne)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from absences where cne = :cne order by week ASC;");
    $stm->execute([
      'cne' => $cne,
    ]);

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  static function byWeek($week)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from absences where  week = :week order by week ASC;");
    $stm->execute([
      'week' => $week
    ]);

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  static function byCNEAndWeek($cne, $week)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from absences where cne = :cne and week = :week;");
    $stm->execute([
      'cne' => $cne,
      'week' => $week
    ]);

    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  static function add($data)
  {
    global $pdo;

    $stm = $pdo->prepare("insert into absences (cne, week, nbr) values(:cne, :week, :nbr);");
    $stm->execute([
      'nbr' => $data['nbr'],
      'cne' => $data['cne'],
      'week' => $data['week']
    ]);
  }


  static function update($cne, $week, $nbr)
  {
    global $pdo;

    $stm = $pdo->prepare("update absences set nbr = :nbr where cne = :cne and week = :week;");
    $stm->execute([
      'nbr' => $nbr,
      'cne' => $cne,
      'week' => $week
    ]);
  }


  static function delete($cne, $week)
  {
    global $pdo;

    $stm = $pdo->prepare("delete from absences where cne = :cne and week = :week;");
    $stm->execute([
      'cne' => $cne,
      'week' => $week,
    ]);
  }
}
