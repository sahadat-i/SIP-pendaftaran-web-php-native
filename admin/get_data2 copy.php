<!-- query -->
<?php
    include("../connectdb.php");
    $id             = $_POST['tamp'];
    $nis            = $_POST['nis'];
    $nama_program   = $_POST['nama_program'];
    $kategori       = $_POST['kategori'];
    $ddata          = mysqli_query($kon, "select * from byprogram where kdprogram='$id'");
    $data           = mysqli_fetch_array($ddata);

    $dsiswa         = mysqli_query($kon,"SELECT pendaftaran.nopendaftar as nopendaftar FROM pendaftaran JOIN siswa ON pendaftaran.nopendaftar=siswa.nopendaftar WHERE siswa.nis='$nis'");
    $nopendaftar    = mysqli_fetch_assoc($dsiswa)['nopendaftar'];

    $cekTerbayar    = mysqli_query($kon,"SELECT sum(detail_pembayaran.jumlahbayar) as terbayar FROM pembayaran join detail_pembayaran on pembayaran.notransaksi=detail_pembayaran.notransaksi where pembayaran.nopendaftar='$nopendaftar'  AND detail_pembayaran.nama_program='$nama_program' and detail_pembayaran.kategori='$kategori'");
    $terbayar       = mysqli_fetch_assoc($cekTerbayar)['terbayar'];
?>
<!-- konten -->
<div class="m-3">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Biaya Per Pertemuan</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control"value="<?php echo number_format($data['bybulan'], 0, ',', '.') ?>" readonly>
                </div>
                <div class="col">
                    <select name="cicilan" class="form-control" required>
                        <option value="">Pilih Cicilan Ke</option>
                        <?php

                        for ($num = 1; $num < 5; $num++) {
                            echo '<option value="' . $num . '">' . $num . '</option>';
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
            <input type="text" class="form-control" name="tpembayaran" id="tpembayaran" required>
        </div>
    </div>
</div>
<div class="m-3">
    <div class="row">
        <div class="col-2">
            <label class="form-label">Keterangan Detail Pendaftaran</label>
        </div>
        <div class="col-10">
            <textarea name="deskripsi" class="form-control" id="" rows="3"><?php echo 'Pembayaran Cicilan Ke' ?></textarea>
        </div>
    </div>
</div>
<input type="text" name="nama_program" value="<?php echo $nama_program?>">
<input type="text" name="kategori" value="<?php echo $kategori?>">
<input type="text" id="totalterbayar" value="<?php echo $terbayar?>">
<script>
    $('#tpembayaran').keyup(function() {
        console.log($(this).val());
    });
</script>
