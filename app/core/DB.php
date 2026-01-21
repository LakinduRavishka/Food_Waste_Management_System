<?php
declare(strict_types=1);

final class DB {
  private static ?PDO $pdo = null;

  public static function pdo(): PDO {
    if (self::$pdo) return self::$pdo;
    $db = config('db');
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $db['host'], $db['name'], $db['charset']);
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];
    self::$pdo = new PDO($dsn, $db['user'], $db['pass'], $options);
    return self::$pdo;
  }
}
