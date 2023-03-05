<?php

class Connection extends PDO
{

  public function __construct(EnvVars $env)
  {
    $dsn = $env->DB_CONNECTION . ':host=' . $env->DB_CONNECTION . ';port=' . $env->DB_CONNECTION . ';dbname=$' . $env->DB_CONNECTION . ';';

    print_r($dsn);
    die();

    parent::__construct(
      $dsn,
      $user,
      $pwd,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
  }
}

new Connection($env);



function getPDO(): PDO
{

  $localhost = 'localhost';
  $user = 'docker';
  $pwd = 'docker';
  $dbname = 'school__php';

  try {
    $dsn = "pgsql:host=$localhost;port=5432;dbname=$dbname;";

    return new PDO(
      $dsn,
      $user,
      $pwd,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

return getPDO();
