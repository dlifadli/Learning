<?php
include "service/database.php";
if (isset($_POST["tambah"])) {
  if (tambah($_POST) > 0) {
    echo "<script>
    alert('Data Berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Gagal ditambahkan');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Data Mahasiswa Z</title>
  <style>
    .form {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "layout/header.html" ?>
  <div class="form">
    <form action="" method="POST" enctype="multipart/form-data">
      <ul>
        <li>
          <label>
            NIM :
            <input type="text" name="nim" required autofocus placeholder="Ex: 301224001">
          </label>
        </li>
        <li>
          <label>
            Nama :
            <input type="text" name="nama" required placeholder="Ex: Budy">
          </label>
        </li>
        <li>
          <label for="jurusan">
            Jurusan :
          </label>
          <select required name="jurusan" id="jurusan">
            <option value="1">Kedokteran</option>
            <option value="2">Farmasi</option>
            <option value="3">Matematika</option>
            <option value="4">Fisika</option>
            <option value="5">Kimia</option>
          </select>
        </li>
        <li>
          <label>
            Tanggal Lahir :
            <input type="text" name="tanggal_lahir" required placeholder="Ex: 2000-12-31">
          </label>
        </li>
        <li>
          <label>
            Alamat :
            <input type="text" name="alamat" required placeholder="Ex: Depok">
          </label>
        </li>
        <label for="gender">
          Jenis Kelamin :
        </label>
        <select required name="gender" id="gender">
          <option value="L">Laki-Laki</option>
          <option value="P" selected>Perempuan</option>
        </select>
        <li>
          <label for="mku">Mata Kuliah Umum :</label>
          <select required name="mku" id="mku">
            <option value="1">Pendidikan Pancasila (3 Sks)</option>
            <option value="2" selected>Agama (3 Sks)</option>
            <option value="3">Bahasa Indonesia (3 Sks)</option>
            <option value="4">Belajar Dan Pembelajaran (3 Sks)</option>
          </select>
        </li>
        <li>
          <label for="mkp">Mata Kuliah Pilihan :</label>
          <select required name="mkp" id="mkp">
            <option value="1">IPS (4 Sks)</option>
            <option value="2">MIPA (4 Sks)</option>
            <option value="3">Bahasa Dan Budaya (3 Sks)</option>
            <option value="4">Karya Dan Kreatif (3 Sks)</option>
          </select>
        </li>
        <button type="submit" name="tambah">Tambah Data</button>
      </ul>
    </form>
  </div>
  <?php include "layout/footer.html" ?>
</body>

</html>