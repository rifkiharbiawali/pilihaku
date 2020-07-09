<?php
include_once('koneksi.php');
session_start();
$id = $_SESSION['id'];
$cekdata = mysqli_query($koneksi, "SELECT * FROM cp$id WHERE no=".$_POST['no']);
$cekdata_pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna");
$data = mysqli_fetch_assoc($cekdata);
$data_pengguna = mysqli_fetch_assoc($cekdata_pengguna);
$no = $_POST['no'];
if ($_POST['delete']) {
  mysqli_query($koneksi, "UPDATE cp$id SET nama_cp='', visi_misi='' , foto='' WHERE no=$no");
  header("location: ".BASE_URL."/index.php?page=tambah-cp&id=".$data_pengguna['id']);

}


 ?>
