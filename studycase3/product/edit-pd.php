<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$product = query("SELECT * FROM tb_store_product WHERE id_store_product = '$id';");

if (isset($_POST['edit'])) {
  if (editproduct($_POST) > 0) {
    echo "<script>
    alert('Product Berhasil Diedit');
    document.location.href = '../index.php';
    </script>";
  } else {
    echo "<script> alert('Product Gagal Diedit');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Edit Product</title>
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
        <?php foreach ($product as $pd) : ?>
          <ul>
            <li>
              <select required name='id_store_product'>
                <option value='<?= $pd['id_store_product']; ?>' required selected><?= $pd['id_store_product']; ?></option>
              </select>
            </li>
            <label>
              <input type="hidden" name="id_store" value="<?= $pd['id_store']; ?>">
            </label>
            <li type="none">
              <select name='name_product'>
                <option <?php if ($pd['name_product'] == 'Pasta Gigi Pepsodent') {
                          echo "selected";
                        } ?> value='Pasta Gigi Pepsodent'>Pasta Gigi Pepsodent</option>
                <option <?php if ($pd['name_product'] == 'Shampoo Zinc') {
                          echo "selected";
                        } ?> value='Shampoo Zinc'>Shampoo Zinc</option>
                <option <?php if ($pd['name_product'] == 'Sabun Mandi Lifeboy') {
                          echo "selected";
                        } ?> value='Sabun Mandi Lifeboy'>Sabun Mandi Lifeboy</option>
                <option <?php if ($pd['name_product'] == 'Sabun Muka Khaf') {
                          echo "selected";
                        } ?> value='Sabun Muka Khaf'>Sabun Muka Khaf</option>
                <option <?php if ($pd['name_product'] == 'Rokok ESSE Berry Pop') {
                          echo "selected";
                        } ?> value='Rokok ESSE Berry Pop'>Rokok ESSE Berry Pop</option>
                <option <?php if ($pd['name_product'] == 'Rokok ESSE Honey Pop') {
                          echo "selected";
                        } ?> value='Rokok ESSE Honey Pop'>Rokok ESSE Honey Pop</option>
                <option <?php if ($pd['name_product'] == 'Rokok Juara Kretek Jambu') {
                          echo "selected";
                        } ?> value='Rokok Juara Kretek Jambu'>Rokok Juara Kretek Jambu</option>
                <option <?php if ($pd['name_product'] == 'Rokok Juara Kretek Teh') {
                          echo "selected";
                        } ?> value='Rokok Juara Kretek Teh'>Rokok Juara Kretek Teh</option>
                <option <?php if ($pd['name_product'] == 'Rokok Gudang Garam Filter') {
                          echo "selected";
                        } ?> value='Rokok Gudang Garam Filter'>Rokok Gudang Garam Filter</option>
                <option <?php if ($pd['name_product'] == 'Rokok Gudang Garam Surya') {
                          echo "selected";
                        } ?> value='Rokok Gudang Garam Surya'>Rokok Gudang Garam Surya</option>
                <option <?php if ($pd['name_product'] == 'Rokok Gudang Garam Signature') {
                          echo "selected";
                        } ?> value='Rokok Gudang Garam Signature'>Rokok Gudang Garam Signature</option>
                <option <?php if ($pd['name_product'] == 'Rokok Dji Sam Soe') {
                          echo "selected";
                        } ?> value='Rokok Dji Sam Soe'>Rokok Dji Sam Soe</option>
              </select>
            </li>
          <?php endforeach ?>
          <li type="none">
            <button type="submit" name="edit">Edit</button>
          </li>
          </ul>
      </form>
    </div>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>