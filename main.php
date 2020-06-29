<?php
  include_once("function/koneksi.php");
  session_start();
  $id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
  if ($id) {
    header("location: ".BASE_URL."/index.php?page=profile&id=".$_SESSION['id']);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="style/semanticui/semantic.min.css">
    <script src="style/semanticui/jquery-3.5.1.min.js"></script>
    <script src="style/semanticui/semantic.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Login</title>
    <meta name="author" content="Rifki Harbi Awali">
    <link rel="icon" href="img/favicon.png">
  </head>
  <body>

    <br>
    <br>
    <br>
    <br>
    <br>
    <center><img class="ui small image" src="img/daun.png" alt="daun"></center>
    <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        if ($notif == "false") {
          echo "<center><h5 style='color:#e74c3c; font-family: sans-serif; margin-bottom: 5px; margin-top: 5px'>Username dan Password Salah!</h5></center>";
          }
     ?>

    <div class="ui stackable three column grid">
        <!-- <div class="three column row"> -->
            <div class="column"></div>
            <div class="column">
                <form class="ui form" action="function/proses_login.php" method="post">
                 <center><h2 style="margin-bottom:10px; font-weight:lighter;">LOGIN DISINI</h2></center>
                <div class="field">
                    <input type="text" name="email" value="" placeholder="Email"><br>
                </div>
                <div class="field">
                <input type="password" name="password" value="" placeholder="Password"><br>
                </div>
                <center>
                <div class="field">
                <span><input class="ui button" type="submit" name="login" value="LOGIN"></span>
                <span><a href="<?php echo BASE_URL."/index.php?page=halaman-register"; ?>"><input class="ui button" type="button" name="register-login" value="REGISTER"></a></span>
                </div>
                </center>
                </form>
            </div>
            <div class="column"></div>
        <!-- </div> -->
    </div>

  </body>
</html>
