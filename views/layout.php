<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Task Manager</title>
  <style>
    body{font-family:system-ui;max-width:760px;margin:32px auto}
    .err{background:#fee;border:1px solid #f99;padding:8px;margin-bottom:12px}
    form.inline{display:inline}
    li.done{opacity:.6;text-decoration:line-through}
  </style>
</head>
<body>
  <h1><a href="/">Task Manager</a></h1>
  <?php if (!empty($_SESSION['err'])): ?>
    <div class="err"><?= htmlspecialchars($_SESSION['err']); unset($_SESSION['err']); ?></div>
  <?php endif; ?>
  <?php render_partial($viewName ?? ''); ?>
</body>
</html>
