<?php 
session_start();

$_SESSION["judul"] = "Tambah Data Pemeriksaan Laboratorium";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
    $kd_priksa = $_POST['kd_priksa'];
    $nama_priksa = $_POST['nama_priksa'];
    $tarif = $_POST['tarif'];

    mysqli_query($conn, "INSERT INTO tb_pemeriksaan_lab VALUES ('', '$kd_priksa', '$nama_priksa', '$tarif')");

    if (mysqli_affected_rows($conn) > 0){
        header('location: data-pemeriksaan.php?notif=true');
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

require '../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Menu Tindakan</a></li>
                <li class="breadcrumb-item active">Data Pemeriksaan</li>
                <li class="breadcrumb-item active">Tambah Data Pemeriksaan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Data Pemeriksaan Laboratorium</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Pemeriksaan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="kd_priksa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Pemeriksaan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_priksa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tarif</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="tarif">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-pemeriksaan.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>