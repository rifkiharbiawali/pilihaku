<?php
  session_start();
  unset($_SESSION['id']);
  unset($_SESSION['nama']);
  unset($_SESSION['jenis_kelamin']);
  unset($_SESSION['email']);
  unset($_SESSION['level']);

  header("location: ".BASE_URL);
 ?>
