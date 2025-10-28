<?php
namespace App\Services;
use PDO;

class Database {
  public static function pdo(): PDO {
    $dsn  = 'pgsql:host=localhost;port=5432;dbname=task_db';
    $user = 'postgres';
    $pass = 'postgres';

    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $pdo;
  }
}
