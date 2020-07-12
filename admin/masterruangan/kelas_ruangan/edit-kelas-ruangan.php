<?php 
session_start();

$_SESSION["judul"] = "Edit Kelas Ruangan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$data = mysqli_query($conn,"SELECT * from tb_kelas_ruangan WHERE id=$id");

foreach ($data as $dta) {
    $kelas = $dta["kelas"];
}

if (isset($_POST["submit"])) {
    $kelas = $_POST["kelas"];

    $query= "UPDATE tb_kelas_ruangan SET kelas='$kelas' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data kelas ruangan berhasil diedit!');
        document.location.href='data-kelas-ruangan.php';
        </script>";
    }
    else {
        echo "<script>
        alert('Gagal diedit!');
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
                <li class="breadcrumb-item"><a href="#">Master Ruangan</a></li>
                <li class="breadcrumb-item active">Data Kelas Ruangan</li>
                <li class="breadcrumb-item active">Edit Kelas Ruangan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Kelas Ruangan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Kelas</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $kelas ?>" name="kelas">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-kelas-ruangan.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>