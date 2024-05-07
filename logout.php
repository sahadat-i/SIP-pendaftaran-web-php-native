<?php
session_start();

$is = (isset($_GET['id'])) ? 4 : 3 ;
unset($_SESSION["nip"]);
unset($_SESSION["level"]);
unset($_SESSION["nama"]);
session_unset();
session_destroy();
header('location:index.php?eror='.$is);
