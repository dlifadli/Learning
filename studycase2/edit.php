<?php
include "service/database.php";
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}
$id = $_GET['id'];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE nim='$id';");

if (isset($_POST['edit'])) {
  if (edit($_POST) > 0) {
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
  <title>Form Edit Data Mahasiswa</title>
  <style>
    .form {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "layout/header.html";
  foreach ($mahasiswa as $m) :
  ?>
    <div class="form">
      <form action="" method="post" enctype="multipart/form-data">
        <ul>
          <label>
            <input type="hidden" name="nim" value="<?= $m['nim']; ?>">
          </label>
          <li>
            <label>
              Nama :
              <input type="text" name="nama" required value="<?= $m['nama']; ?>">
            </label>
          </li>
          <li>
            <label for="jurusan">
              Jurusan :
            </label>
            <select name="jurusan" id="jurusan" required>
              <option <?php if ($m['jurusan'] == 1) {
                        echo "selected";
                      } ?> value="1">Kedokteran</option>
              <option <?php if ($m['jurusan'] == 2) {
                        echo "selected";
                      } ?> value="2">Farmasi</option>
              <option <?php if ($m['jurusan'] == 3) {
                        echo "selected";
                      } ?> value="3">Matematika</option>
              <option <?php if ($m['jurusan'] == 4) {
                        echo "selected";
                      } ?> value="4">Fisika</option>
              <option <?php if ($m['jurusan'] == 5) {
                        echo "selected";
                      } ?> value="5">Kimia</option>
            </select>
          </li>
          <li>
            <label>
              Tanggal Lahir :
              <input type="text" name="tanggal_lahir" required value="<?= $m['tanggal_lahir']; ?>" size="7">
            </label>
          </li>
          <li>
            <label>
              Alamat :
              <input type="text" name="alamat" required value="<?= $m['alamat']; ?>">
            </label>
          </li>
          <li>
            <label>
              <input type="radio" <?php if ($m['gender'] == 'L') {
                                    echo "checked";
                                  } ?> name="gender" value="L" required>Laki-Laki
            </label>
            <label>
              <input type="radio" <?php if ($m['gender'] == 'P') {
                                    echo "checked";
                                  } ?> name="gender" value="P" required>Perempuan
            </label>
          </li>
          <li>
            <label for="mku1">Mata Kuliah Umum 1 :</label>
            <select required name="mku1" id="mku1">
              <option <?php if ($m['mku1'] == 1) {
                        echo "selected";
                      } ?> value="1">Matematika (3 Sks)</option>
              <option <?php if ($m['mku1'] == 2) {
                        echo "selected";
                      } ?> value="2">Agama (3 Sks)</option>
              <option <?php if ($m['mku1'] == 3) {
                        echo "selected";
                      } ?> value="3">Pancasila (4 Sks)</option>
            </select>
          </li>
          <li>
            <label for="mku2">Mata Kuliah Umum 2 :</label>
            <select required name="mku2" id="mku2">
              <option <?php if ($m['mku2'] == 1) {
                        echo "selected";
                      } ?> value="1">Fisika (3 Sks)</option>
              <option <?php if ($m['mku2'] == 2) {
                        echo "selected";
                      } ?> value="2">Bahasa indonesia (3 Sks)</option>
              <option <?php if ($m['mku2'] == 3) {
                        echo "selected";
                      } ?> value="3">Public Speaking (4 Sks)</option>
            </select>
          </li>
          <li>
            <label for="mku3">Mata Kuliah Umum 3 :</label>
            <select required name="mku3" id="mku3">
              <option <?php if ($m['mku3'] == 1) {
                        echo "selected";
                      } ?> value="1">Bahasa Inggris (3 Sks)</option>
              <option <?php if ($m['mku3'] == 2) {
                        echo "selected";
                      } ?> value="2">Bahasa Arab (3 Sks)</option>
              <option <?php if ($m['mku3'] == 3) {
                        echo "selected";
                      } ?> value="3">Bahasa Mandarin (4 Sks)</option>
            </select>
          </li>
          <li>
            <label for="mkp">Mata Kuliah Pilihan :</label>
            <select required name="mkp" id="mkp">
              <option <?php if ($m['mkp'] == 1) {
                        echo "selected";
                      } ?> value="1">IPS (4 Sks)</option>
              <option <?php if ($m['mkp'] == 2) {
                        echo "selected";
                      } ?> value="2">MIPA (4 Sks)</option>
              <option <?php if ($m['mkp'] == 3) {
                        echo "selected";
                      } ?> value="3">Bahasa Dan Budaya (3 Sks)</option>
              <option <?php if ($m['mkp'] == 4) {
                        echo "selected";
                      } ?> value="4">Karya Kreatif (4 Sks)</option>
            </select>
          </li>
          <li type="none">
            <button type="submit" name="edit">Edit Data!</button>
          </li>
        </ul>

        <a href="detail.php?id=<?= $m['nim']; ?>">Back</a>
      </form>
    </div>
  <?php endforeach;
  // endforeach;
  include "layout/footer.html"; ?>
</body>

</html>