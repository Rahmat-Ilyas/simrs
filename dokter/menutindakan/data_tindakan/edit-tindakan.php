<?php 
session_start();

$_SESSION["judul"] = "Edit Data Tindakan";

if (!isset($_SESSION["login_dokter"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$tindakan = mysqli_query($conn,"SELECT * from tb_tindakan WHERE id=$id");

foreach ($tindakan as $data) {
    $kd_tindakan = $data['kd_tindakan'];
    $nama_tindakan = $data['nama_tindakan'];
    $tarif = $data['tarif'];
    $kategori = $data['kategori'];
    $poli = $data['poli'];
}

if (isset($_POST["submit"])) {
    $kd_tindakan = $_POST['kd_tindakan'];
    $nama_tindakan = $_POST['nama_tindakan'];
    $tarif = $_POST['tarif'];
    $kategori = $_POST['kategori'];
    $poli = $_POST['poli'];

    $query= "UPDATE tb_tindakan SET kd_tindakan='$kd_tindakan', nama_tindakan='$nama_tindakan', tarif='$tarif', kategori='$kategori', poli='$poli' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        header('location: data-tindakan.php?notif=true');
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
                <li class="breadcrumb-item active">Edit Data Tindakan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Data Tindakan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Tindakan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $kd_tindakan ?>" name="kd_tindakan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Tindakan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $nama_tindakan ?>" name="nama_tindakan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tarif</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $tarif ?>" name="tarif">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kategori Tindakan</label>
                                <div class="col-9">
                                    <select class="form-control" name="kategori">
                                        <option value="">---Pilih---</option>
                                        <?php 
                                            $data_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori_tindakan");
                                            foreach ($data_kategori as $ktg) :
                                        ?>
                                        <option value="<?= $ktg['nama_kategori'] ?>" <?php if ($ktg['nama_kategori'] == $kategori) echo "selected"; ?> ><?= $ktg['nama_kategori'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Poliklinik</label>
                                <div class="col-9">
                                    <select class="form-control" name="poli">
                                        <option value="">---Pilih---</option>
                                        <?php 
                                            $data_poli = mysqli_query($conn, "SELECT * FROM tb_poli");
                                            foreach ($data_poli as $dta) :
                                        ?>
                                        <option value="<?= $dta['nama_poli'] ?>" <?php if ($dta['nama_poli'] == $poli) echo "selected"; ?>><?= $dta['nama_poli'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-tindakan.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

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