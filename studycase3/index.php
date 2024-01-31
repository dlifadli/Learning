<?php
require "service/database.php";
$seller = query("SELECT * FROM tb_seller");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Sellers</title>
  <style>
    h1,
    main,
    .tambah,
    .form-cari {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <h1>Data Sellers</h1>
  <a href="seller/tambah.php" class="tambah">Tambah Seller</a>
  <main>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>#</th>
      </tr>
      <?php $no = 1;
      foreach ($seller as $sl) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $sl["name"]; ?></td>
          <td><?= $sl["address"]; ?></td>
          <td><?= $sl["email"]; ?></td>
          <td><input type="button" onclick="location.href='seller/detail.php?id=<?= $sl['id_seller']; ?>'" value="Lihat Detail"></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
  <?php include "layout/footer.html" ?>
</body>

</html>