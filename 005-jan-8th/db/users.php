<?php



class Users
{
  static function all()
  {
    global $pdo;

    $stm = $pdo->prepare("select * from users;");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  static function byId($id)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from users where id = :id;");
    $stm->execute([
      'id' => $id,
    ]);

    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  static function byUsername($username)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from users where username = :username;");
    $stm->execute([
      'username' => $username,
    ]);

    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  static function add($data)
  {
    global $pdo;

    $stm = $pdo->prepare("insert into users (username, pwd, student_cne) values (:username, :pwd, :studentCNE);");
    $stm->execute([
      'username' => $data['username'],
      'pwd' => password_hash(hash_hmac('sha256', $data['pwd'], 'secret here'), PASSWORD_ARGON2I),
      'studentCNE' => $data['student'] == 'none' ? null : $data['student'],
    ]);
  }

  static function login($username, $pwd)
  {
    $user = Users::byUsername($username);

    return password_verify(hash_hmac('sha256', $pwd, 'secret here'), $user['pwd']);
  }

  static function update($id, $data)
  {
    global $pdo;

    $stm = $pdo->prepare("update users set username=:username, pwd=:pwd, student_cne=:studentCNE where id=:id;");
    $stm->execute([
      'id' => $id,
      'username' => $data['username'],
      'pwd' => password_hash(hash_hmac('sha256', $data['pwd'], 'secret here'), PASSWORD_ARGON2I),
      'studentCNE' => $data['student'] == 'none' ? null : $data['student'],
    ]);
  }

  static function delete($id)
  {
    global $pdo;

    $stm = $pdo->prepare("delete from users where id = :id;");
    $stm->execute([
      'id' => $id,
    ]);
  }
}
