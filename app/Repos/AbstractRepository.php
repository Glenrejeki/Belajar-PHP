<?php
namespace App\Repos;
use PDO;

abstract class AbstractRepository implements RepositoryInterface {
  protected PDO $db;
  public function __construct(PDO $db) { $this->db = $db; }

  // Helper protected (encapsulation of common behavior)
  protected function ensureTaskExists(int $id): void {
    $st = $this->db->prepare('SELECT 1 FROM tasks WHERE id=?'); $st->execute([$id]);
    if (!$st->fetchColumn()) throw new \RuntimeException('Task tidak ditemukan');
  }
}
