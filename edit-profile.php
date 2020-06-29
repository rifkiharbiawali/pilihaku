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
    <title>Ubah Profil</title>
    <meta name="author" content="Rifki Harbi Awali">
    <link rel="icon" href="img/favicon.png">
  </head>
  <body>
    <div class="ui menu">
      <a class="item" href="<?php echo BASE_URL."/index.php" ?>">
        Beranda
      </a>
      <a class="active blue item" href="<?php echo BASE_URL."/index.php?page=edit-profile&id=".$data['id'];  ?>">
        Ubah Profil
      </a>
      <a class="item" href="<?php echo BASE_URL."/index.php?page=tambah-cp&id=".$data['id'];  ?>">
        Tambah CP
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
      <br>
      <br>
      <br>
      <br>
      <br>
    <div class="ui stackable three column grid">
      <div class="column"></div>
      <div class="column">
        <form class="ui form" action="function/proses_edit.php" method="post" enctype="multipart/form-data">
            <?php
            $foto = $data['foto'];
            $gambar = "<center><img src='".BASE_URL."/foto/$foto' alt='pp' style='border-radius:100%; width:100px; height:100px;'></center>";
            if ($foto){
                echo $gambar;
            }elseif ($data['jenis_kelamin'] === 'Laki-laki'){
                  echo "<center><img src='img/M.jpg' alt='pp' style='border-radius:100%; width:100px; height:100px;'></center>";
            }elseif ($data['jenis_kelamin'] === 'Perempuan'){
                    echo "<center><img src='img/F.jpg' alt='pp' style='border-radius:100%; width:100px; height:100px;'></center>";
            }
            $pesan = isset($_GET['pesan']) ? $_GET['pesan'] : false;
            if ($pesan == "type!") {
              echo "<center><h5 style='color:#e74c3c; font-family: sans-serif; margin-bottom: 5px; margin-top: 5px'>Type file salah!</h5></center>";
            }elseif ($pesan == "ukuran!") {
              echo "<center><h5 style='color:#e74c3c; font-family: sans-serif; margin-bottom: 5px; margin-top: 5px'>Ukuran file harus kurang dari 1mb!</h5></center>";
            }elseif ($pesan == "isidata!") {
              echo "<center><h5 style='color:#e74c3c; font-family: sans-serif; margin-bottom: 5px; margin-top: 5px'>Data jangan sampai kosong!</h5></center>";
            }
           ?>
           <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
           <div class="field">
             <input type="file" name="foto" value="<?php echo $data['foto']; ?>" accept=".jpeg, .jpg, .png">
           </div>
           <div class="field">
              <input type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Jangan kosong!!!">
            </div>
            <div class="field">
              <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Jangan kosong!!!">
            </div>
            <div class="field">
              <center><input class="ui button" type="submit" name="edit" value="EDIT"></center>
            </div>
        </form>
      </div>
      <div class="column"></div>
    </div>


    </div>
  </body>
</html>
