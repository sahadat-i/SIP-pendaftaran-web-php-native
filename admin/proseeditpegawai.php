<?php
include("../connectdb.php");

//ambil semua data yang dikirim dari form
$nip            = mysqli_real_escape_string($kon, $_POST["nip"]);
$nama           = mysqli_real_escape_string($kon, $_POST["nama"]);
$tgl_mulai      = mysqli_real_escape_string($kon, $_POST["tgl_mulai"]);
$nip            = mysqli_real_escape_string($kon, $_POST["nip"]);
$jenis_kelamin  = mysqli_real_escape_string($kon, $_POST["jenis_kelamin"]);
$tlahir         = mysqli_real_escape_string($kon, $_POST["tlahir"]);
$tglahir        = mysqli_real_escape_string($kon, $_POST["tglahir"]);
$pendidikan     = mysqli_real_escape_string($kon, $_POST["pendidikan"]);
$jurusan        = mysqli_real_escape_string($kon, $_POST["jurusan"]);
$notelp         = mysqli_real_escape_string($kon, $_POST["notelp"]);
$email          = mysqli_real_escape_string($kon, $_POST["email"]);
$alamat         = mysqli_real_escape_string($kon, $_POST["alamat"]);

//proses simpan data
$simpan=mysqli_query($kon, "UPDATE pegawai SET nama='$nama',jenis_kelamin='$jenis_kelamin', tlahir='$tlahir', tgl_lahir='$tglahir',pendidikan='$pendidikan',jurusan='$jurusan',notelp='$notelp',alamat='$alamat',email='$email',tgl_mulai='$tgl_mulai' where nip='$nip'");
echo "<script>alert('Data berhasil diperbarui')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?q=pegawai'>";
