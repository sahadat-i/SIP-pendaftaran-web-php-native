<?php
include("../connectdb.php");

$isEdit             =mysqli_real_escape_string($kon,$_POST["edit"]);
if ($isEdit == 1) {
    $id             =mysqli_real_escape_string($kon,$_POST["id"]);
    $passbaru       =mysqli_real_escape_string($kon,$_POST["passbaru"]);
    $password       = md5($passbaru);
    $simpan         =mysqli_query($kon, "UPDATE user SET password='$password' where nip='$id'");
    include("logout2.php");
}else {
    $id                 =mysqli_real_escape_string($kon,$_POST["id"]);
    $username           =mysqli_real_escape_string($kon,$_POST["username"]);
    $password_post      =mysqli_real_escape_string($kon,$_POST["password"]);
    $level              =mysqli_real_escape_string($kon,$_POST["level"]);
    $id_login           =mysqli_real_escape_string($kon,$_POST["id_login"]);
    $password           = md5($password_post);
    $ceklogin           = mysqli_query($kon,"select id from user where nip='$id_login'");
    $idauth             = mysqli_fetch_assoc($ceklogin)['id'];

    $simpan=mysqli_query($kon, "UPDATE user SET username='$username',password='$password',level='$level' where id='$id'");
    
    if ($idauth == $id) {
        include("logout2.php");
    } else {
        echo "<script>alert('Data paket berhasil diperbarui')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?q=user&m=a'>";
    }

}




