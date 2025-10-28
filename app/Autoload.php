<?php
spl_autoload_register(function ($class) {
  $prefix  = 'App\\';
  $baseDir = __DIR__ . '/';   // <== ke folder "app"
  $len = strlen($prefix);

  if (strncmp($prefix, $class, $len) !== 0) return;

  $relative = substr($class, $len);
  $file = $baseDir . str_replace('\\', '/', $relative) . '.php';

  if (file_exists($file)) {
    require $file;
  } else {
    error_log("Autoload gagal: $file tidak ditemukan");
  }
});
