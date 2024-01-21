<?php
include "../service/database.php";
$mahasiswa = cari($_GET['keyword']);
?>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>No.</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Jurusan</th>
    <th>#</th>
  </tr>
  <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan="5">
        <p style="color: red; font-style: italic; text-align: center;">data mahasiswa tidak ditemukan!</p>
      </td>
    </tr>
  <?php endif; ?>
  <?php $no = 1;
  foreach ($mahasiswa as $m) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $m['nim']; ?></td>
      <td><?= $m['nama']; ?></td>
      <td><?= $m['jurusan']; ?></td>
      <td> <a href="detail.php?id=<?= $m['nim']; ?>">Lihat Detail</a> </td>
    </tr>
  <?php endforeach; ?>
</table>