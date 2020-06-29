<?php
 include_once("function/koneksi.php");
 session_start();
 $id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
 if ($id) {
   header("location:".BASE_URL."index.php?page=profile&modul=myprofile");
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="style/semanticui/semantic.min.css">
    <script src="style/semanticui/jquery-3.5.1.min.js"></script>
    <script src="style/semanticui/semantic.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.ui.dropdown').dropdown();
    });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Register</title>
    <meta name="author" content="Rifki Harbi Awali">
    <link rel="icon" href="img/favicon.png">
  </head>
  <body>
    <br>
    <br>
    <br>
    <br>
    <center><img  src="img/bulan.png" alt="bulan" style="width:100px; height:100px;"></center>
    <?php
      $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
      $nama = isset($_GET['nama']) ? $_GET['nama'] : false;
      $jenis_kelamin = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : false;
      $email = isset($_GET['email']) ? $_GET['email'] : false;

      if ($notif === "require") {
        echo "<center><h5 style='color:#e74c3c; font-family: sans-serif; margin-bottom: 5px; margin-top: 5px'>Mohon isi data dengan lengkap!</h5></center>";
      }elseif ($notif === "email") {
        echo "<center><h5 style='color:#e74c3c; font-family: sans-serif; margin-bottom: 5px; margin-top: 5px'>Email sudah terdaftar, silahkan login!</h5></center>";
      }
     ?>
    <div class="ui stackable three column grid">
      <div class="column"></div>
      <div class="column">
        <form class="ui form" action="function/proses_register.php" method="post">
          <center><h3 style="margin-bottom:10px;  font-weight:lighter;">SILAHKAN REGISTER</h3></center>
          <div class="field">
            <!-- <span> -->
              <!--<label class="l-register">Nama Lengkap</label><br>-->
              <input type="text" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Lengkap"><br>
            <!-- </span> -->
          </div>
          <div class="field">
            <!-- <span> -->
                <select class="ui dropdown" name="jenis_kelamin">
                  <option value="">Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              <!-- </div> -->
            <!-- </span> -->
          </div>
          <div class="field">
            <!-- <span> -->
              <!--<label class="l-register">Email</label><br>-->
              <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email"><br>
            <!-- </span> -->
          </div>
          <div class="field">
            <!-- <span> -->
              <!--<label class="l-register">Password</label><br>-->
              <input type="password" name="password" value="" placeholder="Password"><br>
            <!-- </span> -->
          </div>
          <div class="field">
            <!-- <span> -->
                <center><input class="ui button" type="submit" name="register-register" value="REGISTER"></center>
            <!-- </span> -->
          </div>
        </form>
      </div>
      <div class="column"></div>
    </div>
  </body>
</html>
