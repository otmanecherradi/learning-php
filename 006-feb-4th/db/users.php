<?php


class User
{
  private int $id;
  private string $username;
  private string $pwd;
  private ?string $studentCNE;

  public function __construct(int $id, string $username, string $pwd, ?string $studentCNE)
  {
    $this->id = $id;
    $this->username = $username;
    $this->pwd = $pwd;
    $this->studentCNE = $studentCNE;
  }

  public function getId()
  {
    return $this->id;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function getPassword()
  {
    return $this->pwd;
  }
  public function getStudentCNE()
  {
    return $this->studentCNE;
  }

  static function with($dbRecord)
  {
    return new User((int) $dbRecord['id'], $dbRecord['username'], $dbRecord['pwd'], $dbRecord['student_cne']);
  }
}


class Users
{
  /**
   * @return User[]
   */
  static function all()
  {
    global $pdo;

    $stm = $pdo->prepare("select * from users;");
    $stm->execute();

    $dbUsers = $stm->fetchAll(PDO::FETCH_ASSOC);

    return array_map(fn($record): User => User::with($record), $dbUsers);
  }

  /**
   * @return User
   */
  static function byId($id)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from users where id = :id;");
    $stm->execute([
      'id' => $id,
    ]);

    $dbUser = $stm->fetch(PDO::FETCH_ASSOC);
    return User::with($dbUser);
  }

  static function byUsername($username)
  {
    global $pdo;

    $stm = $pdo->prepare("select * from users where username = :username;");
    $stm->execute([
      'username' => $username,
    ]);

    $dbUser = $stm->fetch(PDO::FETCH_ASSOC);
    return User::with($dbUser);
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
