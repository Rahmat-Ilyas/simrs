<?php 
session_start();

if (!isset($_SESSION["login_staf"]))
{
  header("location: ../login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Staf</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
</head>
<body>
  <h1>Selamat datang di halaman STAF</h1>
  <a href="../logout.php" class="btn btn-primary text-uppercase" name="logout">Logout</a>
</body>
</html>