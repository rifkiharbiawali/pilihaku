<?php
include_once('koneksi.php');
session_start();

  $cekdata = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id=".$_SESSION['id']);
  $data = mysqli_fetch_assoc($cekdata);

if ($_POST['edit']) {
  $id = $_POST['id'];
  $nama =  $_POST['nama'];
  $email = $_POST['email'];
  $namafoto = $_FILES['foto']['name'];
  $tmpfoto = $_FILES['foto']['tmp_name'];
  $sizefoto = $_FILES['foto']['size'];
  $typefoto = $_FILES['foto']['type'];
  $lokasifoto = "../foto/";
    if (!empty($nama) and !empty($email)) {
      if ($sizefoto < 1000000) {
        if ($typefoto =='image/jpeg' or $typefoto =='image/png') {
          $foto = ", foto='$namafoto'";
          move_uploaded_file($tmpfoto, $lokasifoto . $namafoto);
          mysqli_query($koneksi, "UPDATE pengguna SET nama='$nama', email='$email' $foto WHERE id='$id'");
          header("location: ".BASE_URL."/index.php?page=profile&id=".$data['id']);
        }elseif (empty($namafoto) or $typefoto =='image/jpeg' or $typefoto =='image/png') {
          $foto = "";
          // move_uploaded_file($tmpfoto, $lokasifoto . $namafoto);
          mysqli_query($koneksi, "UPDATE pengguna SET nama='$nama', email='$email' WHERE id='$id'");
          header("location: ".BASE_URL."/index.php?page=profile&id=".$data['id']);
        }else{
          header("location:".BASE_URL."/index.php?page=edit_profile&id=".$data['id']."&pesan=type!");
        }
      }else {
        header("location:".BASE_URL."/index.php?page=edit_profile&id=".$data['id']."&pesan=ukuran!");
      }

    }else {
      header("location:".BASE_URL."/index.php?page=edit_profile&id=".$data['id']."&pesan=isidata!");
    }
}

?>
