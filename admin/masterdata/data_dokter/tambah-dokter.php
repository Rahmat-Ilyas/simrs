<?php 
session_start();

$_SESSION["judul"] = "Tambah Dokter";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
  tambah_dokter($_POST);
}

require '../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Dokter</li>
                <li class="breadcrumb-item active">Tambah Dokter</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Dokter</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Dokter</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Spesialis</label>
                                <div class="col-10">
                                    <select class="form-control" name="spesialis">
                                        <option value="aktif">spesialis jantung</option>
                                        <option value="spesialis hati">spesialis hati</option>
                                        <option value="spesialis mata">spesialis mata</option>
                                        <option value="spesialis tulang">spesialis tulang</option>
                                        <option value="spesialis jiwa">spesialis jiwa</option>
                                        <option value="spesialis kulit">spesialis kulit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Telepon</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="telepon">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Status</label>
                                <div class="col-10">
                                    <select class="form-control" name="status">
                                        <option value="aktif">aktif</option>
                                        <option value="tidak aktif">tidak aktif</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="tambah-dokter.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>