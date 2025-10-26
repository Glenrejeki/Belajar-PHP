<?php
    $nama = $_POST['nama']?? 'Anonim';
    echo "<h1>Halo, ".htmlspecialchars($nama)."!</h1>";
?>