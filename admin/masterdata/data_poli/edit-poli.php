<?php 
session_start();

$_SESSION["judul"] = "Edit Poliklinik";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$dokter = mysqli_query($conn,"SELECT * from tb_poli WHERE id=$id");

foreach ($dokter as $data) {
    $nama_poli = $data["nama_poli"];
    $dokter = $data["dokter"];
}

if (isset($_POST["submit"])) {
    $nama_poli = $_POST["nama_poli"];
    $dokter = $_POST["dokter"];

    $query= "UPDATE tb_poli SET nama_poli='$nama_poli', dokter='$dokter' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data poli berhasil diedit!');
        document.location.href='data-poli.php';
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
                <li class="breadcrumb-item active">Data Poliklinik</li>
                <li class="breadcrumb-item active">Edit Poliklinik</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Poliklinik</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Poliklinik</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $nama_poli ?>" name="nama_poli">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dokter</label>
                                <div class="col-9">
                                    <select class="form-control select2" name="dokter" required>
                                        <option value="">Pilih Dokter</option>
                                        <optgroup label="Daftar Data Dokter">
                                            <?php 
                                            $dt_dokter = mysqli_query($conn, "SELECT * FROM tb_dokter");
                                            foreach ($dt_dokter as $dr) :
                                                ?>
                                                <option value="<?= $dr['nama'] ?>" <?php if ($dr['nama'] == $dokter) echo "selected"; ?> ><?= $dr['nama'] ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                        <a href="data-dokter.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                    </form>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div> <!-- end card-box -->
</div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>