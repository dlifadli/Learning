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
            <option value="6">IPS</option>
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
        <li>
          <label>
            <input type="radio" name="gender" value="L" required>Laki-Laki
          </label>
          <label>
            <input type="radio" name="gender" value="P" required>Perempuan
          </label>
        </li>
        <li>
          <label for="mku1">Mata Kuliah Umum 1 :</label>
          <select required name="mku1" id="mku1">
            <option value="1">Matematika (3 Sks)</option>
            <option value="2">Agama (3 Sks)</option>
            <option value="3">Pancasila (4 Sks)</option>
          </select>
        </li>
        <li>
          <label for="mku2">Mata Kuliah Umum 2 :</label>
          <select required name="mku2" id="mku2">
            <option value="1">Fisika (3 Sks)</option>
            <option value="2">Bahasa Indonesia (3 Sks)</option>
            <option value="3">Public Speaking (4 Sks)</option>
          </select>
        </li>
        <li>
          <label for="mku3">Mata Kuliah Umum 3 :</label>
          <select required name="mku3" id="mku3">
            <option value="1">Bahasa Inggris (3 Sks)</option>
            <option value="2">Bahasa Arab (3 Sks)</option>
            <option value="3">Bahasa Mandarin (4 Sks)</option>
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