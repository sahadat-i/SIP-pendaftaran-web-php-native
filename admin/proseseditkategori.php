<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$kdprogram      =mysqli_real_escape_string($kon,$_POST["kdprogram"]);
$nama           =mysqli_real_escape_string($kon,$_POST["nama"]);
$keterangan     =mysqli_real_escape_string($kon,$_POST["keterangan"]);

$simpan=mysqli_query($kon, "UPDATE kategori_program SET nmkatprgm='$nama',ketkatprgm='$keterangan' where kdkatprgm='$kdprogram'");

echo "<script>alert('Data berhasil diperbarui')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?q=kategori&m=a'>";

