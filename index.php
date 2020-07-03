<?php
include_once("function/koneksi.php");
// $page = isset($_GET['page']) ? $_GET['page'] : false;
// $filename = "$page.php";
//
// if (file_exists($filename)) {
//   // include_once($filename);
//   switch ($filename) {
//     case "halaman-register.php":
//       include_once($filename);
//       break;
//
//     default:
//       echo "<h1>maaf</h1>";
//       // header("location:".BASE_URL."index.php?page=eror");
//       break;
//   }
// }else{
//   include_once('main.php');
// }

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      case 'halaman-register':
      include_once("$page.php");
      break;
      case 'profile':
      include_once("$page.php");
      break;
      case 'logout':
      include_once("$page.php");
      break;
      case 'edit-profile':
      include_once("$page.php");
      break;
      case 'tambah-cp':
      include_once("$page.php");
      break;
      case 'edit-cp':
      include_once("$page.php");
      break;

    default:
      include_once('eror.php');
      break;
  }
}else {
  include_once('main.php');
}

// session_start();
// $id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
// $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
// $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

 ?>
