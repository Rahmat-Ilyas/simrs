 <?php 
 if (!isset($_SESSION["login_dokter"]))
 {
 	header("location: ../../login.php");
 	exit();
 }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8" />
 	<title><?= $_SESSION["judul"]; ?></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
 	<meta content="Coderthemes" name="author" />
 	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

 	<!-- App favicon -->
 	<link rel="shortcut icon" href="/medik_rev/asset/images/favicon_uin.ico">

 	<link href="/medik_rev/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

 	<!-- DataTables -->
 	<link href="/medik_rev/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 	<link href="/medik_rev/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 	<!-- Responsive datatable examples -->
 	<link href="/medik_rev/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

 	<!-- Plugins css-->
 	<link href="/medik_rev/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
 	<link href="/medik_rev/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
 	<link href="/medik_rev/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
 	<link href="/medik_rev/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
 	<link rel="stylesheet" href="/medik_rev/plugins/switchery/switchery.min.css">

 	<!-- App css -->
 	<link href="/medik_rev/asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 	<link href="/medik_rev/asset/css/icons.css" rel="stylesheet" type="text/css" />
 	<link href="/medik_rev/asset/css/metismenu.min.css" rel="stylesheet" type="text/css" />
 	<link href="/medik_rev/asset/css/style.css" rel="stylesheet" type="text/css" />

 	<script src="/medik_rev/asset/js/modernizr.min.js"></script>

 </head>


 <body>

 	<!-- Begin page -->
 	<div id="wrapper">

 		<!-- Top Bar Start -->
 		<div class="topbar">

 			<!-- LOGO -->
 			<div class="topbar-left">
 				<a href="index.html" class="logo">
 					<span>
 						<img src="/medik_rev/asset/images/logo_uin.png" alt="" height="50">
 					</span>
 					<i>
 						<img src="/medik_rev/asset/images/logo_sm.png" alt="" height="50">
 					</i>
 				</a>
 			</div>

 			<nav class="navbar-custom">

 				<ul class="list-unstyled topbar-right-menu float-right mb-0">


 					<li class="dropdown notification-list">
 						<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
 						aria-haspopup="false" aria-expanded="false">
 						<img src="/medik_rev/asset/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1">Admin <i class="mdi mdi-chevron-down"></i> </span>
 					</a>
 					<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
 						<!-- item-->
 						<div class="dropdown-item noti-title">
 							<h6 class="text-overflow m-0">Selamat datang</h6>
 						</div>

 						<!-- item-->
 						<a href="javascript:void(0);" class="dropdown-item notify-item">
 							<i class="fi-head"></i> <span>My Account</span>
 						</a>

 						<!-- item-->
 						<a href="javascript:void(0);" class="dropdown-item notify-item">
 							<i class="fi-cog"></i> <span>Settings</span>
 						</a>

 						<!-- item-->
 						<a href="/medik_rev/logout.php" class="dropdown-item notify-item">
 							<i class="fi-power"></i> <span>Logout</span>
 						</a>

 					</div>
 				</li>

 			</ul>

 			<ul class="list-inline menu-left mb-0">
 				<li class="float-left">
 					<button class="button-menu-mobile open-left waves-light waves-effect">
 						<i class="dripicons-menu"></i>
 					</button>
 				</li>
 				<li class="hide-phone app-search">
 					<form role="search" class="">
 						<input type="text" placeholder="Search..." class="form-control">
 						<a href=""><i class="fa fa-search"></i></a>
 					</form>
 				</li>
 			</ul>

 		</nav>

 	</div>
 	<!-- Top Bar End -->


 	<!-- ========== Left Sidebar Start ========== -->
 	<div class="left side-menu">
 		<div class="slimscroll-menu" id="remove-scroll">

 			<!--- Sidemenu -->
 			<div id="sidebar-menu">
 				<!-- Left Menu Start -->
 				<ul class="metismenu" id="side-menu">
 					<li>
 						<a href="/medik_rev/dokter/">
 							<i class="fi-air-play"></i><span> Dashboard </span>
 						</a>
 					</li>
 					<li>
 						<a href="#"><i class="fi-layers"></i>Master Data<span class="menu-arrow"></span></a>
 						<ul class="nav-second-level" aria-expanded="false">
 							<li>
 								<a href="/medik_rev/dokter/masterdata/data_dokter/data-dokter.php">Data Dokter</a>
 							</li>
 							<li>
 								<a href="/medik_rev/dokter/masterdata/data_paramedik/data-paramedik.php"></i>Data Paramedik</a>
 							</li>
 							<li>
 								<a href="/medik_rev/dokter/masterdata/data_poli/data-poli.php"></i>Data Poliklinik</a>
 							</li>
 						</ul>
 					</li>
 					<li>
 						<a href="#"><i class="fa fa-hospital-o"></i>Master Ruangan<span class="menu-arrow"></a>
 							<ul class="nav-second-level" aria-expanded="false">
 								<li>
 									<a href="/medik_rev/dokter/masterruangan/kategori_ruangan/data-kategori-ruangan.php">Kategori Ruangan</a>
 								</li>
 								<li>
 									<a href="/medik_rev/dokter/masterruangan/kelas_ruangan/data-kelas-ruangan.php">Kelas Ruangan</a>
 								</li>
 								<li>
 									<a href="/medik_rev/dokter/masterruangan/data_ruangan/data-ruangan.php">Ruangan dan Tarif</a>
 								</li>
 							</ul>
 						</li>
 						<li>
 							<a href="/medik_rev/dokter/pendaftaran/data-pasien.php"><i class="mdi mdi-account-edit"></i>Form Pendaftaran</a>
 						</li>
 						<li>
 							<a href="#"><i class="fa fa-cart-plus"></i>Modul Apotik<span class="menu-arrow"></span></a>
 							<ul class="nav-second-level" aria-expanded="false">
 								<li>
 									<a href="/medik_rev/dokter/modulapotek/obat_alkes/data-obatdanalkes.php">Data Obat dan Alkes</a>
 								</li> 
 								<li>
 									<a href="/medik_rev/dokter/modulapotek/laporan_pengadaan/data-laporan.php">Laporan Pengadaan Obat</a>
 								</li>
 								<li>
 									<a href="/medik_rev/dokter/modulapotek/data_supplier/data-supplier.php">Data Supplier</a>
 								</li>
 							</ul>
 						</li>
 						<li>
 							<a href="#"><i class="mdi mdi-cube-outline"></i>Modul Inventaris<span class="menu-arrow"></span></a>
 							<ul class="nav-second-level" aria-expanded="false">
 								<li>
 									<a href="/medik_rev/dokter/modulinventaris/barang_pelayanan/data-barang.php">Barang Pelayanan</a>
 								</li> 
 								<li>
 									<a href="/medik_rev/dokter/modulinventaris/barang_kantor/data-barang.php">Barang Kantor</a>
 								</li>
 							</ul>
 						</li>
 						<li>
 							<a href="#"><i class="fa fa-stethoscope"></i>Menu Tindakan<span class="menu-arrow"></span></a>
 							<ul class="nav-second-level" aria-expanded="false">
 								<li>
 									<a href="/medik_rev/dokter/menutindakan/kategori_tindakan/data-kategori.php">Data Kategori Tindakan</a>
 								</li>
 								<li>
 									<a href="/medik_rev/dokter/menutindakan/data_tindakan/data-tindakan.php">Data Tindakan</a>
 								</li>
 								<li>
 									<a href="/medik_rev/dokter/menutindakan/diagnosa_penyakit/data-diagnosa.php">Data Diagnosa Penyakit</a>
 								</li>
 								<li>
 									<a href="/medik_rev/dokter/menutindakan/pemeriksaan_lab/data-pemeriksaan.php">Data Pemeriksaan Laboratorium</a>
 								</li>
 							</ul>
 						</li>
 					</ul>

 				</div>
 				<!-- Sidebar -->
 				<div class="clearfix"></div>

 			</div>
 			<!-- Sidebar -left -->

 		</div>
 		<!-- Left Sidebar End -->



 		<!-- ============================================================== -->
 		<!-- Start right Content here -->
 		<!-- ============================================================== -->
 		<div class="content-page">
 			<!-- Start content -->
 			<div class="content">
 				<div class="container-fluid">
