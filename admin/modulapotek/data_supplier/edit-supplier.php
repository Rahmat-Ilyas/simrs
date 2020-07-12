<?php 
session_start();

$_SESSION["judul"] = "Edit Supplier";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$supplier = mysqli_query($conn,"SELECT * from tb_supplier WHERE id=$id");

foreach ($supplier as $data) {
    $kd_supplier = $data["kd_supplier"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $telepon = $data["telepon"];
}

if (isset($_POST["submit"])) {
    $kd_supplier = $_POST["kd_supplier"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    $query= "UPDATE tb_supplier SET kd_supplier='$kd_supplier', nama='$nama', alamat='$alamat', telepon='$telepon' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data supplier berhasil diedit!');
        document.location.href='data-supplier.php';
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
                <li class="breadcrumb-item"><a href="#">Modul Apotek</a></li>
                <li class="breadcrumb-item"><a href="#">Data Supplier</a></li>
                <li class="breadcrumb-item active">Edit Supplier</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Supplier</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kode Supplier</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $kd_supplier ?>" name="kd_supplier">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Supplier</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $nama ?>" name="nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $alamat ?>" name="alamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Telepon</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $telepon ?>" name="telepon">
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