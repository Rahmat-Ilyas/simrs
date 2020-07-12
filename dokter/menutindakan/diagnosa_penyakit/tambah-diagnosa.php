<?php 
session_start();

$_SESSION["judul"] = "Tambah Data Diagnosa Penyakit";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
    $kd_penyakit = $_POST['kd_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $ciri_ciri = $_POST['ciri_ciri'];
    $keterangan = $_POST['keterangan'];
    $ciri_umum = $_POST['ciri_umum'];

    mysqli_query($conn, "INSERT INTO tb_diagnosa_penyakit VALUES ('', '$kd_penyakit', '$nama_penyakit', '$ciri_ciri', '$keterangan', '$ciri_umum')");

    if (mysqli_affected_rows($conn) > 0){
        header('location: data-diagnosa.php?notif=true');
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
                <li class="breadcrumb-item active">Data Tindakan</li>
                <li class="breadcrumb-item active">Tambah Data Diagnosa</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Data Diagnosa Penyakit</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Penyakit</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="kd_penyakit">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Penyakit</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_penyakit">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Ciri-Ciri</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="ciri_ciri"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keterangan</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="keterangan"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Ciri Umum</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="ciri_umum"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-diagnosa.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>