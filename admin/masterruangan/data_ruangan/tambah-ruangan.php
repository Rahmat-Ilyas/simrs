<?php 
session_start();

$_SESSION["judul"] = "Tambah Ruangan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
  tambah_ruangan($_POST);
}

require '../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Ruangan</a></li>
                <li class="breadcrumb-item active">Data Ruangan</li>
                <li class="breadcrumb-item active">Tambah Ruangan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Ruangan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Ruangan</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="nama_ruangan">
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
                                        <option value="<?= $kls["kelas"] ?>"><?= $kls["kelas"] ?></option>
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
                                        <option value="<?= $ktg["kategori"] ?>"><?= $ktg["kategori"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nomor Kamar</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="no_kamar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nomor Tempat Tidur</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="no_tt">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tarif</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="tarif">
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