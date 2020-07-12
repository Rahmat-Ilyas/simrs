<?php 
session_start();

if (isset($_COOKIE['masuk_admin'])) {
  if ($_COOKIE['masuk_admin'] == 'true'){
    $_SESSION['login_admin'] = true;
  }
}
else if (isset($_COOKIE['masuk_dokter'])) {
  if ($_COOKIE['masuk_dokter'] == 'true'){
    $_SESSION['login_dokter'] = true;
  }
}
else if (isset($_COOKIE['masuk_staf'])) {
  if ($_COOKIE['masuk_staf'] == 'true'){
    $_SESSION['login_staf'] = true;
  }
}

if (isset($_SESSION["login_admin"])) {
  header("location: admin/");
  exit();
}
else if (isset($_SESSION["login_dokter"])) {
  header("location: dokter/");
  exit();
}
else if (isset($_SESSION["login_staf"])) {
  header("location: staf/");
  exit();
}

require 'koneksi/koneksi.php';

$error = false;
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $cekusername = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");
  
  if (mysqli_num_rows($cekusername) == 1) {
    $row = mysqli_fetch_assoc($cekusername);
    if (password_verify($password, $row["password"])) {

      if ($row["id_akun"] == 1){
        if ($_POST["remember"]) {
          setcookie('masuk_admin','true',time()+3600);
        }
        $_SESSION["login_admin"] = true;
        header("Location: admin/");
        exit();
      }
      else if ($row["id_akun"] == 2){
        if ($_POST["remember"]) {
          setcookie('masuk_dokter','true',time()+3600);
        }
        $_SESSION["login_dokter"] = true;
        header("Location: dokter/");
        exit();
      }
      else if ($row["id_akun"] == 3){
        if ($_POST["remember"]) {
          setcookie('masuk_staf','true',time()+3600);
        }
        $_SESSION["login_staf"] = true;
        header("Location: staf/");
        exit();
      }
    }     
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="asset/images/favicon.ico">

  <!-- App css -->
  <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="asset/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="asset/css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="asset/css/style.css" rel="stylesheet" type="text/css" />

  <script src="asset/js/modernizr.min.js"></script>

</head>


<body class="bg-accpunt-pages">

  <!-- HOME -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">

          <div class="wrapper-page">

            <div class="account-pages">
              <div class="account-box">
                <div class="account-logo-box">
                  <h2 class="text-uppercase text-center">
                    <a href="index.html" class="text-success">
                      <span><img src="asset/images/logo_dark.png" alt="" height="18"></span>
                    </a>
                  </h2>
                  <h6 class="text-uppercase text-center font-bold mt-4">Login</h6>
                </div>
                <div class="account-content">
                  <form class="form-horizontal" action="#" method="POST">

                    <div class="form-group m-b-20 row">
                      <div class="col-12">
                        <label for="emailaddress">Username</label>
                        <input class="form-control" type="text" id="emailaddress" required="" placeholder="Enter your username" name="username">
                      </div>
                    </div>

                    <div class="form-group row m-b-20">
                      <div class="col-12">
                        <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                        <label for="password">Password</label>
                        <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                      </div>
                    </div>

                    <div class="form-group row m-b-20">
                      <div class="col-12">
                        <?php if ($error==true) : ?>
                          <label class="text-danger">Username atau password tidak sesuai!</label>
                        <?php endif; ?>

                        <div class="checkbox checkbox-success">
                          <input id="remember" type="checkbox" name="remember">
                          <label for="remember">
                            Remember me
                          </label>
                        </div>

                      </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                      <div class="col-12">
                        <button class="btn btn-block btn-gradient waves-effect waves-light" type="submit" name="submit">Login</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>
            <!-- end card-box-->


          </div>
          <!-- end wrapper -->

        </div>
      </div>
    </div>
  </section>
  <!-- END HOME -->


  <!-- jQuery  -->
  <script src="asset/js/jquery.min.js"></script>
  <script src="asset/js/popper.min.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="asset/js/metisMenu.min.js"></script>
  <script src="asset/js/waves.js"></script>
  <script src="asset/js/jquery.slimscroll.js"></script>

  <!-- App js -->
  <script src="asset/js/jquery.core.js"></script>
  <script src="asset/js/jquery.app.js"></script>

</body>
</html>