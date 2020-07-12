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
        $tabelhd = mysqli_query($koneksi, "SELECT * FROM hd$id");
        $data = mysqli_fetch_assoc($cekdata);
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
       <a class="item" href="<?php echo BASE_URL."/index.php?page=tambah-cp&id=".$data['id'];  ?>">
         Tambah CP
       </a>
       <a class="active blue item" href="<?php echo BASE_URL."/index.php?page=daftar-hadir&id=".$data['id'];  ?>">
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
   <div class="ui stackable three column grid">
     <div class="column"></div>
     <div class="column">

       <form class='ui form' action='function/proses_excel.php' method='post' enctype='multipart/form-data'>
         <div class='field'>
           <center><input class='ui blue button' type='file' name='upload_excel' value='Upload' accept='.xls'></center>
         </div>
         <div class="field">
           <center><input class='ui blue button' type='submit' name='buat' value='Upload'></center>
         </div>
       </form>
       <table class='ui unstackable table'>
         <thead>
           <tr>
             <th class='center aligned'>No</th>
             <th class='center aligned'>id</th>
             <th class='center aligned'>Nama</th>
             <th class='center aligned'>Keterangan</th>
           </tr>
         </thead>
  <?php
      $no = 1;
      while($hd=mysqli_fetch_assoc($tabelhd)) {

        echo "<tbody>
                <tr>
                  <td class='center aligned'>$no</td>
                  <td class='center aligned'>$hd[id]</td>
                  <td class='center aligned'>$hd[nama_pemilih]</td>
                  <td class='center aligned'>$hd[keterangan]</td>
                </tr>
                  </tbody>";
                  $no++;
                  // echo "<a href='";
                  // echo BASE_URL."/index.php?page=proses_delete_cp&id=$data[id]&no=$cp[no]'><button class='ui blue button'>Delete</button></a></th>
        }
        echo "</table>";
        echo " <form class='ui form' action='function/proses_deleteexcel.php' method='post'>
           <div class='field'>
             <center><input class='ui blue button' type='submit' name='hapushd' value='Delete'></center>
           </div>
         </form>";

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
