<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$gene = $_POST['gene'];

if (isset($_POST["tambah"])) {
  if (tambahproduct($_POST) > 0) {
    echo "<script>
    alert('Product Berhasil Ditambahkan');
    document.location.href = '../index.php';
    </script>";
  } else {
    echo "<script>
    alert('Product Gagal ditambahkan');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Product</title>
  <style>
    .entry,
    .button {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "../layout/header.html" ?>
  <main>
    <form method="post" action="" enctype="multipart/form-data">
      <table class="entry">
        <tr bgcolor="#eee">
          <th width="50">Id Toko</th>
          <th width="100">Nama Product</th>

          <?php for ($i = 1; $i <= $gene; $i++) {
            echo "<tr>
            <td><select required name='id_store[]'>
            <option value='$id' required selected>$id</option></select></td>
            <td><select required name='name_product[]'>
            <option value='Pasta Gigi Pepsodent'>Pasta Gigi Pepsodent</option>
            <option value='Shampoo Zinc'>Shampoo Zinc</option>
            <option value='Sabun Mandi Lifeboy'>Sabun Mandi Lifeboy</option>
            <option value='Sabun Muka Khaf'>Sabun Muka Khaf</option>
            <option value='Rokok ESSE Berry Pop'>Rokok ESSE Berry Pop</option>
            <option value='Rokok ESSE Honey Pop'>Rokok ESSE Honey Pop</option>
            <option value='Rokok Juara Kretek Jambu'>Rokok Juara Kretek Jambu</option>
            <option value='Rokok Juara Kretek Teh'>Rokok Juara Kretek Teh</option>
            <option value='Rokok Gudang Garam Filter'>Rokok Gudang Garam Filter</option>
            <option value='Rokok Gudang Garam Surya'>Rokok Gudang Garam Surya</option>
            <option value='Rokok Gudang Garam Signature'>Rokok Gudang Garam Signature</option>
            <option value='Rokok Dji Sam Soe'>Rokok Dji Sam Soe</option>
          </select></td>
            </tr>";
          }
          ?>
      </table>
      <div class="button">
        <input type="hidden" name="gene" value="<?= $gene; ?>">
        <input type="submit" name="tambah" value="Tambah">
        <input type="button" value="Back" onclick="location.href='tambah-input-pd.php?id=<?= $id; ?>';">
      </div>

    </form>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>