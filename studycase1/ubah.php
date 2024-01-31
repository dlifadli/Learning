<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa WHERE nim = '$id'");
// var_dump($mahasiswa);
// die();
$mk = query("SELECT * FROM matkul WHERE nim = '$id'");
$n = query("SELECT * FROM nilai WHERE nim = '$id'");

// cek apakah tombol ubah sudah ditekan?
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('Data Berhasil diubah');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script> alert('data gagal diubah');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Ubah Data Mahasiswa</title>
  <style>
    .form-ubah,
    .h2 {
      display: flex;
      justify-content: center;
      align-self: center;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
  </style>
</head>

<body>
  <h2 class="h2">Form Ubah Data Mahasiswa</h2>
  <form action="" method="post" enctype="multipart/form-data" class="form-ubah">
    <table border="0" cellspacing="0" cellpadding="5">
      <ul>
        <?php foreach ($mahasiswa as $m) : ?>
          <tr>
            <td>
              <label>
                <input type="hidden" name="idd" value="<?= $m['id']; ?>">
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label>
                <input type="hidden" name="nim" value="<?= $m['nim']; ?>">
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <li>
                <label>Nama :
                  <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
                </label>
              </li>
            </td>
          </tr>
          <tr>
            <td>
              <li>
                <label>Tanggal Lahir :
                  <input type="text" size="7" name="tanggal_lahir" required value="<?= $m['tanggal_lahir']; ?>">
                </label>
              </li>
            </td>
          </tr>
          <tr>
            <td>
              <li>
                <label>Alamat :
                  <input type="text" name="alamat" required value="<?= $m['alamat']; ?>">
                </label>
              </li>
            </td>
          </tr>
          <tr>
            <td>
              <li>
                <label>Jenis Kelamin :
                  <input type="text" name="gender" size="1" required value="<?= $m['gender']; ?>">
                </label>
              </li>
            </td>
          </tr>
        <?php endforeach ?>
        <tr>
          <td>
            <li>
              <label>Mata Kuliah :
                <input type="text" name="nama_matkul" required value="<?= $mk['nama_matkul']; ?>">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Semester :
                <input type="text" name="semester" size="1" required value="<?= $mk['semester']; ?>">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Urutan Mata Kuliah :
                <input type="text" name="urutan_matkul" size="1" required value="<?= $mk['urutan_matkul']; ?>">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Jumlah SKS :
                <input type="text" name="jumlah_sks" size="1" required value="<?= $mk['jumlah_sks']; ?>">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Nilai UTS :
                <input type="text" name="uts" size="1" required value="<?= $n['uts']; ?>">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Nilai UAS :
                <input type="text" name="uas" required value="<?= $n['uas']; ?>">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td align="center">
            <li>
              <input type="hidden" name="gambar_lama" value="<?= $m['gambar']; ?>">
              <label>Gambar :
                <input type="file" name="gambar" class="gambar" onchange="previewImage()">
              </label>
              <img src="img/<?= $m['gambar']; ?>" width="110" style="display: block;" class="img-preview">
            </li>
          </td>
        </tr>
        <tr>
          <td align="center">
            <li type="none">
              <button type="submit" name="ubah">Ubah Data!</button>
            </li>
          </td>
        </tr>
        <tr>
          <td align="center">
            <li type="none">
              <a href="detail.php?id=<?= $m['nim']; ?>">Kembali</a>
            </li>
          </td>
        </tr>
      </ul>
    </table>
  </form>
  <script src="js/script.js"></script>
</body>

</html>