<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$id  = mysqli_real_escape_string($kon, $_POST["id"]);
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

$simpan = mysqli_query($kon, "UPDATE `byprogram` SET `kdprogram`='$kodeprogram',`jadwal_kelas`='$jadwal',`nama`='$namaprogram',`deskripsi`='$deskripsi',`byawal`='$byawal',`bybulan`='$bybulan',`tpertemuan`='$tpertemuan',`tbiaya`='$tbiaya',`deskripsi2`='$deskripsi2' WHERE id='$id'");

echo "<script>alert('Data berhasil diperbarui')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?q=by&m=a'>";
