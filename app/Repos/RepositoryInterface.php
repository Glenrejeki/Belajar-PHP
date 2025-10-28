<?php
namespace App\Repos;
use App\Models\Task;

interface RepositoryInterface {
  public function all(): array;
  public function find(int $id): ?array;
  public function create(Task $task): int;
  public function update(int $id, Task $task): void;
  public function delete(int $id): void;
  public function toggleDone(int $id, bool $done): void;
}
