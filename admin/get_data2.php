<?php
include("../connectdb.php");
$id             = $_POST['tamp'];
$namaprogram    = $_POST['namaprogram'];
$nis            = $_POST['nis'];

$ddata          = mysqli_query($kon, "select * from byprogram where kdprogram='$id' and nama='$namaprogram'");
$data           = mysqli_fetch_array($ddata);

$dsiswa         = mysqli_query($kon, "select nopendaftar from siswa where nis='$nis'");
$nopendaf       = mysqli_fetch_assoc($dsiswa)['nopendaftar'];

$totalbyar     = $data['tbiaya'];

$ddetailbayar   = mysqli_query($kon, "SELECT SUM(dp.jumlahbayar) AS telahbayar FROM pembayaran p JOIN detail_pembayaran as dp ON p.notransaksi = dp.notransaksi WHERE p.nopendaftar = '$nopendaf' AND dp.nama_program = '$namaprogram'");
// $ddetailbayar   = mysqli_query($kon, "SELECT *,SUM(detail_pembayaran.jumlahbayar) AS telahbayar FROM `pembayaran` JOIN detail_pembayaran ON pembayaran.notransaksi = detail_pembayaran.notransaksi WHERE pembayaran.nopendaftar = '$nopendaf' and detail_pembayaran.nama_program ='$namaprogram'");
$telahBayar     = mysqli_fetch_assoc($ddetailbayar)['telahbayar'];
$dcicilan = mysqli_query($kon, "SELECT COUNT(nopendaftar)+1 as jumlah from pembayaran WHERE nopendaftar = '$nopendaf'");
$cicilan = mysqli_fetch_assoc($dcicilan)['jumlah'];
?>
<?php if ($telahBayar >= $totalbyar) : ?>
    <div class="alert alert-primary m-3" role="alert">
        Program Yang Di Pilih Telah Terbayar Lunas
    </div>
<?php else : ?>
    <!-- konten -->
    <div class="m-3">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">Biaya Per Pertemuan</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" value="<?php echo number_format($data['bybulan'], 0, ',', '.') ?>" readonly>
                    </div>
                    <div class="col">
                        <select name="cicilan" class="form-control" required>
                            <option value="">Pilih Cicilan Ke</option>
                            <?php

                            for ($num = 1; $num < 5; $num++) {
                                $selected = ($num == $cicilan) ? 'selected' : '';
                                echo '<option value="' . $num . '" ' . $selected . '>' . $num . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <!-- <div class="col-4">
                        <label class="form-label"> Jumlah Biaya Daftar Awal</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="byawal" value="<?php echo $data['byawal'] ?>">
                    </div> -->
                    <div class="col-4">
                        <label class="form-label"> Total Pertemuan <?php echo $data['tpertemuan'] ?>x </label>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="m-3">
        <div class="row">
            <div class="col-2">
                <label class="form-label">Jumlah Pembayaran</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" name="tpembayaran" id="tpembayaran" max="100" required>
            </div>
        </div>
    </div>
    <div class="m-3">
        <div class="row">
            <div class="col-2">
                <label class="form-label">Keterangan Detail Pendaftaran</label>
            </div>
            <div class="col-10">
                <textarea name="deskripsi" class="form-control" id="" rows="3">Pembayaran Cicilan Ke <?php echo $cicilan ?></textarea>
            </div>
        </div>
    </div>
    <div class="alert alert-primary m-3" role="alert">
        <strong>
            Kurang Sejumlah <?php echo number_format($totalbyar - $telahBayar, 0, ',', '.') ?> Lagi Untuk Melunasi Program Yang Di Pilih
        </strong>
        <input type="hidden" id="kekurangan" value="<?php echo ($totalbyar - $telahBayar) ?>">
    </div>
<?php endif ?>
<input type="hidden" id="islunas" value="<?php echo ($telahBayar >= $totalbyar) ? 1 : 0; ?>">