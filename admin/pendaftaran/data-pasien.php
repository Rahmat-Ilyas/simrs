<?php 
session_start();

$_SESSION["judul"] = "Data Pasien";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");

if (isset($_POST["hapus"])) {
    $id = $_POST["id"];

    mysqli_query($conn,"DELETE FROM tb_pendaftaran WHERE id=$id");
    if (mysqli_affected_rows($conn)>0){
        header('location: data-pasien.php?notif=true');
        $_SESSION["notif"] = "Data pasien berhasil dihapus";

    }
    else {
        echo "<script>
        alert('Terjadi Kesalahan');
        </script>";
        echo mysqli_error($conn);
    }
}

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Dokter</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Data Pasien</b></h4><br>
            <a href="daftar-pasien.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Pendaftaran Pasien</a><br><br>

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
                        <th>No RM</th> 
                        <th>Nama Pasien</th>
                        <th>Tgl Lahir</th>
                        <th>Nama PJ</th>
                        <th>Tgl Masuk</th>
                        <th>Cara Masuk</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?= $dta["no_rm"]?></td>
                            <td><?= $dta["nama_pasien"]?></td>
                            <td><?= $dta["tggl_lahir"]?></td>
                            <td><?= $dta["pj"]?></td>
                            <td><?= $dta["tggl_masuk"]?></td>
                            <td><?= $dta["cara_masuk"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="edit-pasien.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="mdi mdi-table-edit"></i>&nbsp Edit</a>

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

<?php require '../../template/footer.php'; ?>