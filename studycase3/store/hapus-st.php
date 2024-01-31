<?php
require '../service/database.php';
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
if (hapusstore($_GET['id']) > 0) {
  echo "<script>
  alert('Toko Berhasil Dihapus');
  document.location.href = '../index.php';
  </script>";
} else {
  echo "Toko Gagal Dihapus";
};
