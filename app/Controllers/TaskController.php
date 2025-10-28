<?php
namespace App\Controllers;
use App\Repos\TaskRepository;
use App\Models\Task;

class TaskController {
  public function __construct(private TaskRepository $repo) {}

  public function index(): void {
    $tasks = $this->repo->all();
    view('tasks_index', compact('tasks'));
  }
  public function createForm(): void { view('tasks_form'); }
  public function store(): void {
    $title = $_POST['title'] ?? '';
    try {
      $id = $this->repo->create(new Task($title));
      redirect('/'); // ke index
    } catch (\Throwable $e) {
      $_SESSION['err'] = $e->getMessage();
      redirect('/?action=create');
    }
  }
  public function toggle(int $id): void {
    $done = isset($_POST['done']) && $_POST['done'] === '1';
    $this->repo->toggleDone($id, $done);
    redirect('/');
  }
  public function destroy(int $id): void {
    $this->repo->delete($id);
    redirect('/');
  }
}
