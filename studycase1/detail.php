<?php
require "functions.php";

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari URL
$id = $_GET["id"];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE nim = '$id'");
$n = query("SELECT * FROM nilai WHERE nim = '$id'");
$mk = query("SELECT * FROM matkul WHERE nim = '$id'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
  <style>
    .h1-cari,
    .container {
      display: flex;
      justify-content: center;
      align-self: center;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
  </style>
</head>

<body>
  <h1 class="h1-cari">Detail Mahasiswa</h1>
  <div class="container">
    <ul>
      <li type="none"><img src="img/<?= $m['gambar']; ?>" width="180"></li>
      <li>NIM : <?= $m['nim']; ?></li>
      <li>Nama : <?= $m['nama']; ?></li>
      <li>Tanggal Lahir : <?= $m['tanggal_lahir']; ?></li>
      <li>Alamat : <?= $m['alamat']; ?></li>
      <li>Jenis Kelamin : <?php if ($m['gender'] == "L") {
                            echo "Laki-laki";
                          } else {
                            echo "Perempuan";
                          } ?></li>
      <li>UTS : <?= $n['uts']; ?> | UAS : <?= $n['uas']; ?></li>
      <li>Mata Kuliah : <?= $mk['nama_matkul']; ?></li>
      <li>Semester : <?= $mk['semester']; ?> | Jumlah Sks : <?= $mk['jumlah_sks']; ?></li>
      <li>Urutan Mata Kuliah ke-<?= $mk['urutan_matkul']; ?></li>
      <!-- <li><a href="ubah.php?id=<?= $m['nim']; ?>">Ubah</a></li> -->
      <li><a href="hapus.php?id=<?= $m['nim']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');">Hapus</a></li>
      <li><a href="index.php">Kembali</a></li>
    </ul>
  </div>
</body>

</html>