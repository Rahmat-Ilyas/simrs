<?php
$conn = mysqli_connect("db4free.net", "rahmatilyas", "14-02-1998", "db_simrs");

//Tambah data dokter
function tambah_dokter($data)
{
	global $conn;
	$nama = $data["nama"];
	$spesialis = $data["spesialis"];
	$telepon = $data["telepon"];
	$status = $data["status"];

	$query = "INSERT INTO tb_dokter VALUES ('', '$nama', '$spesialis', '$telepon', '$status')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		// echo "<script>
		// alert('Data dokter berhasil ditambahkan!');
		// document.location.href = 'data-dokter.php';
		// </script>";

		header('location: data-dokter.php?notif=true');
		$_SESSION["notif"] = "Data berhasil ditambahkan";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
		exit();
	}
}

//Tambah data supplier
function tambah_supplier($data)
{
	global $conn;
	$kd_supplier = $data["kd_supplier"];
	$nama = $data["nama_supplier"];
	$alamat = $data["alamat"];
	$telepon = $data["telepon"];

	$query = "INSERT INTO tb_supplier VALUES ('', '$kd_supplier', '$nama', '$alamat', '$telepon')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data supplier berhasil ditambahkan!');
		document.location.href = 'data-supplier.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

//Tambah data paramedik
function tambah_paramedik($data)
{
	global $conn;
	$nama = $data["nama"];
	$spesialis = $data["spesialis"];
	$telepon = $data["telepon"];
	$status = $data["status"];

	$query = "INSERT INTO tb_paramedik VALUES ('', '$nama', '$spesialis', '$telepon', '$status')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data paramedik berhasil ditambahkan!');
		document.location.href = 'data-paramedik.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

//Tambah kategori ruangan
function tambah_kategori_ruangan($data)
{
	global $conn;
	$kategori = $data["kategori"];

	$query = "INSERT INTO tb_kategori_ruangan VALUES ('', '$kategori')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data kategori ruangan berhasil ditambahkan!');
		document.location.href = 'data-kategori-ruangan.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

//Tambah kelas ruangan
function tambah_kelas_ruangan($data)
{
	global $conn;
	$kelas = $data["kelas"];

	$query = "INSERT INTO tb_kelas_ruangan VALUES ('', '$kelas')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data kelas ruangan berhasil ditambahkan!');
		document.location.href = 'data-kelas-ruangan.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

//Tambah ruangan
function tambah_ruangan($data)
{
	global $conn;
	$nama_ruangan = $data["nama_ruangan"];
	$kelas = $data["kelas"];
	$kategori = $data["kategori"];
	$no_kamar = $data["no_kamar"];
	$no_tt = $data["no_tt"];
	$tarif = $data["tarif"];
	$status = $data["status"];

	$query = "INSERT INTO tb_ruangan VALUES ('', '$nama_ruangan', '$kelas', '$kategori', '$no_kamar', '$no_tt', '$tarif', '$status')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data ruangan berhasil ditambahkan!');
		document.location.href = 'data-ruangan.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
		exit();
	}
}
?>
