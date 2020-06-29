<?php
include_once("koneksi.php");
session_start();
// $tabelcp = $_POST['tabelcp'];
// $tabelhadir = $_POST['tabelhadir'];
$id = $_SESSION['id'];
$cp = "CREATE TABLE cp$id (No VARCHAR (20) NOT NULL, nama_cp VARCHAR (100) NOT NULL, visi_misi VARCHAR (1000) NOT NULL, PRIMARY KEY (No))";
$hadir = "CREATE TABLE hd$id (id VARCHAR (20) NOT NULL, nama_pemilih VARCHAR (100) NOT NULL, keterangan VARCHAR (100) NOT NULL, PRIMARY KEY (id))";
if ($_POST['buat']) {
  mysqli_query($koneksi, $cp);
  mysqli_query($koneksi, $hadir);
  mysqli_query($koneksi, "INSERT INTO nama_tabel (id, tabelcp, tabelhadir) VALUES ('$id', 'cp$id', 'hd$id')");

  header("location:".BASE_URL."/index.php?page=tambah-cp&id=".$_SESSION['id']);
}
 ?>
 <!-- Halaman Coba-coba -->
<!-- <style media="screen">
.coba {
  color: #9b59b6;
  text-align: center;
  margin-top: 100px;
  font-family: sans-serif;
}
</style>

<h1 class="coba">Selamat Data Anda Tersimpan !</h1> -->
