<?php
include "service/database.php";
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}
$id = $_GET['id'];
$mahasiswa = query("SELECT aa.nim, aa.nama, bb.jurusan, aa.tanggal_lahir, aa.alamat, aa.gender, cc.mku, cc.sks_mku, dd.mkp, dd.sks_mkp
FROM mahasiswa aa
JOIN jurusan bb 
ON aa.jurusan = bb.id_jurusan
JOIN mata_kuliah_umum cc ON cc.id_mku = aa.mku
JOIN mata_kuliah_pilihan dd ON dd.id_mkp = aa.mkp WHERE nim = $id;");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
  <style>
    .ul {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "layout/header.html" ?>
  <?php foreach ($mahasiswa as $m) : ?>
    <div class="ul">
      <ul>
        <li>
          NIM : <?= $m['nim']; ?>
        </li>
        <li>
          Nama : <?= $m['nama']; ?>
        </li>
        <li>
          Jurusan : <?= $m['jurusan']; ?>
        </li>
        <li>
          Tanggal Lahir : <?= $m['tanggal_lahir']; ?>
        </li>
        <li>
          Alamat : <?= $m['alamat']; ?>
        </li>
        <li>
          Jenis Kelamin : <?php if ($m['gender'] == "L") {
                            echo "Laki-Laki";
                          } else {
                            echo "Perempuan";
                          }
                          ?>
        </li>
        <li>
          Mata Kuliah Umum : <?= $m['mku']; ?> (<?= $m['sks_mku']; ?> Sks)
        </li>
        <li>
          Mata Kuliah Pilihan : <?= $m['mkp']; ?> (<?= $m['sks_mkp']; ?> Sks)
        </li>
      </ul>
    </div>
    <a href="edit.php?id=<?= $m['nim'] ?>">Edit</a>
    <a href="hapus.php?id=<?= $m['nim'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
  <?php endforeach; ?>
  <?php include "layout/footer.html" ?>
</body>

</html>