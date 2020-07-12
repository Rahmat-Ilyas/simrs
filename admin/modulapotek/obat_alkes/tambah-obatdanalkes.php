<?php 
session_start();

$_SESSION["judul"] = "Tambah Obat dan Alat Kesehatan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../../login.php");
    exit();
}
require '../../../koneksi/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM tb_obat_dan_alkes ORDER BY id DESC");
$id = mysqli_fetch_assoc($data);
$no = $id['id']+1;
$kd_brg = "BRG-".$no;

if (isset($_POST["submit"])){
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

  $query = "INSERT INTO tb_obat_dan_alkes VALUES ('', '$kd_barang', '$nama_barang', '$keterangan', '$jenis', '$harga', '$stok', '$status', '$tggl_kadaluarsa', '$no_rak', '$nama_supplier')";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0){
        header('location: data-obatdanalkes.php?notif=true');
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
                <li class="breadcrumb-item"><a href="#">Modul Apotek</a></li>
                <li class="breadcrumb-item"><a href="#">Data Obat dan Alat Kesehatan</a></li>
                <li class="breadcrumb-item active">Tambah Obat dan Alkes</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Tambah Obat dan Alat Kesehatan</h4><br>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Kode Barang</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= $kd_brg ?>" name="kd_barang" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Barang</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_barang">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keterangan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="keterangan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jenis Barang</label>
                                <div class="col-9">
                                    <select class="form-control" name="jenis">
                                        <option value="Tablet">Tablet</option>
                                        <option value="Kapsul">Kapsul</option>
                                        <option value="Sachet">Sachet</option>
                                        <option value="Botol">Botol</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Harga</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="harga">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Stok</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="stok">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Status</label>
                                <div class="col-9">
                                    <select class="form-control" name="status">
                                        <option value="tersedia">tersedia</option>
                                        <option value="tidak tersedia">tidak tersedia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Kadaluarsa</label>
                                <div class="col-9">
                                    <input type="date" class="form-control" value="" name="tggl_kadaluarsa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nomor Rak</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="no_rak">
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
                                            <option value="<?= $sup['nama'] ?>"><?= $sup['nama'] ?></option>
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