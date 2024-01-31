<?php
require "../service/database.php";
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}
$id = $_GET['id'];
$store = query("SELECT * FROM tb_store WHERE id_seller = $id");
if (in_array(true, $store)) {
  $st1 = $store[0] ?? false;
  $st2 = $store[1] ?? false;
  $st3 = $store[2] ?? false;
  $st4 = $store[3] ?? false;
  $st5 = $store[4] ?? false;
  $st6 = $store[5] ?? false;
  $st7 = $store[6] ?? false;
  $st8 = $store[7] ?? false;
  $st9 = $store[8] ?? false;
  $st10 = $store[9] ?? false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Hapus Toko</title>
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
    <h3 class="h3">Pilih Toko</h3>
    <div class="pilih">
      <select>
        <option selected>...</option>
        <?php if ($st1) { ?>
          <option value="<?= $st1['id_store']; ?>"><?= $st1['name_store']; ?></option>
        <?php } ?>
        <?php if ($st2) { ?>
          <option value="<?= $st2['id_store']; ?>"><?= $st2['name_store']; ?></option>
        <?php } ?>
        <?php if ($st3) { ?>
          <option value="<?= $st3['id_store']; ?>"><?= $st3['name_store']; ?></option>
        <?php } ?>
        <?php if ($st4) { ?>
          <option value="<?= $st4['id_store']; ?>"><?= $st4['name_store']; ?></option>
        <?php } ?>
        <?php if ($st5) { ?>
          <option value="<?= $st5['id_store']; ?>"><?= $st5['name_store']; ?></option>
        <?php } ?>
        <?php if ($st6) { ?>
          <option value="<?= $st6['id_store']; ?>"><?= $st6['name_store']; ?></option>
        <?php } ?>
        <?php if ($st7) { ?>
          <option value="<?= $st7['id_store']; ?>"><?= $st7['name_store']; ?></option>
        <?php } ?>
        <?php if ($st8) { ?>
          <option value="<?= $st8['id_store']; ?>"><?= $st8['name_store']; ?></option>
        <?php } ?>
        <?php if ($st9) { ?>
          <option value="<?= $st9['id_store']; ?>"><?= $st9['name_store']; ?></option>
        <?php } ?>
        <?php if ($st10) { ?>
          <option value="<?= $st10['id_store']; ?>"><?= $st10['name_store']; ?></option>
        <?php } ?>
      </select>
      <script>
        const select = document.querySelector('select');
        select.addEventListener('change', () => {
          if (confirm('Apakah Anda yakin ingin menghapus?')) {
            window.location.href = `hapus-st.php?id=${select.value}`;
          } else {
            window.location.href = '../seller/detail.php?id=<?= $id; ?>';
          }
        });
      </script>
    </div>
    <a href="../seller/detail.php?id=<?= $id; ?>">Back</a>
  </main>
  <?php include "../layout/footer.html" ?>
</body>

</html>