<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit; }

$nama = trim($_POST['nama'] ?? '');
$nim  = trim($_POST['nim']  ?? '');
if ($nama === '' || $nim === '') { exit('Nama & NIM wajib diisi'); }

$file = __DIR__ . '/data.json';                 // <-- sama dengan index.php
if (!file_exists($file)) { file_put_contents($file, "[]"); }

$data = json_decode(file_get_contents($file), true) ?: [];
$data[] = ["nama" => $nama, "nim" => $nim];

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
header('Location: index.php');  // balik ke daftar
exit;
