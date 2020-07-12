<?php 
session_start();

$_SESSION["judul"] = "Data Diagnosa Penyakit";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_diagnosa_penyakit");

if (isset($_POST["hapus"])) {
    $id = $_POST["id"];

    mysqli_query($conn,"DELETE FROM tb_diagnosa_penyakit WHERE id=$id");
    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data diagnosa penyakit berhasil dihapus!');
        document.location.href='data-diagnosa.php';
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
                <li class="breadcrumb-item"><a href="#">Menu Tindakan</a></li>
                <li class="breadcrumb-item active">Data Diagnosa Penyakit</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Data Diagnosa Penyakit</b></h4><br>
            <a href="tambah-diagnosa.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Diagnosa</a><br><br>

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
                        <th>No</th>
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Ciri-Ciri</th>
                        <th>Keterangan</th>
                        <th>Ciri Umum</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php $no = 1; foreach ($data as $dta) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $dta["kd_penyakit"]?></td>
                            <td><?= $dta["nama_penyakit"]?></td>
                            <td><?= $dta["ciri_ciri"]?></td>
                            <td><?= $dta["keterangan"]?></td>
                            <td><?= $dta["ciri_umum"]?></td>
                            <td class="text-center" style="min-width: 170px;">
                                <a href="edit-diagnosa.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="mdi mdi-table-edit"></i>&nbsp Edit</a>

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

                   <?php $no = $no + 1; endforeach; ?>
               </tbody>
           </table>
       </div>
   </div>
</div>

<?php require '../../../template/footer.php'; ?>