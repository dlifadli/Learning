<?php
require '../service/database.php';
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$store = query("SELECT * FROM tb_store WHERE id_seller = '$id'");
if (count($store) == 0) {
  if (hapusseller($_GET['id']) > 0) {
    echo "<script>
  alert('Data Seller Berhasil Dihapus');
  document.location.href = '../index.php';
  </script>";
  }
} else {
  echo "<script>
  alert('Hapus Toko Atau Product Terlebih Dahulu');
  document.location.href = '../seller/detail.php?id=$id';
  </script>";
};
