<?php 
session_start();

$_SESSION["judul"] = "Halaman Dokter";

if (!isset($_SESSION["login_dokter"]))
{
  header("location: ../login.php");
  exit();
}
require "template/header.php";
?>
  <h1>Selamat datang di halaman DOKTER</h1>

 <?php require "template/footer.php"; ?>