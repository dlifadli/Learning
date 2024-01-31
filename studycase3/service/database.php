<?php
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "db_marketplace");
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function hapusseller($data)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM tb_seller WHERE id_seller='$data';") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function tambahseller($data)
{
  $conn = koneksi();
  $name = htmlspecialchars($data['name']);
  $gender = htmlspecialchars($data['gender']);
  $address = htmlspecialchars($data['address']);
  $date_of_birth = htmlspecialchars($data['date_of_birth']);
  $phone = htmlspecialchars($data['phone']);
  $email = htmlspecialchars($data['email']);

  $query = "INSERT INTO
  tb_seller
  VALUES
  ('', '$name', '$gender', '$address', '$date_of_birth', '$phone', '$email')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function editseller($data)
{
  $conn = koneksi();
  $id_seller = $data['id_seller'];
  $name = htmlspecialchars($data['name']);
  $gender = htmlspecialchars($data['gender']);
  $address = htmlspecialchars($data['address']);
  $date_of_birth = htmlspecialchars($data['date_of_birth']);
  $phone = htmlspecialchars($data['phone']);
  $email = htmlspecialchars($data['email']);

  $query = "UPDATE tb_seller SET
  id_seller = '$id_seller',
  name = '$name',
  gender='$gender',
  date_of_birth='$date_of_birth',
  address='$address',
  phone='$phone',
  email='$email'
  WHERE id_seller='$id_seller';";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function tambahstore($data)
{
  $conn = koneksi();
  $gene = $data['gene'];
  $name_store = $data['name_store'];
  $id_seller = $data['id_seller'];
  for ($i = 0; $i < $gene; $i++) {
    mysqli_query($conn, "INSERT INTO tb_store SET
    name_store = '$name_store[$i]', 
    id_seller = '$id_seller[$i]'")
      or die(mysqli_error($conn));
  }
  return mysqli_affected_rows($conn);
}

function tambahproduct($data)
{
  $conn = koneksi();
  $gene = $data['gene'];
  $id_store = $data['id_store'];
  $name_product = $data['name_product'];
  for ($i = 0; $i < $gene; $i++) {
    mysqli_query($conn, "INSERT INTO tb_store_product SET
    id_store = '$id_store[$i]', 
    name_product = '$name_product[$i]'")
      or die(mysqli_error($conn));
  }
  return mysqli_affected_rows($conn);
}

function editstore($data)
{
  $conn = koneksi();
  $id_store = $data['id_store'];
  $name_store = $data['name_store'];

  $query = "UPDATE tb_store SET
  id_store = '$id_store',
  name_store = '$name_store'
  WHERE id_store = '$id_store';";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapusstore($data)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM tb_store WHERE id_store='$data';") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function editproduct($data)
{
  $conn = koneksi();
  $id_store_product = $data['id_store_product'];
  $id_store = $data['id_store'];
  $name_product = $data['name_product'];

  $query = "UPDATE tb_store_product SET
  id_store_product = '$id_store_product',
  id_store = '$id_store',
  name_product = '$name_product'
  WHERE id_store_product = '$id_store_product';";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapusproduct($data)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM tb_store_product WHERE id_store_product='$data';") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
