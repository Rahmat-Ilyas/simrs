<?php 
session_start();

$_SESSION["judul"] = "Tambah Data Sub Pemeriksaan Laboratorium";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../../login.php");
    exit();
}
require '../../../../koneksi/koneksi.php';

$id_priksa = $_GET["id_priksa"];
$data = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan_lab WHERE id = $id_priksa");
$get_data = mysqli_fetch_assoc($data);

$data_id = mysqli_query($conn, "SELECT * FROM tb_sub_pemeriksaan_lab ORDER BY id DESC");
$no_reg = mysqli_fetch_assoc($data_id);
$get_id = $no_reg['id'];

if (isset($_POST["submit"])){
    $kd_sub_priksa = $_POST['kd_sub_priksa'];
    $nama_sub_priksa = $_POST['nama_sub_priksa'];
    $satuan = $_POST['satuan'];
    $nilai_rujukan = $_POST['nilai_rujukan'];

    mysqli_query($conn, "INSERT INTO tb_sub_pemeriksaan_lab VALUES ('', '$id_priksa', '$kd_sub_priksa', '$nama_sub_priksa', '$satuan', '$nilai_rujukan')");

    if (mysqli_affected_rows($conn) > 0){
        header('location: data-sub-pemeriksaan.php?id='.$id_priksa.'&notif=true');
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

require '../../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Menu Tindakan</a></li>
                <li class="breadcrumb-item active">Data Pemeriksaan</li>
                <li class="breadcrumb-item active">Data Sub Pemeriksaan</li>
                <li class="breadcrumb-item active">Tambah Data Sub Pemeriksaan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Data Sub Pemeriksaan Laboratorium</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Sub Pemeriksaan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $get_data['kd_priksa'].sprintf('%04s', $get_id) ?>" name="kd_sub_priksa" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Pemeriksaan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $get_data['nama_priksa'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Sub Pemeriksaan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_sub_priksa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Satuan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="satuan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nilai Rujukan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nilai_rujukan">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-sub-pemeriksaan.php?id=<?= $id_priksa ?>" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../../template/footer.php'; ?>