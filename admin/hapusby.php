<?php
include("../connectdb.php");

$id = $_GET["id"];
$hapus = mysqli_query($kon, "DELETE FROM byprogram WHERE id='$id'");

echo "<meta http-equiv='refresh' content='0; url=index.php?q=by&m=a'>";
echo "<script>alert('Data berhasil diperbarui')</script>";
