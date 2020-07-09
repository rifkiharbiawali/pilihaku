<?php
  include_once("function/koneksi.php");
  session_start();
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
        if ($id) {
          $modul = isset($_GET['id']) ? $_GET['id'] : false;
        }else {
          header("location:" .BASE_URL."/index.php?");
        }
        $cekdata = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id=".$_SESSION['id']);
        $data = mysqli_fetch_assoc($cekdata);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="style/semanticui/semantic.min.css">
    <script src="style/semanticui/jquery-3.5.1.min.js"></script>
    <script src="style/semanticui/semantic.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title><?php echo $data['nama']; ?></title>
    <meta name="author" content="Rifki Harbi Awali">
    <link rel="icon" href="img/favicon.png">
  </head>
  <body>
  <div class="ui menu">
    <a class="active blue item" href="<?php echo BASE_URL."/index.php" ?>">
      Beranda
    </a>
    <a class="item" href="<?php echo BASE_URL."/index.php?page=edit-profile&id=".$data['id'];  ?>">
      Ubah Profil
    </a>
    <a class="item" href="<?php echo BASE_URL."/index.php?page=tambah-cp&id=".$data['id'];  ?>">
      Tambah CP
    </a>
    <a class="item" href="<?php echo BASE_URL."/index.php?page=daftar-hadir&id=".$data['id'];  ?>">
      Daftar Hadir
    </a>
    <a class="item" href="<?php echo BASE_URL."/index.php?page=mulai-pilih&id=".$data['id'];  ?>">
      Mulai Pilih
    </a>


    <div class="right menu">
      <!-- <div class="item">
        <div class="ui icon input">
          <input type="text" placeholder="Search...">
          <i class="search link icon"></i>
        </div>
      </div> -->
      <a class="ui item" href="<?php echo BASE_URL."/index.php?page=logout"; ?>">
        Logout
      </a>
    </div>
</div>
    <div>
      <br><br><br><br><br><br><br><br>
      <?php
      $nama = $data['nama'];
      echo "<center><h1 style='font-weight:lighter'>Selamat Datang<span style='font-weight:bold'> $nama</span></h1></center>" ;
      echo "<br>";
      $foto = $data['foto'];
        $gambar = "<center><img src='".BASE_URL."/foto/$foto' alt='pp' style='border-radius:100%; width:100px; height:100px;'></center>";
        if ($foto){
            echo $gambar;
        }elseif ($data['jenis_kelamin'] === 'Laki-laki'){
              echo "<center><img src='img/M.jpg' alt='pp' style='border-radius:100%; width:100px; height:100px;'></center>";
        }elseif ($data['jenis_kelamin'] === 'Perempuan'){
                echo "<center><img src='img/F.jpg' alt='pp' style='border-radius:100%; width:100px; height:100px;'></center>";
        }
        $jenis_kelamin = $data['jenis_kelamin'];
        $email = $data['email'];
        echo "<center>$email<br>$jenis_kelamin</center>";
       ?>
       <!-- <div>
         <span><a href="<?php echo BASE_URL."/index.php?page=edit_profile&id=".$data['id']; ?>"><input type="button" name="edit_profile" value="EDIT PROFILE"></a></span><br>
         <span><a href="<?php echo BASE_URL."/index.php?page=logout"; ?>"><input type="button" name="logout" value="LOGOUT"></a></span>
       </div> -->
    </div>
  </body>
</html>
