<?php

print_r($_SERVER);

$env_file = file('../.env');

class EnvVars
{

  public string $DB_CONNECTION;
  public string $DB_HOST;
  public string $DB_PORT;
  public string $DB_DATABASE;
  public string $DB_USERNAME;

  public function __construct(array $env_file)
  {
    $this->process_file($env_file);
  }

  private function process_file(array $env_file)
  {
    foreach ($env_file as $_ => $env_var) {
      $res = explode('=', $env_var);

      if ($res[0] == 'DB_CONNECTION')
        $this->DB_CONNECTION = $res[1];
      if ($res[0] == 'DB_HOST')
        $this->DB_HOST = $res[1];
      if ($res[0] == 'DB_PORT')
        $this->DB_PORT = $res[1];
      if ($res[0] == 'DB_DATABASE')
        $this->DB_DATABASE = $res[1];
      if ($res[0] == 'DB_USERNAME')
        $this->DB_USERNAME = $res[1];
    }
  }
}


return new EnvVars($env_file);
