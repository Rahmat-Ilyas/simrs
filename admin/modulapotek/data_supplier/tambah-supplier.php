<?php 
session_start();

$_SESSION["judul"] = "Tambah Supplier";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
  tambah_supplier($_POST);
}

require '../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Modul Apotek</a></li>
                <li class="breadcrumb-item"><a href="#">Data Supplier</a></li>
                <li class="breadcrumb-item active">Tambah Supplier</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Supplier</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kode Supplier</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="kd_supplier">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Supplier</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="nama_supplier">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="alamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Telepon</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="telepon">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-supplier.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>