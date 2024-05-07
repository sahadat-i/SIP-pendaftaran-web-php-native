<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$kodeprogram  = mysqli_real_escape_string($kon, $_POST["kodeprogram"]);
$jam  = mysqli_real_escape_string($kon, $_POST["jam"]);
$tanggal      = mysqli_real_escape_string($kon, $_POST["tanggal"]);
$namaprogram  = mysqli_real_escape_string($kon, $_POST["namaprogram"]);
$deskripsi    = mysqli_real_escape_string($kon, $_POST["deskripsi"]);
$byawal       = mysqli_real_escape_string($kon, $_POST["byawal"]);
$bybulan      = mysqli_real_escape_string($kon, $_POST["bybulan"]);
$tpertemuan   = mysqli_real_escape_string($kon, $_POST["tpertemuan"]);
$tbiaya       = mysqli_real_escape_string($kon, $_POST["tbiaya"]);
$deskripsi2   = mysqli_real_escape_string($kon, $_POST["deskripsi2"]);
$jadwal = $tanggal.' '.$jam;

//proses simpan data

$simpan = mysqli_query($kon, "INSERT INTO `byprogram`(`id`, `kdprogram`, `jadwal_kelas`, `nama`, `deskripsi`, `byawal`, `bybulan`,`tpertemuan`, `tbiaya`, `deskripsi2`) VALUES ('','$kodeprogram','$jadwal','$namaprogram','$deskripsi','$byawal','$bybulan','$tpertemuan','$tbiaya','$deskripsi2')");

echo "<script>alert('Data berhasil diperbarui')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?q=by&m=a'>";
