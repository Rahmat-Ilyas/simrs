<?php 
session_start();

$_SESSION["judul"] = "Edit Data Sub Pemeriksaan Laboratorium";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../../login.php");
    exit();
}
require '../../../../koneksi/koneksi.php';

$id_priksa = $_GET["id_priksa"];
$data = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan_lab WHERE id = $id_priksa");
$get_data = mysqli_fetch_assoc($data);

$id = $_GET["id"];
$sub_pemeriksaan = mysqli_query($conn,"SELECT * FROM tb_sub_pemeriksaan_lab WHERE id=$id");

foreach ($sub_pemeriksaan as $data) {
    $kd_sub_priksa = $data['kd_sub_priksa'];
    $nama_sub_priksa = $data['nama_sub_priksa'];
    $satuan = $data['satuan'];
    $nilai_rujukan = $data['nilai_rujukan'];
}

if (isset($_POST["submit"])) {
    $kd_sub_priksa = $_POST['kd_sub_priksa'];
    $nama_sub_priksa = $_POST['nama_sub_priksa'];
    $satuan = $_POST['satuan'];
    $nilai_rujukan = $_POST['nilai_rujukan'];

    $query= "UPDATE tb_sub_pemeriksaan_lab SET kd_sub_priksa='$kd_sub_priksa', nama_sub_priksa='$nama_sub_priksa', satuan='$satuan', nilai_rujukan='$nilai_rujukan' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        header('location: data-sub-pemeriksaan.php?id='.$id_priksa.'&notif=true');
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

require '../../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Menu Tindakan</a></li>
                <li class="breadcrumb-item active">Data Pemeriksaan</li>
                <li class="breadcrumb-item active">Data Sub Pemeriksaan</li>
                <li class="breadcrumb-item active">Edit Data Sub Pemeriksaan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Data Sub Pemeriksaan Laboratorium</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Sub Pemeriksaan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $kd_sub_priksa ?>" name="kd_sub_priksa" readonly>
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
                                    <input type="text" class="form-control" value="<?= $nama_sub_priksa ?>" name="nama_sub_priksa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Satuan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $satuan ?>" name="satuan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nilai Rujukan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $nilai_rujukan ?>" name="nilai_rujukan">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-sub-pemeriksaan.php?id=<?= $id_priksa ?>" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end card-box -->
</div><!-- end col -->
</div>

<?php require '../../../../template/footer.php'; ?>