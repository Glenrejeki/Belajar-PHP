<?php
session_start();

// Pastikan autoload dipanggil dari folder app/
require __DIR__ . '/app/Autoload.php';

use App\Services\Database;
use App\Repos\TaskRepository;
use App\Controllers\TaskController;

// Buat koneksi ke database PostgreSQL
$pdo = Database::pdo();

// Inisialisasi repositori & controller
$repo = new TaskRepository($pdo);
$ctl  = new TaskController($repo);

// Helper function global
function view(string $name, array $data = []): void {
  extract($data);
  $viewName = $name;
  include __DIR__ . '/views/layout.php';
}

function render_partial(string $name, array $data = []): void {
  extract($data);
  include __DIR__ . "/views/{$name}.php";
}

function redirect(string $path): void {
  header("Location: $path");
  exit;
}
