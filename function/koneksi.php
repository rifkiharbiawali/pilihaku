<?php
   define("BASE_URL", "http://localhost/pilihaku/");

   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "projectr";

   $koneksi = mysqli_connect($server, $username, $password, $database) or die ("Perikasa Koneksi Anda!");

?>
