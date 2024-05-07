<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$nip                =mysqli_real_escape_string($kon,$_POST["nip"]);
$username           =mysqli_real_escape_string($kon,$_POST["usename"]);
$password_post      =mysqli_real_escape_string($kon,$_POST["password"]);
$level              =mysqli_real_escape_string($kon,$_POST["level"]);
$password           = md5($password_post);
//proses simpan data
 
$simpan=mysqli_query($kon, "INSERT INTO `user`(`id`, `username`, `password`, `level`, `nip`) VALUES ('','$username','$password','$level','$nip')");

echo "<script>alert('Data berhasil diperbarui')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?q=user&m=a'>";
