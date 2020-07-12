<?php 
session_start();

$_SESSION["judul"] = "Edit Ruangan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$ruangan = mysqli_query($conn,"SELECT * from tb_ruangan WHERE id=$id");

foreach ($ruangan as $data) {
    $nama_ruangan = $data["nama_ruangan"];
    $kelas = $data["kelas"];
    $kategori = $data["kategori"];
    $no_kamar = $data["no_kamar"];
    $no_tt = $data["no_tt"];
    $tarif = $data["tarif"];
    $status = $data["status"];
}

if (isset($_POST["submit"])) {
    $nama_ruangan = $_POST["nama_ruangan"];
    $kelas = $_POST["kelas"];
    $kategori = $_POST["kategori"];
    $no_kamar = $_POST["no_kamar"];
    $no_tt = $_POST["no_tt"];
    $tarif = $_POST["tarif"];
    $status = $_POST["status"];

    $query= "UPDATE tb_ruangan SET nama_ruangan='$nama_ruangan', kelas='$kelas', kategori='$kategori', no_kamar='$no_kamar', no_tt='$no_tt', tarif='$tarif', status='$status' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data ruangan berhasil diedit!');
        document.location.href='data-ruangan.php';
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
                <li class="breadcrumb-item active">Data Ruangan</li>
                <li class="breadcrumb-item active">Edit Ruangan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Ruangan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Ruangan</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $nama_ruangan ?>" name="nama_ruangan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kelas</label>
                                <div class="col-10">
                                    <select class="form-control" name="kelas">
                                        <?php 
                                            $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas_ruangan");
                                            foreach ($kelas as $kls) :
                                        ?>
                                        <option value="<?= $kls["kelas"] ?>" <?php if ($kls["kelas"] == $kelas) echo "selected"; ?>
                                        ><?= $kls["kelas"] ?> 
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kategori</label>
                                <div class="col-10">
                                    <select class="form-control" name="kategori">
                                        <?php 
                                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori_ruangan");
                                            foreach ($kategori as $ktg) :
                                        ?>
                                        <option value="<?= $ktg["kategori"] ?>" <?php if ($ktg["kategori"] == $kategori) echo "selected"; ?>

                                        ><?= $ktg["kategori"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nomor Kamar</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $no_kamar ?>" name="no_kamar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nomor TT</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $no_tt ?>" name="no_tt">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tarif</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $tarif ?>" name="tarif">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Status</label>
                                <div class="col-10">
                                    <select class="form-control" name="status">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Penuh">Penuh</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-ruangan.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>