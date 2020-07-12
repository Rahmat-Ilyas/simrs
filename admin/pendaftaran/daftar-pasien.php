<?php 
session_start();

$_SESSION["judul"] = "Registrasi Pasien";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';

//nomor regis
$data = mysqli_query($conn, "SELECT * FROM tb_pendaftaran ORDER BY id DESC");
$no = mysqli_fetch_assoc($data);
$no_reg = $no['no_registrasi']+1;
$no_rwt = $no['no_rawat']+1;

//tanggal
$date = date("Y-m-d");

if (isset($_POST["submit"])){
  $no_registrasi = $_POST['no_registrasi'];
  $no_rawat = $_POST['no_rawat'];
  $tggl_masuk = $_POST['tggl_masuk'];
  $cara_masuk = $_POST['cara_masuk'];
  $ruang_rawat = $_POST['ruang_rawat'];
  $poli_tujuan = $_POST['poli_tujuan'];
  $dokter_pj = $_POST['dokter_pj'];
  $jenis_bayar = $_POST['jenis_bayar'];
  $asal_rujukan = $_POST['asal_rujukan'];
  $no_rm = $_POST['no_rm'];
  $nama_pasien = $_POST['nama_pasien'];
  $tggl_lahir = $_POST['tggl_lahir'];
  $pj = $_POST['pj'];
  $hubungan_pj = $_POST['hubungan_pj'];
  $alamat_pj = $_POST['alamat_pj'];

  $query = "INSERT INTO tb_pendaftaran VALUES ('', '$no_registrasi', '$no_rawat', '$tggl_masuk', '$cara_masuk', '$ruang_rawat', '$poli_tujuan', '$dokter_pj', '$jenis_bayar', '$asal_rujukan', '$no_rm', '$nama_pasien', '$tggl_lahir', '$pj', '$hubungan_pj', '$alamat_pj')";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0){
        header('location: data-pasien.php?notif=true');
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

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Form Pendaftaran</a></li>
                <li class="breadcrumb-item active">Pendaftaran Pasien</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<form class="form-horizontal" role="form" method="POST">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Registrasi Pasien</h4><br>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">

                            <div class="form-group row">
                                <label class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="<?= sprintf('%04s', $no_reg) ?>" name="no_registrasi" id="no_reg" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">No Rawat</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="no_rawat" id="no_rawat" value="<?= sprintf('%04s', $no_rwt) ?>" name="no_registrasi" id="no_reg" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Daftar</label>
                                <div class="col-9">
                                    <input type="date" class="form-control" value="<?= $date ?>" name="tggl_masuk" readonly>
                                    <input type="hidden" id="tggl_masuk" value="<?= date("my") ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Cara Masuk</label>
                                <div class="col-9">
                                    <select class="form-control" name="cara_masuk" required>
                                        <option value="">---Pilih---</option>
                                        <option value="Rawat Inap" id="rawat_inap">Rawat Inap</option>
                                        <option value="Rawat Jalan" id="rawat_jalan">Rawat Jalan</option>
                                        <option value="UGD" id="ugd">UGD</option>
                                        <option value="ICU" id="icu">ICU</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" id="ruang_rawat">
                                <label class="col-3 col-form-label">Ruangan Dirawat</label>
                                <div class="col-9">
                                    <select class="form-control" name="ruang_rawat">
                                        <option value="">---Pilih---</option>
                                        <?php 
                                            $ruangan = mysqli_query($conn, "SELECT * FROM tb_ruangan");
                                            foreach ($ruangan as $kamar) :
                                        ?>
                                        <option value="<?= $kamar['nama_ruangan'] ?>"><?= $kamar['nama_ruangan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" id="poli_tujuan">
                                <label class="col-3 col-form-label">Poliklinik Tujuan</label>
                                <div class="col-9">
                                    <select class="form-control" name="poli_tujuan">
                                        <option value="">---Pilih---</option>
                                        <?php 
                                            $poli = mysqli_query($conn, "SELECT * FROM tb_poli");
                                            foreach ($poli as $dta) :
                                        ?>
                                        <option value="<?= $dta['nama_poli'] ?>"><?= $dta['nama_poli'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dokter Penanggung Jawab</label>
                                <div class="col-9">
                                    <select class="form-control select2" name="dokter_pj" required>
                                        <option value="">Pilih Dokter</option>
                                        <optgroup label="Daftar Data Dokter">
                                            <?php 
                                                $dokter = mysqli_query($conn, "SELECT * FROM tb_dokter");
                                                foreach ($dokter as $dr) :
                                            ?>
                                            <option value="<?= $dr['nama'] ?>"><?= $dr['nama'] ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jenis Bayar</label>
                                <div class="col-9">
                                    <select class="form-control" name="jenis_bayar">
                                        <option value="Normal">Normal</option>
                                        <option value="BPJS">BPJS</option>
                                        <option value="ASKES">ASKES</option>
                                        <option value="KIS">KIS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Asal Rujukan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="asal_rujukan">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Data Pasien</h4><br>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">No RM</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="no_rm" id="no_rm" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Pasien</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="nama_pasien">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-9">
                                    <input type="date" class="form-control" value="" name="tggl_lahir">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Penanggung Jawab</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="" name="pj">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Hubungan Penanggung Jawab</label>
                                <div class="col-9">
                                    <select class="form-control" name="hubungan_pj">
                                        <option value="Ibu">Ibu</option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Kakek">Kakek</option>
                                        <option value="Nenek">Nenek</option>
                                        <option value="Saudara">Saudara</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Alamat Penanggung Jawab</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="4" name="alamat_pj"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="data-ruangan.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
</form>

<?php require '../../template/footer.php'; ?>