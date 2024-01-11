<?php
require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahasiswa Universitas X</title>
  <style>
    .form-cari,
    .h1-cari,
    .container,
    .tambah {
      display: flex;
      justify-content: center;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
  </style>
</head>

<body>
  <h1 class="h1-cari">Data Mahasiswa Universitas X</h1>
  <a href="tambah.php" class="tambah" style=" font-style: italic;">Tambahkan Data Mahasiswa</a>
  <form action="" method="post" class="form-cari">
    <input type="text" name="keyword" size="60" placeholder="Masukan NIM / Nama" autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari!</button>
  </form>
  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan=" 4">
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
  </div>

  <script src="js/script.js"></script>
</body>

</html>