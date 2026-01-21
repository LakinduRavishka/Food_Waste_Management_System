<?php
declare(strict_types=1);

final class MenuItem {
  public static function all(): array {
    return DB::pdo()->query("SELECT * FROM menu_items ORDER BY name")->fetchAll();
  }

  public static function find(int $id): ?array {
    $stmt = DB::pdo()->prepare("SELECT * FROM menu_items WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    return $row ?: null;
  }

  public static function create(array $data): void {
    $stmt = DB::pdo()->prepare("INSERT INTO menu_items (name, price, active) VALUES (?, ?, ?)");
    $stmt->execute([
      $data['name'], (float)$data['price'], !empty($data['active']) ? 1 : 0
    ]);
  }

  public static function update(int $id, array $data): void {
    $stmt = DB::pdo()->prepare("UPDATE menu_items SET name=?, price=?, active=? WHERE id=?");
    $stmt->execute([
      $data['name'], (float)$data['price'], !empty($data['active']) ? 1 : 0, $id
    ]);
  }

  public static function delete(int $id): void {
    $stmt = DB::pdo()->prepare("DELETE FROM menu_items WHERE id=?");
    $stmt->execute([$id]);
  }
}
