<?php
require '../service/database.php';
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
if (hapusproduct($_GET['id']) > 0) {
  echo "<script>
  alert('Product Berhasil Dihapus');
  document.location.href = '../index.php';
  </script>";
} else {
  echo "Product Gagal Dihapus";
};
