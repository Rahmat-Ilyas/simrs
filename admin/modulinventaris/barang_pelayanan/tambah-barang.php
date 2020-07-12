<?php 
session_start();

$_SESSION["judul"] = "Tambah Barang Pelayanan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

if (isset($_POST["submit"])){
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($conn, "INSERT INTO tb_barang_pelayanan VALUES ('', '$nama_barang', '$jumlah')");

    if (mysqli_affected_rows($conn) > 0){
        header('location: data-barang.php?notif=true');
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
                <li class="breadcrumb-item"><a href="#">Modul Inventaris</a></li>
                <li class="breadcrumb-item active">Data Barang Pelayanan</li>
                <li class="breadcrumb-item active">Tambah Barang</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Barang Pelayanan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Barang</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_barang">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jumlah</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="jumlah">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-barang.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>