<?php
include_once('koneksi.php');
session_start();

  $id = $_SESSION['id'];
  $cekdata = mysqli_query($koneksi, "SELECT * FROM cp$id WHERE no=".$_POST['no']);
  $cekdata_pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna");
  $data = mysqli_fetch_assoc($cekdata);
  $data_pengguna = mysqli_fetch_assoc($cekdata_pengguna);

if ($_POST['edit']) {
  $no = $_POST['no'];
  $nama_cp =  $_POST['nama'];
  $visi_misi = $_POST['visi_misi'];
  $namafoto = $_FILES['foto']['name'];
  $tmpfoto = $_FILES['foto']['tmp_name'];
  $sizefoto = $_FILES['foto']['size'];
  $typefoto = $_FILES['foto']['type'];
  $lokasifoto = "../foto_cp/";
    if (!empty($nama_cp) and !empty($visi_misi)) {
      if ($sizefoto < 1000000) {
        if ($typefoto =='image/jpeg' or $typefoto =='image/png') {
          $foto = ", foto='$namafoto'";
          move_uploaded_file($tmpfoto, $lokasifoto . $namafoto);
          mysqli_query($koneksi, "UPDATE cp$id SET nama_cp='$nama_cp', visi_misi='$visi_misi' $foto WHERE no=$no");
          header("location: ".BASE_URL."/index.php?page=tambah-cp&id=".$data_pengguna['id']);
        }elseif (empty($namafoto) or $typefoto =='image/jpeg' or $typefoto =='image/png') {
          $foto = "";
          // move_uploaded_file($tmpfoto, $lokasifoto . $namafoto);
          mysqli_query($koneksi, "UPDATE cp$id SET nama_cp='$nama_cp', visi_misi='$visi_misi' WHERE no=".$_POST['no']);
          header("location: ".BASE_URL."/index.php?page=tambah-cp&id=".$data_pengguna['id']);
        }else{
          header("location:".BASE_URL."/index.php?page=edit-cp&id=".$data_pengguna['id']."&no=".$data['no']."&pesan=type!");
        }
      }else{
        header("location:".BASE_URL."/index.php?page=edit-cp&id=".$data_pengguna['id']."&no=".$data['no']."&pesan=ukuran!");
      }

    }else {
      header("location:".BASE_URL."/index.php?page=edit-cp&id=".$data_pengguna['id']."&no=".$data['no']."&pesan=isidata!");
    }
}

?>
