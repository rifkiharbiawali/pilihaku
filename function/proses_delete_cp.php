<?php
include_once('koneksi.php');
session_start();
$no = $_POST['no'];
$id = $_SESSION['id'];
$cekdata = mysqli_query($koneksi, "SELECT * FROM cp$id WHERE no=$no");
$cekdata_pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna");
$data = mysqli_fetch_assoc($cekdata);
$data_pengguna = mysqli_fetch_assoc($cekdata_pengguna);
$namafoto = "../foto_cp/".$data['foto'];
if ($_POST['delete']) {
  mysqli_query($koneksi, "UPDATE cp$id SET nama_cp='', visi_misi='' , foto='' WHERE no=$no");
  header("location: ".BASE_URL."/index.php?page=tambah-cp&id=".$data_pengguna['id']);
  unlink($namafoto);
}


 ?>
