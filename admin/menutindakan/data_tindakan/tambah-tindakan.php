<?php 
session_start();

$_SESSION["judul"] = "Tambah Data Tindakan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
    $kd_tindakan = $_POST['kd_tindakan'];
    $nama_tindakan = $_POST['nama_tindakan'];
    $tarif = $_POST['tarif'];
    $kategori = $_POST['kategori'];
    $poli = $_POST['poli'];

    mysqli_query($conn, "INSERT INTO tb_tindakan VALUES ('', '$kd_tindakan', '$nama_tindakan', '$tarif', '$kategori', '$poli')");

    if (mysqli_affected_rows($conn) > 0){
        header('location: data-tindakan.php?notif=true');
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
                <li class="breadcrumb-item active">Tambah Data Tindakan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Data Tindakan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Tindakan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="kd_tindakan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Tindakan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_tindakan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tarif</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="tarif">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kategori Tindakan</label>
                                <div class="col-9">
                                    <select class="form-control" name="kategori">
                                        <option value="">---Pilih---</option>
                                        <?php 
                                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori_tindakan");
                                            foreach ($kategori as $ktg) :
                                        ?>
                                        <option value="<?= $ktg['nama_kategori'] ?>"><?= $ktg['nama_kategori'] ?></option>
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
                                            $poli = mysqli_query($conn, "SELECT * FROM tb_poli");
                                            foreach ($poli as $dta) :
                                        ?>
                                        <option value="<?= $dta['nama_poli'] ?>"><?= $dta['nama_poli'] ?></option>
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
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>