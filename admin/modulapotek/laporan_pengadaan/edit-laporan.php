<?php 
session_start();

$_SESSION["judul"] = "Edit Laporan Pengadaan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$data_laporan = mysqli_query($conn,"SELECT * from tb_laporan_pengadaan WHERE id=$id");

foreach ($data_laporan as $data) {
    $kd_obat = $data['kd_obat'];
    $nama_obat = $data['nama_obat'];
    $harga_beli = $data['harga_beli'];
    $harga_jual = $data['harga_jual'];
    $stok = $data['stok'];
    $tggl_kadaluarsa = $data['tggl_kadaluarsa'];
}

if (isset($_POST["submit"])) {
    $kd_obat = $_POST['kd_obat'];
    $nama_obat = $_POST['nama_obat'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $tggl_kadaluarsa = $_POST['tggl_kadaluarsa'];

    $query= "UPDATE tb_laporan_pengadaan SET kd_obat='$kd_obat', nama_obat='$nama_obat', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok', tggl_kadaluarsa='$tggl_kadaluarsa' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        header('location: data-laporan.php?notif=true');
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
                <li class="breadcrumb-item"><a href="#">Modul Apotek</a></li>
                <li class="breadcrumb-item active">Laporan Pengadaan Obat</li>
                <li class="breadcrumb-item active">Edit Laporan Pengadaan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Laporan Pengadaan Obat</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Obat</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $kd_obat ?>" name="kd_obat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Obat</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $nama_obat ?>" name="nama_obat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Harga Beli</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $harga_beli ?>" name="harga_beli">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Harga Jual</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $harga_jual ?>" name="harga_jual">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Stok</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $stok ?>" name="stok">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Kadaluarsa</label>
                                <div class="col-9">
                                    <input type="date" class="form-control" value="<?= $tggl_kadaluarsa ?>" name="tggl_kadaluarsa">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-laporan.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>