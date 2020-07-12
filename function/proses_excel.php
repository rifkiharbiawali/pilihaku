<?php
  include_once("koneksi.php");
  include_once("../excel_reader2.php");
  session_start();
  $id_session = $_SESSION['id'];
  $nama_file = $_FILES['upload_excel']['name'];
  $tmpfile = $_FILES['upload_excel']['tmp_name'];
  $lokasifile = "";
  move_uploaded_file($tmpfile, $lokasifile . $nama_file);

  chmod($nama_file, 0777);


  $data = new Spreadsheet_Excel_Reader($nama_file, false);

  $baris = $data->rowcount();

  $hasil = 0;
  for ($i=2; $i<=$baris; $i++) {
    $id = $data->val($i, 1);
    $nama_pemilih = $data->val($i, 2);
    $keterangan = $data->val($i, 3);
    mysqli_query($koneksi, "INSERT INTO hd$id_session (id, nama_pemilih, keterangan) VALUES ('$id', '$nama_pemilih', '$keterangan')");

    // if ($id != "" && $nama_pemilih != "" && $keterangan != "") {
    //   mysqli_query($koneksi, "INSERT INTO hd$id_session (id, nama_pemilih, keterangan) VALUES ('sss', 'cxcx', 'xsc')");
    //   $hasil++;
    // }
  }

  unlink($nama_file);

  header("location:".BASE_URL."/index.php?page=daftar-hadir&id=".$_SESSION['id']);



 ?>
