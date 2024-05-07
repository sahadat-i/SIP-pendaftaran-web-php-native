<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$nama           = mysqli_real_escape_string($kon, $_POST["nama"]);
$nis            = mysqli_real_escape_string($kon, $_POST["nis"]);
$jenis_kelamin  = mysqli_real_escape_string($kon, $_POST["jenis_kelamin"]);
$tlahir         = mysqli_real_escape_string($kon, $_POST["tlahir"]);
$tglahir        = mysqli_real_escape_string($kon, $_POST["tglahir"]);
$namasekolah     = mysqli_real_escape_string($kon, $_POST["namasekolah"]);
$notelp         = mysqli_real_escape_string($kon, $_POST["notelp"]);
$email          = mysqli_real_escape_string($kon, $_POST["email"]);
$alamat         = mysqli_real_escape_string($kon, $_POST["alamat"]);
$nopendaftar    = mysqli_real_escape_string($kon, $_POST["nopendaftar"]);

//proses simpan data
$simpan = mysqli_query($kon, "INSERT INTO `siswa`(`nis`, `nama`, `jenis_kelamin`, `tlahir`, `tgl_lahir`, `pendidikan`, `notelp`, `alamat`, `email`, `nopendaftar`) VALUES ('$nis','$nama','$jenis_kelamin','$tlahir','$tglahir','$namasekolah','$notelp','$alamat','$email','$nopendaftar')");

echo "<script>alert('Data berhasil diperbarui')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?q=siswa&m=a'>";
