<?php
include_once("koneksi.php");
session_start();
$id = $_SESSION['id'];
$hapus = $_POST['hapushd'];
  if ($hapus) {
    mysqli_query($koneksi, "DELETE FROM hd$id");
    header("location:".BASE_URL."/index.php?page=daftar-hadir&id=".$_SESSION['id']);

  }
 ?>
