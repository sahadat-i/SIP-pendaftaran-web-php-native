<option value="">Pilih Program</option>
<?php
    include("../connectdb.php");
    $id             = $_POST['tamp'];
    $qdata          = mysqli_query($kon, "select pendaftaran.kdprogram,pendaftaran.nama_program from pendaftaran join siswa on pendaftaran.nopendaftar=siswa.nopendaftar where siswa.nis='$id'");
    $f              = mysqli_num_rows($qdata);

    if ($f > 0) {
    while ($f = mysqli_fetch_array($qdata)) {
    $kdprogram      = $f['kdprogram'];
    $nama_program   = $f['nama_program'];
    $ddetail        = mysqli_query($kon,"select nmkatprgm from kategori_program where kdkatprgm='$kdprogram'");
    $kategori       = mysqli_fetch_array($ddetail)['nmkatprgm'];
?>
<option value="<?php echo $kdprogram.'|'.$nama_program.'|'.$kategori?>">
    <?php echo ucwords($nama_program) ." | ".ucwords($kategori)?>
</option>
<?php
}
} else {
?>
<option value="">
Data Tidak Di Temukan
</option>
<?php
}
?>