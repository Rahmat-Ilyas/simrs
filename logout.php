<?php
	
	session_start();
	if ($_SESSION['login_admin'] == true) {
		setcookie('masuk_admin', '', time()-3600);
	}
	if ($_SESSION['login_dokter'] == true) {
		setcookie('masuk_dokter', '', time()-3600);
	}
	if ($_SESSION['login_staf'] == true) {
		setcookie('masuk_staf', '', time()-3600);
	}

	session_unset();
	session_destroy();
	$_SESSION = [];

	header("Location: login.php");
	exit();
?>