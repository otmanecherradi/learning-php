<?php


function getPDO(): PDO
{

  $localhost = 'localhost';
  $user = 'docker';
  $pwd = 'docker';
  $dbname = 'school__php';

  try {
    $dsn = "pgsql:host=$localhost;port=5432;dbname=$dbname;";

    // make a database connection
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
