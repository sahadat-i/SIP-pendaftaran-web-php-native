<?php
include("../connectdb.php");

$nip = $_GET["id"];
$hapus = mysqli_query($kon, "DELETE FROM pegawai WHERE nip='$nip'");

echo "<meta http-equiv='refresh' content='0; url=index.php?q=pegawai&m=a'>";
echo "<script>alert('Data berhasil diperbarui')</script>";
