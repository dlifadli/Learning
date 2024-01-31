<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Product</title>
  <style>
    .generate {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "../layout/header.html" ?>
  <main>
    <form method="post" action="tambah-entry-pd.php?id=<?= $id; ?>" class="generate">
      Tentukan Jumlahnya : <input type="text" name="gene" size="1" pattern="[0-9]+" required>
      <input type="submit" name="submit" value="Generate">
    </form>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>