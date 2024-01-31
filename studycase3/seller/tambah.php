<?php
require "../service/database.php";
if (isset($_POST["tambah"])) {
  if (tambahseller($_POST) > 0) {
    echo "<script>
    alert('Data Seller Berhasil Ditambahkan');
    document.location.href = '../index.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Seller Gagal Ditambahkan');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Seller</title>
  <style>
    .form {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "../layout/header.html" ?>
  <main>
    <div class="form">
      <form action="" method="POST" enctype="multipart/form-data">
        <ul>
          <li>
            <label>
              Nama :
              <input type="text" name="name" required placeholder="Ex: Budy">
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
            <label>
              Alamat :
              <input type="text" name="address" required placeholder="Ex: Depok">
            </label>
          </li>
          <li>
            <label>
              Tanggal Lahir :
              <input type="text" name="date_of_birth" required placeholder="Ex: 2000-12-31">
            </label>
          </li>
          <li>
            <label>
              Nomor Telepon :
              <input type="text" name="phone" required placeholder="Ex: 0819999999">
            </label>
          </li>
          <li>
            <label>
              Email :
              <input type="text" name="email" required placeholder="Ex: budy@gmail.com">
            </label>
          </li>
          <button type="submit" name="tambah">Tambah Seller</button>
        </ul>
      </form>
    </div>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>