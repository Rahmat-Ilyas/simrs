<?php 
session_start();

$_SESSION["judul"] = "Data Ruangan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_ruangan");

if (isset($_POST["hapus"])) {
    $id = $_POST["id"];

    mysqli_query($conn,"DELETE FROM tb_ruangan WHERE id=$id");
    if (mysqli_affected_rows($conn)>0){
        // echo "<script>
        // alert('Data ruangan berhasil dihapus!');
        // document.location.href='data-ruangan.php';
        // </script>";

        header('location: data-ruangan.php?notif=true');
        $_SESSION["notif"] = "Data berhasil dihapus";

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
                <li class="breadcrumb-item"><a href="#">Master Ruangan</a></li>
                <li class="breadcrumb-item active">Data Ruangan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Data Ruangan</b></h4><br>
            <a href="tambah-ruangan.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Ruangan</a><br><br>
            
            <?php if (isset($_GET["notif"])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <?= $_SESSION["notif"] ?>
                </div>
            <?php endif; ?>

            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Ruangan</th>
                        <th>Kelas</th>
                        <th>Kategori</th>
                        <th>No Kamar</th>
                        <th>No T. Tidur</th>
                        <th>Tarif</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?= $dta["nama_ruangan"]?></td>
                            <td><?= $dta["kelas"]?></td>
                            <td><?= $dta["kategori"]?></td>
                            <td><?= $dta["no_kamar"]?></td>
                            <td><?= $dta["no_tt"]?></td>
                            <td><?= $dta["tarif"]?></td>
                            <td><?= $dta["status"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="edit-ruangan.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="mdi mdi-table-edit"></i>&nbsp Edit</a>

                                <button class="btn btn-danger waves-light waves-effect" type="button" data-toggle="modal" data-target="#staticModal<?= $dta['id'] ?>"><i class="mdi mdi-delete"></i>&nbsp Hapus</button>
                            </td>
                        </tr>

                        <!-- Konfirmasi Hapus -->
                        <div class="modal fade" id="staticModal<?= $dta['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticModalLabel">Hapus Data</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form method="POST">
                                         <input type="hidden" name="id" value="<?= $dta["id"]?>">
                                         <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Konfirmasi Hapus -->

                 <?php endforeach; ?>
             </tbody>
         </table>
     </div>
 </div>
</div>

<?php require '../../../template/footer.php'; ?>