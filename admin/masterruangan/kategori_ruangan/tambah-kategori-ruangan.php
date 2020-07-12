<?php 
session_start();

$_SESSION["judul"] = "Tambah Kategori Ruangan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
  tambah_kategori_ruangan($_POST);
}

require '../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Ruangan</a></li>
                <li class="breadcrumb-item active">Data Kategori Ruangan</li>
                <li class="breadcrumb-item active">Tambah Kategori Ruangan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Kategori Ruangan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Kategori</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="kategori">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="{{ url('/admin/donatur') }}" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>