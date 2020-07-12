<?php 
session_start();

$_SESSION["judul"] = "Edit Obat dan Alkes";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$id = $_GET["id"];
$data_obat = mysqli_query($conn,"SELECT * from tb_obat_dan_alkes WHERE id=$id");

foreach ($data_obat as $data) {
    $kd_barang = $data["kd_barang"];
    $nama_barang = $data["nama_barang"];
    $keterangan = $data["keterangan"];
    $jenis = $data["jenis"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $status = $data["status"];
    $tggl_kadaluarsa = $data["tggl_kadaluarsa"];
    $no_rak = $data["no_rak"];
    $nama_supplier = $data["nama_supplier"];
}

if (isset($_POST["submit"])) {
    $kd_barang = $_POST["kd_barang"];
    $nama_barang = $_POST["nama_barang"];
    $keterangan = $_POST["keterangan"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $status = $_POST["status"];
    $tggl_kadaluarsa = $_POST["tggl_kadaluarsa"];
    $no_rak = $_POST["no_rak"];
    $nama_supplier = $_POST["nama_supplier"];

    $query= "UPDATE tb_obat_dan_alkes SET kd_barang='$kd_barang', nama_barang='$nama_barang', keterangan='$keterangan', jenis='$jenis', harga='$harga', stok='$stok', status='$status', tggl_kadaluarsa='$tggl_kadaluarsa', no_rak='$no_rak', nama_supplier='$nama_supplier' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        header('location: data-obatdanalkes.php?notif=true');
        $_SESSION["notif"] = "Data berhasil diedit";
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
                <li class="breadcrumb-item"><a href="#">Data Obat dan Alat Kesehatan</a></li>
                <li class="breadcrumb-item active">Edit Obat dan Alkes</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Edit Obat dan Alkes</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Barang</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $kd_barang ?>" name="kd_barang" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Barang</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $nama_barang ?>" name="nama_barang">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keterangan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $keterangan ?>" name="keterangan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jenis Barang</label>
                                <div class="col-9">
                                    <select class="form-control" name="jenis">
                                         <?php 
                                            $data_jenis = ["Tablet", "Kapsul", "Sachet", "Botol", "Lainnya"];
                                            foreach ($data_jenis as $jns) :
                                        ?> 
                                            <option value="<?= $jns ?>"

                                             <?php if ($jns == $jenis) echo "selected"; ?>

                                             >
                                                <?= $jns ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Harga</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $harga ?>" name="harga">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Stok</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $stok ?>" name="stok">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Status</label>
                                <div class="col-9">
                                     <select class="form-control" name="status">
                                        <?php 
                                            $data_status = ["tersedia", "tidak tersedia"];
                                            foreach ($data_status as $sts) :
                                        ?> 
                                            <option value="<?= $sts ?>"

                                             <?php if ($sts == $status) echo "selected"; ?>

                                             >
                                                <?= $sts ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Kadaluarsa</label>
                                <div class="col-9">
                                    <input type="date" class="form-control" value="<?= $tggl_kadaluarsa ?>" name="tggl_kadaluarsa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nomor Rak</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $no_rak ?>" name="no_rak">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Supplier</label>
                                <div class="col-9">
                                    <select class="form-control select2" name="nama_supplier" required>
                                        <option value="">Pilih Supplier</option>
                                        <optgroup label="Daftar Data Supplier">
                                            <?php 
                                            $supplier = mysqli_query($conn, "SELECT * FROM tb_supplier");
                                            foreach ($supplier as $sup) :
                                                ?>
                                                <option value="<?= $sup['nama'] ?>"  <?php if ($sup['nama'] == $nama_supplier) echo "selected"; ?> ><?= $sup['nama'] ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-obatdanalkes.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../../template/footer.php'; ?>