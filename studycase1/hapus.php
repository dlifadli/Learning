<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// mengambil id dari url
$id = $_GET['id'];
if (hapus($_GET['id']) > 0) {
  echo "<script>
  alert('Data Berhasil dihapus');
  document.location.href = 'index.php';
  </script>";
} else {
  echo "data gagal dihapus!";
};
