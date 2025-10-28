<p><a href="/?action=create">+ Task Baru</a></p>
<ul>
  <?php foreach ($tasks as $t): ?>
    <li class="<?= $t['is_done'] ? 'done' : '' ?>">
      <?= htmlspecialchars($t['title']) ?>
      <small>(<?= htmlspecialchars($t['created_at']) ?>)</small>

      <form class="inline" method="post" action="/?action=toggle&id=<?= $t['id'] ?>">
        <input type="hidden" name="done" value="<?= $t['is_done'] ? '0' : '1' ?>">
        <button type="submit"><?= $t['is_done'] ? 'Un-Done' : 'Done' ?></button>
      </form>

      <form class="inline" method="post" action="/?action=delete&id=<?= $t['id'] ?>">
        <button type="submit" onclick="return confirm('Hapus task ini?')">Hapus</button>
      </form>
    </li>
  <?php endforeach; ?>
</ul>

<?php if (empty($tasks)): ?>
  <p><em>Belum ada task. Tambah satu yuk.</em></p>
<?php endif; ?>
