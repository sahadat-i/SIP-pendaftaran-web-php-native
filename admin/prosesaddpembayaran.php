<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$notransaksi    = mysqli_real_escape_string($kon, $_POST["notransaksi"]);
$tgldaftar      = mysqli_real_escape_string($kon, $_POST["tgldaftar"]);
$nis            = mysqli_real_escape_string($kon, $_POST["nis"]);
$dsiswa         = mysqli_query($kon,"select * from siswa where nis='$nis'");
$nopendaftar    = mysqli_fetch_assoc($dsiswa)['nopendaftar'];
$cicilan        = mysqli_real_escape_string($kon, $_POST["cicilan"]);
$tpembayaran    = mysqli_real_escape_string($kon, $_POST["tpembayaran"]);
$kode           = mysqli_real_escape_string($kon, $_POST["kdprogram"]);
$kdprogram      = explode('|',$kode)[0];
$nama_program   = explode('|',$kode)[1];
$kategori       = explode('|',$kode)[2];
$deskripsi      = mysqli_real_escape_string($kon, $_POST["deskripsi"]);

$simpan = mysqli_query($kon, "INSERT INTO `pembayaran`(`id`, `notransaksi`, `nopendaftar`,`tgl_bayar`,`deskripsi`) VALUES ('','$notransaksi','$nopendaftar','$tgldaftar','$deskripsi')");
//proses simpan detailpembayaran

$simpan1 = mysqli_query($kon, "INSERT INTO `detail_pembayaran`(`notransaksi`,`cicilanke`,`nama_program`,`kategori`,`jumlahbayar`) VALUES ('$notransaksi','$cicilan','$nama_program','$kategori','$tpembayaran')");

echo "<meta http-equiv='refresh' content='0; url=index.php?q=pembayaran&t=a'>"; 
echo "
        <script>
            alert('Data Berhasil Di Simpan');
            var left = (screen.width/2)-(850/2);
            var top = (screen.height/2)-(500/2);
            myWindow = window.open('laporan/kwitansi.php?id=$notransaksi', '','width=850,height=500');
        </script>
";


