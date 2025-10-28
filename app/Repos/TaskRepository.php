<?php
namespace App\Repos;

use App\Models\Task;

class TaskRepository extends AbstractRepository
{
  public function all(): array {
    return $this->db->query('SELECT * FROM tasks ORDER BY id DESC')->fetchAll();
  }

  public function find(int $id): ?array {
    $st = $this->db->prepare('SELECT * FROM tasks WHERE id = ?');
    $st->execute([$id]);
    $row = $st->fetch();
    return $row ?: null;
  }

  public function create(Task $t): int {
    // Biarkan created_at diisi DEFAULT NOW()
    $st = $this->db->prepare(
      'INSERT INTO tasks (title, is_done) VALUES (?, ?) RETURNING id'
    );
    $st->execute([
      $t->getTitle(),
      (int)$t->isDone(),             // <— penting
    ]);
    return (int)$st->fetchColumn();
  }

  public function update(int $id, Task $t): void {
    $this->ensureTaskExists($id);
    $st = $this->db->prepare(
      'UPDATE tasks SET title = ?, is_done = ? WHERE id = ?'
    );
    $st->execute([
      $t->getTitle(),
      (int)$t->isDone(),             // <— penting
      $id
    ]);
  }

  public function delete(int $id): void {
    $this->ensureTaskExists($id);
    $st = $this->db->prepare('DELETE FROM tasks WHERE id = ?');
    $st->execute([$id]);
  }

  public function toggleDone(int $id, bool $done): void {
    $this->ensureTaskExists($id);
    $st = $this->db->prepare('UPDATE tasks SET is_done = ? WHERE id = ?');
    $st->execute([(int)$done, $id]); // <— penting
  }
}
