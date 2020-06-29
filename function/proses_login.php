<?php
include_once("koneksi.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$cekdata = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email' AND password='$password' AND status='on'");

if (mysqli_num_rows($cekdata) == 0) {
  header("location:".BASE_URL."/index.php?&notif=false");
} else {
  $data = mysqli_fetch_assoc($cekdata);
  session_start();
  $_SESSION['id'] = $data['id'];
  $_SESSION['nama'] = $data['nama'];
  $_SESSION['jenis_kelamin'] = $data['jenis_kelamin'];
  $_SESSION['email'] = $data['email'];
  $_SESSION['level'] = $data['level'];

  header("location: ".BASE_URL."/index.php?page=profile&id=".$data['id']);

}


 ?>
