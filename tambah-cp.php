<?php
  include_once("function/koneksi.php");
  session_start();
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
        if ($id) {
          $modul = isset($_GET['id']) ? $_GET['id'] : false;
        }else {
          header("location:" .BASE_URL."/index.php?");
        }
        $id = $_SESSION['id'];
        $cekdata = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id=".$_SESSION['id']);
        $cektabel = mysqli_query($koneksi, "SELECT * FROM nama_tabel WHERE id=".$_SESSION['id']);
        $tabelcp = mysqli_query($koneksi, "SELECT * FROM cp$id");
        $data = mysqli_fetch_assoc($cekdata);
        $tabel = mysqli_fetch_assoc($cektabel);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" type="text/css" href="style/semanticui/semantic.min.css">
     <script src="style/semanticui/jquery-3.5.1.min.js"></script>
     <script src="style/semanticui/semantic.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <title>Tambah CP</title>
     <meta name="author" content="Rifki Harbi Awali">
     <link rel="icon" href="img/favicon.png">
   </head>
   <body>
     <div class="ui menu">
       <a class="item" href="<?php echo BASE_URL."/index.php" ?>">
         Beranda
       </a>
       <a class="item" href="<?php echo BASE_URL."/index.php?page=edit-profile&id=".$data['id'];  ?>">
         Ubah Profil
       </a>
       <a class="active blue item" href="<?php echo BASE_URL."/index.php?page=tambah-cp&id=".$data['id'];  ?>">
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
   <div class="ui stackable three column grid">
     <div class="column"></div>
     <div class="column">
      <?php

      if (mysqli_num_rows($cektabel) == 0) {
        echo "<form class='ui form' action='function/proses_tambah.php' method='post' enctype='multipart/form-data'>
                <div class='field'>
                  <center><input class='ui blue button' type='submit' name='buat' value='Mulai'></center>
                </div>
              </form>";
      }else {
        echo "<table class='ui unstackable table'>";
        echo "
              <thead>
                <tr>
                  <th class='center aligned'>No</th>
                  <th class='center aligned'>Pasangan Calon</th>
                  <th class='center aligned'>Visi Misi</th>
                  <th class='center aligned'>Edit</th>
                </tr>
              </thead>";
      while($cp=mysqli_fetch_assoc($tabelcp)) {
        echo "<tbody>
                <tr>
                  <th class='center aligned'>$cp[no]</th>
                  <th>$cp[nama_cp]</th>
                  <th>$cp[visi_misi]</th>
                  <th class='center aligned'><button>Edit</button></th>
                </tr>
              </tbody>";
        }
        echo "</table>";
      }
       ?>
       <!-- <form class="ui form" action="function/proses_tambah.php" method="post" enctype="multipart/form-data">
          <div class="field">
            <center><input type="text" name="tabelcp" value="" placeholder="Nama Tabel CP" style="width:200px;">
            <input type="text" name="tabelhadir" value="" placeholder="Nama Tabel Hadir" style="width:200px;"></center>
          </div>
          <div class="field">
            <center><input class="ui blue button" type="submit" name="buat" value="Mulai"></center>
          </div>

        </div>
       </form> -->
     </div>
     <div class="column"></div>

   </div>

   </body>
 </html>
