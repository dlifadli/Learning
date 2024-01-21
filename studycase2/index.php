<?php
include "service/database.php";
$mahasiswa = query("SELECT 
aa.nim, aa.nama, bb.jurusan
      FROM mahasiswa aa
      JOIN jurusan bb ON bb.id_jurusan = aa.jurusan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa Universitas Z</title>
  <style>
    main,
    .tambah,
    .form-cari {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "layout/header.html" ?>

  <form action="" method="post" class="form-cari">
    <input type="text" name="keyword" size="60" placeholder="Masukan NIM / Nama" autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari!</button>
  </form>
  <a href="tambah.php" class="tambah" style=" font-style: italic;">Tambahkan Data Mahasiswa</a>
  <main>
    <div class="container">
      <table border="1" cellpadding="10" cellspacing="0">
        <tr>
          <th>No.</th>
          <th>Nim</th>
          <th>Nama</th>
          <th>Jurusan</th>
          <th>#</th>
        </tr>
        <?php $no = 1;
        foreach ($mahasiswa as $m) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $m["nim"]; ?></td>
            <td><?= $m["nama"]; ?></td>
            <td><?= $m["jurusan"]; ?></td>
            <td> <a href="detail.php?id=<?= $m["nim"]; ?>">Lihat Detail</a> </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <script src="js/script.js"></script>
  </main>
  <?php include "layout/footer.html" ?>
</body>

</html>