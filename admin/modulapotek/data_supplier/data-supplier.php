<?php 
session_start();

$_SESSION["judul"] = "Data Supplier";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_supplier");

if (isset($_POST["hapus"])) {
    $id = $_POST["id"];

    mysqli_query($conn,"DELETE FROM tb_supplier WHERE id=$id");
    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data supplier berhasil dihapus!');
        document.location.href='data-supplier.php';
        </script>";

    }
    else {
        echo "<script>
        alert('Terjadi Kesalahan');
        </script>";
        echo mysqli_error($conn);
    }
}

require '../../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Modul Apotek</a></li>
                <li class="breadcrumb-item active">Data Supplier</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Data Supplier</b></h4><br>
            <a href="tambah-supplier.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Supplier</a><br><br>

            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?= $dta["kd_supplier"]?></td>
                            <td><?= $dta["nama"]?></td>
                            <td><?= $dta["alamat"]?></td>
                            <td><?= $dta["telepon"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <form method="POST">
                                    <a href="edit-supplier.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="mdi mdi-table-edit"></i>&nbsp Edit</a>

                                    <input type="hidden" name="id" value="<?= $dta["id"]?>">
                                    <button class="btn btn-danger waves-light waves-effect" id="sa-success" name="hapus" type="submit"><i class="mdi mdi-delete"></i>&nbsp Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../../../template/footer.php'; ?>