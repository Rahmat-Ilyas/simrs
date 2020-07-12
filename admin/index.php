<?php 
session_start();

$_SESSION["judul"] = "Halaman Admin";

if (!isset($_SESSION["login_admin"]))
{
	header("location: ../login.php");
	exit();
}
require '../template/header.php';
?>

<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title float-left">Dashboard</h4>

			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item"><a href="#">SIMERS</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-xl-12">
		<div class="card-box" style="height: 500px;">
			<h1 class="text-center">Sistem Informasi Manajemen Rumah Sakit</h1>
			<h3 class="text-center">Universitas Islam Negeri Alauddin Makassar</h3>
			<hr>
			<div class="text-center">
				<b>Selamat datang di Sistem Informasi Manajemn Rumah Sakit UIN Alauddin Makassar</b>
			</div>
		</div>
	</div>
</div>

<?php require '../template/footer.php' ?>