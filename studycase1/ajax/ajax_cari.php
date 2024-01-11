<?php
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);
?>
<table border="1" cellpadding="10" cellspacing="0">
  <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan="4">
        <p style="color: red; font-style: italic;">data mahasiswa tidak ditemukan!</p>
      </td>
    </tr>
  <?php endif; ?>
  <?php $i = 1;
  foreach ($mahasiswa as $m) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $m["gambar"]; ?>" width="100"></td>
      <td><?= $m["nama"]; ?></td>
      <td> <a href="detail.php?id=<?= $m["nim"]; ?>">Lihat Detail</a> </td>
    </tr>
  <?php endforeach; ?>
</table>