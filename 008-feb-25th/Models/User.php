<?php
include_once("Model.php");
class User extends Model
{
  public $username, $pwd, $student_cne;

  static $table_name = 'users';

  public static function mapToModel(array $dbRecord)
  {
    $u = new User();
    $u->id = $dbRecord['id'];
    $u->username = $dbRecord['username'];
    $u->pwd = $dbRecord['pwd'];
    $u->student_cne = $dbRecord['student_cne'];

    return $u;
  }

  public function isAdmin()
  {
    return $this->student_cne === null;
  }
}

?>
