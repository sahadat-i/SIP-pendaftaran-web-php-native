<?php
//panggil file koneksi
include("vendor/security.php");

session_start();
$nip  = $_POST["nip"];
$password  = $_POST["password"];
$password = md5($password);
$qdata = mysqli_query($kon, "SELECT * FROM user WHERE username='$nip' AND password='$password'");
$cek = mysqli_num_rows($qdata);
$data = mysqli_fetch_array($qdata);
$nip = $data['nip'];
$dnama  = mysqli_query($kon, "select nama from pegawai where nip='$nip'");
$nama   = mysqli_fetch_assoc($dnama)['nama'];
if ($cek == 1) {
    $_SESSION["nip"]         = $data["nip"];
    $_SESSION["nama"]        = $nama;
    $_SESSION["level"]       = $data["level"];
    header('location:admin');
} else {
    header('location:index.php?eror=1');
}
