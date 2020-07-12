<?php 
session_start();

$_SESSION["judul"] = "Edit Paramedik";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$paramedik = mysqli_query($conn,"SELECT * from tb_paramedik WHERE id=$id");

foreach ($paramedik as $data) {
    $nama = $data["nama"];
    $spesialis = $data["spesialis"];
    $telepon = $data["telepon"];
    $status = $data["status"];
}

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $spesialis = $_POST["spesialis"];
    $telepon = $_POST["telepon"];
    $status = $_POST["status"];

    $query= "UPDATE tb_paramedik SET nama='$nama', spesialis='$spesialis', telepon='$telepon', status='$status' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data paramedik berhasil diedit!');
        document.location.href='data-paramedik.php';
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
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Paramedik</li>
                <li class="breadcrumb-item active">Edit Paramedik</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Paramedik</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Dokter</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $nama ?>" name="nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Spesialis</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $spesialis ?>" name="spesialis">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Telepon</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $telepon ?>" name="telepon">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Status</label>
                                <div class="col-10">
                                    <select class="form-control" name="status">
                                        <?php 
                                            $data_status = ["aktif", "tidak aktif"];
                                            foreach ($data_status as $sts) :
                                        ?> 
                                            <option value="<?= $sts ?>"

                                             <?php if ($sts == $status) echo "selected"; ?>

                                             >
                                                <?= $sts ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-paramedik.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>