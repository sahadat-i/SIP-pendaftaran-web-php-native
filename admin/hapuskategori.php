<?php
include("../connectdb.php");

$kdkatprgm = $_GET["id"];
$hapus = mysqli_query($kon, "DELETE FROM kategori_program WHERE kdkatprgm='$kdkatprgm'");

echo "<meta http-equiv='refresh' content='0; url=index.php?q=kategori&m=a'>";
echo "<script>alert('Data berhasil diperbarui')</script>";
