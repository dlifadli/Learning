<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$storedanproduct = query("SELECT * FROM tb_store_product WHERE id_store = $id");
if (in_array(true, $storedanproduct)) {
  $st1 = $storedanproduct[0] ?? false;
  $st2 = $storedanproduct[1] ?? false;
  $st3 = $storedanproduct[2] ?? false;
  $st4 = $storedanproduct[3] ?? false;
  $st5 = $storedanproduct[4] ?? false;
  $st6 = $storedanproduct[5] ?? false;
  $st7 = $storedanproduct[6] ?? false;
  $st8 = $storedanproduct[7] ?? false;
  $st9 = $storedanproduct[8] ?? false;
  $st10 = $storedanproduct[9] ?? false;
  $st11 = $storedanproduct[10] ?? false;
  $st12 = $storedanproduct[11] ?? false;
  $st13 = $storedanproduct[12] ?? false;
  $st14 = $storedanproduct[13] ?? false;
  $st15 = $storedanproduct[14] ?? false;
  $st16 = $storedanproduct[15] ?? false;
  $st17 = $storedanproduct[16] ?? false;
  $st18 = $storedanproduct[17] ?? false;
  $st19 = $storedanproduct[18] ?? false;
  $st20 = $storedanproduct[19] ?? false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Edit Product</title>
  <style>
    .h3,
    .pilih {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include "../layout/header.html" ?>
  <main>
    <h3 class="h3">Pilih Product</h3>
    <div class="pilih">
      <select>
        <option selected>...</option>
        <?php if ($st1) { ?>
          <option value="<?= $st1['id_store_product']; ?>"><?= $st1['name_product']; ?></option>
        <?php } ?>
        <?php if ($st2) { ?>
          <option value="<?= $st2['id_store_product']; ?>"><?= $st2['name_product']; ?></option>
        <?php } ?>
        <?php if ($st3) { ?>
          <option value="<?= $st3['id_store_product']; ?>"><?= $st3['name_product']; ?></option>
        <?php } ?>
        <?php if ($st4) { ?>
          <option value="<?= $st4['id_store_product']; ?>"><?= $st4['name_product']; ?></option>
        <?php } ?>
        <?php if ($st5) { ?>
          <option value="<?= $st5['id_store_product']; ?>"><?= $st5['name_product']; ?></option>
        <?php } ?>
        <?php if ($st6) { ?>
          <option value="<?= $st6['id_store_product']; ?>"><?= $st6['name_product']; ?></option>
        <?php } ?>
        <?php if ($st7) { ?>
          <option value="<?= $st7['id_store_product']; ?>"><?= $st7['name_product']; ?></option>
        <?php } ?>
        <?php if ($st8) { ?>
          <option value="<?= $st8['id_store_product']; ?>"><?= $st8['name_product']; ?></option>
        <?php } ?>
        <?php if ($st9) { ?>
          <option value="<?= $st9['id_store_product']; ?>"><?= $st9['name_product']; ?></option>
        <?php } ?>
        <?php if ($st10) { ?>
          <option value="<?= $st10['id_store_product']; ?>"><?= $st10['name_product']; ?></option>
        <?php } ?>
        <?php if ($st11) { ?>
          <option value="<?= $st11['id_store_product']; ?>"><?= $st11['name_product']; ?></option>
        <?php } ?>
        <?php if ($st12) { ?>
          <option value="<?= $st12['id_store_product']; ?>"><?= $st12['name_product']; ?></option>
        <?php } ?>
        <?php if ($st13) { ?>
          <option value="<?= $st13['id_store_product']; ?>"><?= $st13['name_product']; ?></option>
        <?php } ?>
        <?php if ($st14) { ?>
          <option value="<?= $st14['id_store_product']; ?>"><?= $st14['name_product']; ?></option>
        <?php } ?>
        <?php if ($st15) { ?>
          <option value="<?= $st15['id_store_product']; ?>"><?= $st15['name_product']; ?></option>
        <?php } ?>
        <?php if ($st16) { ?>
          <option value="<?= $st16['id_store_product']; ?>"><?= $st16['name_product']; ?></option>
        <?php } ?>
        <?php if ($st17) { ?>
          <option value="<?= $st17['id_store_product']; ?>"><?= $st17['name_product']; ?></option>
        <?php } ?>
        <?php if ($st18) { ?>
          <option value="<?= $st18['id_store_product']; ?>"><?= $st18['name_product']; ?></option>
        <?php } ?>
        <?php if ($st19) { ?>
          <option value="<?= $st19['id_store_product']; ?>"><?= $st19['name_product']; ?></option>
        <?php } ?>
        <?php if ($st20) { ?>
          <option value="<?= $st20['id_store_product']; ?>"><?= $st20['name_product']; ?></option>
        <?php } ?>
      </select>
      <script>
        const select = document.querySelector('select');
        select.addEventListener('change', () => {
          window.location.href = `edit-pd.php?id=${select.value}`;
        });
      </script>
    </div>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>