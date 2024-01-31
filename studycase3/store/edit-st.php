<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$store = query("SELECT * FROM tb_store WHERE id_store = '$id';");

if (isset($_POST['edit'])) {
  if (editstore($_POST) > 0) {
    echo "<script>
    alert('Toko Berhasil Diedit');
    document.location.href = '../index.php';
    </script>";
  } else {
    echo "<script> alert('Toko Gagal Diedit');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Edit Toko</title>
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
        <?php foreach ($store as $st) : ?>
          <ul>
            <li>
              <select required name='id_store'>
                <option value='<?= $st['id_store']; ?>' required selected><?= $st['id_store']; ?></option>
              </select>
            </li>
            <label>
              <input type="hidden" name="id_seller" value="<?= $st['id_seller']; ?>">
            </label>
            <li type="none">
              <select name='name_store'>
                <option <?php if ($st['name_store'] == 'Tokopedia') {
                          echo "selected";
                        } ?> value='Tokopedia'>Tokopedia</option>
                <option <?php if ($st['name_store'] == 'Shopee') {
                          echo "selected";
                        } ?> value='Shopee'>Shopee</option>
                <option <?php if ($st['name_store'] == 'Blibli') {
                          echo "selected";
                        } ?> value='Blibli'>Blibli</option>
                <option <?php if ($st['name_store'] == 'Bukalapak') {
                          echo "selected";
                        } ?> value='Bukalapak'>Bukalapak</option>
              </select>
            </li>
            <li type="none">
              <button type="submit" name="edit">Edit</button>
            </li>
          </ul>
        <?php endforeach ?>
      </form>
    </div>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>