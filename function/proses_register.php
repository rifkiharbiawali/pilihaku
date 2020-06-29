<?php
 include_once("koneksi.php");
 $level = "Pengguna";
 $status = "on";
 $nama = $_POST['nama'];
 $jenis_kelamin = $_POST['jenis_kelamin'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);

unset($_POST['password']);
$dataform = http_build_query($_POST);
$cekemail = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email'");
if (empty($nama) || empty($jenis_kelamin) || empty($email) || empty($password)) {
  header("location:".BASE_URL."/index.php?page=halaman-register&notif=require&$dataform");
  exit;
}elseif (mysqli_num_rows($cekemail) ===1) {
  header("location:".BASE_URL."/index.php?page=halaman-register&notif=email&$dataform");
  exit;
}else {
  mysqli_query($koneksi, "INSERT INTO pengguna (level, nama, jenis_kelamin, email, password, status)
                                               VALUES ('$level', '$nama', '$jenis_kelamin', '$email', '$password', '$status')");
  header("location:".BASE_URL);

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
