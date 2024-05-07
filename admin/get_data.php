<!-- query -->
<?php
include("../connectdb.php");
$id = $_POST['tamp'];
$nama_program = $_POST['nama_program'];
$kategori = $_POST['kategori'];
$ddata = mysqli_query($kon, "select * from byprogram where kdprogram='$id'");
$data = mysqli_fetch_array($ddata);
?>
<!-- konten -->
<div class="m-3">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <label class="form-label"> Jumlah Biaya Daftar Awal</label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="byawal" value="<?php echo number_format($data['byawal'], 0, ',', '.') ?>" readonly>
                </div>
                <div class="col-4">
                    <label class="form-label"> Total Pertemuan <?php echo $data['tpertemuan'] ?>x </label>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Biaya Per Pertemuan</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="tanggal" value="<?php echo number_format($data['bybulan'], 0, ',', '.') ?>" readonly>
                </div>
                <div class="col">
                    <select name="cicilan" class="form-control" required>
                        <option value="">Pilih Cicilan Ke</option>
                        <?php

                        for ($num = 1; $num < 2; $num++) {
                            echo '<option value="' . $num . '">' . $num . '</option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-3">
    <div class="row">
        <div class="col-2">
            <label class="form-label">Total Awal Pembayaran</label>
        </div>
        <div class="col-10">
            <input type="text" class="form-control" name="tpembayaran" value="<?php echo $data['byawal']+$data['bybulan']?>" readonly>
        </div>
    </div>
</div>
<div class="m-3">
    <div class="row">
        <div class="col-2">
            <label class="form-label">Keterangan Detail Pendaftaran</label>
        </div>
        <div class="col-10">
            <textarea name="deskripsi" class="form-control" id="" rows="3"><?php echo 'Pembayaran Biaya Awal dan Cicilan Ke 1'?></textarea>
        </div>
    </div>
</div>
