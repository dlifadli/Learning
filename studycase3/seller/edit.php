<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$seller = query("SELECT * FROM tb_seller WHERE id_seller='$id';");

if (isset($_POST['edit'])) {
  if (editseller($_POST) > 0) {
    echo "<script>
    alert('Data Seller Berhasil Diedit');
    document.location.href = 'detail.php?id=$id';
    </script>";
  } else {
    echo "<script> alert('Data Seller Gagal Diedit');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Edit Seller</title>
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
      <form action="" method="post" enctype="multipart/form-data">
        <?php foreach ($seller as $sl) : ?>
          <ul>
            <label>
              <input type="hidden" name="id_seller" value="<?= $sl['id_seller']; ?>">
            </label>
            <li>
              <label>
                Nama :
                <input type="text" name="name" value="<?= $sl['name']; ?>" required>
              </label>
            </li>
            <li>
              <label>
                <input type="radio" <?php if ($sl['gender'] == 'L') {
                                      echo "checked";
                                    } ?> name="gender" value="L" required>Laki-Laki
              </label>
              <label>
                <input type="radio" <?php if ($sl['gender'] == 'P') {
                                      echo "checked";
                                    } ?> name="gender" value="P" required>Perempuan
              </label>
            </li>
            <li>
              <label>
                Alamat :
                <input type="text" name="address" value="<?= $sl['address']; ?>" required>
              </label>
            </li>
            <li>
              <label>
                Tanggal Lahir :
                <input type="text" name="date_of_birth" value="<?= $sl['date_of_birth']; ?>" required>
              </label>
            </li>
            <li>
              <label>
                Nomor Telepon :
                <input type="text" name="phone" value="<?= $sl['phone']; ?>" required>
              </label>
            </li>
            <li>
              <label>
                Email :
                <input type="text" name="email" value="<?= $sl['email']; ?>" required>
              </label>
            </li>
          <?php endforeach; ?>
          <li type="none">
            <button type="submit" name="edit">Edit</button> | <input type="button" value="Back" onclick="location.href='detail.php?id=<?= $sl['id_seller']; ?>'">
          </li>
          </ul>
      </form>
    </div>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>