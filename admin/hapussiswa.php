<?php
include("../connectdb.php");

$nip = $_GET["id"];

$hapus = mysqli_query($kon, "DELETE FROM siswa WHERE id='$nip'");

echo "<meta http-equiv='refresh' content='0; url=index.php?q=siswa&m=a'>";
echo "<script>alert('Data berhasil diperbarui')</script>";
