<?php
include_once("koneksi.php");
session_start();
// $tabelcp = $_POST['tabelcp'];
// $tabelhadir = $_POST['tabelhadir'];
$id = $_SESSION['id'];
$cp = "CREATE TABLE cp$id (no VARCHAR (20) NOT NULL, nama_cp VARCHAR (100) NOT NULL, visi_misi VARCHAR (1000) NOT NULL, foto VARCHAR (100) NOT NULL, PRIMARY KEY (no))";
$hadir = "CREATE TABLE hd$id (id VARCHAR (20) NOT NULL, nama_pemilih VARCHAR (100) NOT NULL, keterangan VARCHAR (100) NOT NULL, PRIMARY KEY (id))";
if ($_POST['buat']) {
  mysqli_query($koneksi, $cp);
  mysqli_query($koneksi, $hadir);
  mysqli_query($koneksi, "INSERT INTO nama_tabel (id, tabelcp, tabelhadir) VALUES ('$id', 'cp$id', 'hd$id')");
  mysqli_query($koneksi, "INSERT INTO cp$id (no, nama_cp, visi_misi) VALUES ('1', 'Pasangan Calon', 'Visi-Misi')");
  mysqli_query($koneksi, "INSERT INTO cp$id (no, nama_cp, visi_misi) VALUES ('2', 'Pasangan Calon', 'Visi-Misi')");
  mysqli_query($koneksi, "INSERT INTO cp$id (no, nama_cp, visi_misi) VALUES ('3', 'Pasangan Calon', 'Visi-Misi')");
  mysqli_query($koneksi, "INSERT INTO cp$id (no, nama_cp, visi_misi) VALUES ('4', 'Pasangan Calon', 'Visi-Misi')");
  mysqli_query($koneksi, "INSERT INTO cp$id (no, nama_cp, visi_misi) VALUES ('5', 'Pasangan Calon', 'Visi-Misi')");
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
