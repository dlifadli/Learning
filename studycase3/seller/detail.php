<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];

$linkstore = query("SELECT * FROM tb_store WHERE id_seller = $id;");
$seller = query("SELECT * FROM tb_seller WHERE id_seller = $id;");
$storedanproduct = query("SELECT st.name_store, GROUP_CONCAT(DISTINCT tp.name_product SEPARATOR ', ') AS name_product
FROM tb_store sl
JOIN tb_store st ON sl.id_seller = st.id_seller
JOIN tb_store_product stp ON st.id_store = stp.id_store
JOIN tb_product tp ON stp.name_product = tp.name_product
WHERE sl.id_seller = $id
GROUP BY sl.id_seller, st.id_store;");
if (isset($storedanproduct)) {
  if (isset($storedanproduct[0])) {
    if (in_array(true, $storedanproduct[0])) {
      $st1 = $storedanproduct[0] ?? false;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Seller</title>
  <style>
    .ul,
    .option {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "../layout/header.html" ?>
  <main>
    <?php foreach ($seller as $sl) : ?>
      <div class="ul">
        <ul>
          <li>
            Nama : <?= $sl['name']; ?>
          </li>
          <li>
            Jenis Kelamin : <?php if ($sl['gender'] == 'L') {
                              echo "Laki-Laki";
                            } else {
                              echo "Perempuan";
                            } ?>
          </li>
          <li>
            Alamat : <?= $sl['address']; ?>
          </li>
          <li>
            Tanggal Lahir : <?= $sl['date_of_birth']; ?>
          </li>
          <li>
            Nomor Telepon : <?= $sl['phone']; ?>
          </li>
          <li>
            Email : <?= $sl['email']; ?>
          </li>
          <?php foreach ($storedanproduct as $st) : ?>
            <li>
              <?= $st['name_store']; ?> :
            </li>
            <?= $st['name_product']; ?>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endforeach ?>
    <a href="../store/tambah-input-st.php?id=<?= $sl['id_seller'] ?>">Tambah Toko</a>
    <?php if (in_array(true, $linkstore)) {
      echo "<a href='../store/edit-pilih-kode-st.php?id=$id'>Edit Toko</a>";
      echo "<a href='../product/tambah-pilih-kode-pd.php?id=$id'>Tambah Product</a>";
      echo "<a href='../product/edit-pilih-kode-store-pd.php?id=$id'>Edit Product</a>";
      echo "<a href='../product/hapus-pilih-kode-store-pd.php?id=$id'>Hapus Product</a>";
    } ?>
    <a href="edit.php?id=<?= $sl['id_seller'] ?>">Edit Seller</a>
    <?php if (isset($st1['name_product'])) {
    } else {
      echo "<a href='../store/hapus-pilih-kode-st.php?id=$id'>Hapus Toko</a>";
    } ?>
    <a href="hapus.php?id=<?= $sl['id_seller'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus Seller</a>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>