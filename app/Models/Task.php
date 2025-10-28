<?php
namespace App\Models;

class Task {
  // Encapsulation: properti privat
  private ?int $id;
  private string $title;
  private bool $isDone;
  private string $createdAt;

  public function __construct(string $title, ?int $id=null, bool $isDone=false, ?string $createdAt=null) {
    $this->setTitle($title);        // validasi via setter
    $this->id = $id;
    $this->isDone = $isDone;
    $this->createdAt = $createdAt ?? date('c');
  }

  // Getter
  public function getId(): ?int { return $this->id; }
  public function getTitle(): string { return $this->title; }
  public function isDone(): bool { return $this->isDone; }
  public function getCreatedAt(): string { return $this->createdAt; }

  // Setter dengan validasi (encapsulation)
  public function setTitle(string $title): void {
    $clean = trim($title);
    if ($clean === '') throw new \InvalidArgumentException('Judul tidak boleh kosong');
    $this->title = $clean;
  }
  public function markDone(): void { $this->isDone = true; }
  public function markUndone(): void { $this->isDone = false; }
}
