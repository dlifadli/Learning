<?php

function koneksi()
{
  return mysqli_connect("localhost", "root", "", "univz1");
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

function tambah($data)
{
  $conn = koneksi();
  $nim = htmlspecialchars($data['nim']);
  $nama = htmlspecialchars($data['nama']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
  $alamat = htmlspecialchars($data['alamat']);
  $gender = htmlspecialchars($data['gender']);
  $mku1 = htmlspecialchars($data['mku1']);
  $mku2 = htmlspecialchars($data['mku2']);
  $mku3 = htmlspecialchars($data['mku3']);
  $mkp = htmlspecialchars($data['mkp']);

  $query = "INSERT INTO
  mahasiswa
  VALUES
  ('$nim', '$nama', '$jurusan', '$tanggal_lahir', '$alamat', '$gender', '$mku1', '$mku2', '$mku3', '$mkp')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function edit($data)
{
  $conn = koneksi();
  $nim = htmlspecialchars($data['nim']);
  $nama = htmlspecialchars($data['nama']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
  $alamat = htmlspecialchars($data['alamat']);
  $gender = htmlspecialchars($data['gender']);
  $mku1 = htmlspecialchars($data['mku1']);
  $mku2 = htmlspecialchars($data['mku2']);
  $mku3 = htmlspecialchars($data['mku3']);
  $mkp = htmlspecialchars($data['mkp']);

  $query = "UPDATE mahasiswa SET
  nim='$nim',
  nama = '$nama',
  jurusan='$jurusan',
  tanggal_lahir='$tanggal_lahir',
  alamat='$alamat',
  gender='$gender',
  mku1='$mku1',
  mku2='$mku2',
  mku3='$mku3',
  mkp='$mkp'
  WHERE nim='$nim';";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapus($data)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$data';") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT 
  aa.nim, aa.nama, bb.jurusan
        FROM mahasiswa aa
        JOIN jurusan bb ON bb.id_jurusan = aa.jurusan
        WHERE 
        nim LIKE '%$keyword%' OR
        nama LIKE '%$keyword%';";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
