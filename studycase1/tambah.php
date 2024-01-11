<?php
require 'functions.php';



// cek apakah tombol tambah sudah ditekan?
if (isset($_POST["tambah"])) {
  if (tambah($_POST) > 0) {
    echo "<script>
    alert('Data Berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Data Mahasiswa</title>
  <style>
    .h2,
    .form-tambah {
      display: flex;
      justify-content: center;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
  </style>
</head>

<body>
  <h2 class="h2">Form Tambah Data Mahasiswa</h2>
  <form action="" method="post" enctype="multipart/form-data" class="form-tambah">
    <table border="0" cellspacing="0" cellpadding="5">
      <ul>
        <tr>
          <td>
            <li>
              <label>NIM :
                <input type="text" name="nim" required autofocus placeholder="Addmmyy0001">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Nama :
                <input type="text" name="nama" autofocus required placeholder="Budi">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Tanggal Lahir :
                <input type="text" name="tanggal_lahir" required placeholder="year-month-day">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Alamat :
                <input type="text" name="alamat" required placeholder="Domisili">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Jenis Kelamin :
                <input type="text" name="gender" size="1" required placeholder="L/P">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Mata Kuliah :
                <input type="text" name="nama_matkul" required placeholder="Hukum">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Semester :
                <input type="text" name="semester" required placeholder="1">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Urutan Mata Kuliah :
                <input type="text" name="urutan_matkul" required placeholder="1">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Jumlah SKS :
                <input type="text" name="jumlah_sks" required placeholder="2">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Nilai UAS :
                <input type="text" name="uas" required placeholder="100">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td>
            <li>
              <label>Nilai UTS :
                <input type="text" name="uts" required placeholder="100">
              </label>
            </li>
          </td>
        </tr>
        <tr>
          <td align="center">
            <li>
              <label>Gambar :
                <input type="file" name="gambar" class="gambar" onchange="previewImage()">
              </label>
              <img src="img/nophoto.jpg" width="110" style="display: block;" class="img-preview">
            </li>
          </td>
        </tr>
        <tr>
          <td align="center">
            <li type="none">
              <button type="submit" name="tambah">Tambah Data!</button>
            </li>
          </td>
        </tr>
        <tr>
          <td align="center">
            <li type="none">
              <a href="index.php">Kembali</a>
            </li>
          </td>
        </tr>
      </ul>
    </table>
  </form>
  <script src="js/script.js"></script>
</body>

</html>