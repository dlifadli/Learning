<?php
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "univx");
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    return 'nophoto.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
          alert('Yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
          alert('Yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5Mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
        alert('Ukuran terlalu besar!');
        </script>";
    return false;
  }

  // lolos pengecekan
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;

  // pindahkan gambar dari penyimpanan temporary
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
  $alamat = htmlspecialchars($data['alamat']);
  $gender = htmlspecialchars($data['gender']);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO
  mahasiswa
  VALUES
  (null,'$nim', '$nama', '$tanggal_lahir', '$alamat', '$gender', '$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  $uts = htmlspecialchars($data['uts']);
  $uas = htmlspecialchars($data['uas']);

  $nama_matkul = htmlspecialchars($data['nama_matkul']);
  $semester = htmlspecialchars($data['semester']);
  $urutan_matkul = htmlspecialchars($data['urutan_matkul']);
  $jumlah_sks = htmlspecialchars($data['jumlah_sks']);

  $query1 = "INSERT INTO
            nilai
            VALUES
            (null, '$nim', '$uts', '$uas')";
  mysqli_query($conn, $query1) or die(mysqli_error($conn));

  $query2 = "INSERT INTO
            matkul
            VALUES
            (null, '$nim', '$nama_matkul', '$semester', '$urutan_matkul', '$jumlah_sks')";
  mysqli_query($conn, $query2) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($nim)
{
  $conn = koneksi();

  // menghapus gambar di folder img
  $mhs = query("SELECT * FROM mahasiswa WHERE nim = '$nim'");
  if ($mhs['gambar'] != 'nophoto.jpg') {
    unlink('img/' . $mhs['gambar']);
  }

  mysqli_query($conn, "DELETE FROM matkul WHERE nim = '$nim'");
  mysqli_query($conn, "DELETE FROM nilai WHERE nim = '$nim'");
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
  $alamat = htmlspecialchars($data['alamat']);
  $gender = htmlspecialchars($data['gender']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }
  $query = "UPDATE mahasiswa SET
  nama = '$nama',
  tanggal_lahir = '$tanggal_lahir',
  alamat = '$alamat',
  gender = '$gender',
  gambar = '$gambar'
  WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  $id = $data['id'];
  $nim = $data['nim'];
  $nama_matkul = htmlspecialchars($data['nama_matkul']);
  $semester = htmlspecialchars($data['semester']);
  $urutan_matkul = htmlspecialchars($data['urutan_matkul']);
  $jumlah_sks = htmlspecialchars($data['jumlah_sks']);
  $query1 = "UPDATE matkul SET
  id = '$id',
  nim = '$nim',
  nama_matkul = '$nama_matkul',
  semester = '$semester',
  urutan_matkul = '$urutan_matkul',
  jumlah_sks = '$jumlah_sks'
  WHERE id = $id";
  mysqli_query($conn, $query1) or die(mysqli_error($conn));

  $id = $data['id'];
  $nim = $data['nim'];
  $uts = htmlspecialchars($data['uts']);
  $uas = htmlspecialchars($data['uas']);
  $query2 = "UPDATE nilai SET
  id = '$id',
  nim = '$nim',
  uts = '$uts',
  uas = '$uas',
  WHERE id = $id";
  mysqli_query($conn, $query2) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa
              WHERE 
              nim LIKE '%$keyword%' OR
              nama LIKE '%$keyword%'
              ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
