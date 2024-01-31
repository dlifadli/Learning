<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$gene = $_POST['gene'];

if (isset($_POST["tambah"])) {
  if (tambahstore($_POST) > 0) {
    echo "<script>
    alert('Toko Berhasil Ditambahkan');
    document.location.href = '../product/tambah-pilih-kode-pd.php?id=$id';
    </script>";
  } else {
    echo "<script>
    alert('Toko Gagal Ditambahkan');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Toko</title>
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
          <th>No.</th>
          <th width="50">Nama Toko</th>

          <?php for ($i = 1; $i <= $gene; $i++) {
            echo "<tr>
            <td>$i.</td>
            <td><select required name='name_store[]'>
            <option value='Tokopedia'>Tokopedia</option>
            <option value='Shopee'>Shopee</option>
            <option value='Blibli'>Blibli</option>
            <option value='Bukalapak'>Bukalapak</option>
          </select></td>
          <td><input type='hidden' name='id_seller[]' value='$id'</td>
            </tr>";
          }
          ?>
      </table>
      <div class="button">

        <input type="hidden" name="gene" value="<?= $gene; ?>">
        <input type="submit" name="tambah" value="Tambah">
        <input type="button" value="Back" onclick="location.href='tambah-input-st.php?id=<?= $id; ?>';">
      </div>

    </form>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>