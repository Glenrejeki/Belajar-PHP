<?php

    $file = __DIR__ .'data.json';
    if(!file_exists($file)){
        file_put_contents($file, "[]");
    }
    $mahasiswa = json_decode(file_get_contents('data.json'), true) ?? [];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <a href="tambah.php">Tambah</a>
    <ul>
        <?php foreach ($mahasiswa as $m) : ?>
            <li> <?= htmlspecialchars($m ['nama']) ?> (<?= htmlspecialchars($m['nim']) ?> </li>
            
            <?php endforeach; ?>
    </ul>
</body>
</html>