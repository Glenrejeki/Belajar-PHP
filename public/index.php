<?php
require __DIR__ . '/../bootstrap.php';

$action = $_GET['action'] ?? 'index';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

switch ($action) {
  case 'index':  $ctl->index(); break;
  case 'create': $ctl->createForm(); break;
  case 'store':  if ($_SERVER['REQUEST_METHOD']==='POST') $ctl->store(); else http_response_code(405); break;
  case 'toggle': if ($_SERVER['REQUEST_METHOD']==='POST') $ctl->toggle($id); else http_response_code(405); break;
  case 'delete': if ($_SERVER['REQUEST_METHOD']==='POST') $ctl->destroy($id); else http_response_code(405); break;
  default: http_response_code(404); echo 'Route not found';
}
