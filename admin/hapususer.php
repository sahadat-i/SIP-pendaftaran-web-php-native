<?php
include("../connectdb.php");

$id = $_GET["id"];
$hapus = mysqli_query($kon, "DELETE FROM user WHERE id='$id'");

echo "<meta http-equiv='refresh' content='0; url=index.php?q=kategori&m=a'>";
echo "<script>alert('Data berhasil diperbarui')</script>";
