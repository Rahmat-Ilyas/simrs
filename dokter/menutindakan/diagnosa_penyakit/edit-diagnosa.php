<?php 
session_start();

$_SESSION["judul"] = "Edit Data Diagnosa Penyakit";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$diagnosa = mysqli_query($conn,"SELECT * from tb_diagnosa_penyakit WHERE id=$id");

foreach ($diagnosa as $data) {
    $kd_penyakit = $data['kd_penyakit'];
    $nama_penyakit = $data['nama_penyakit'];
    $ciri_ciri = $data['ciri_ciri'];
    $keterangan = $data['keterangan'];
    $ciri_umum = $data['ciri_umum'];
}

if (isset($_POST["submit"])) {
    $kd_penyakit = $_POST['kd_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $ciri_ciri = $_POST['ciri_ciri'];
    $keterangan = $_POST['keterangan'];
    $ciri_umum = $_POST['ciri_umum'];

    $query= "UPDATE tb_diagnosa_penyakit SET kd_penyakit='$kd_penyakit', nama_penyakit='$nama_penyakit', ciri_ciri='$ciri_ciri', keterangan='$keterangan', ciri_umum='$ciri_umum' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        header('location: data-diagnosa.php?notif=true');
        $_SESSION["notif"] = "Data berhasil diedit";
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
                <li class="breadcrumb-item"><a href="#">Menu Tindakan</a></li>
                <li class="breadcrumb-item active">Data Tindakan</li>
                <li class="breadcrumb-item active">Edit Data Diagnosa</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Data Diagnosa Penyakit</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Penyakit</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $kd_penyakit ?>" name="kd_penyakit">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Penyakit</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $nama_penyakit ?>" name="nama_penyakit">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Ciri-Ciri</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="ciri_ciri"><?= $ciri_ciri ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keterangan</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="keterangan"><?= $keterangan ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Ciri Umum</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="ciri_umum"><?= $ciri_umum ?></textarea>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-diagnosa.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end card-box -->
</div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>