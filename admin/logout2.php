<?php
session_start();

unset($_SESSION["nip"]);
unset($_SESSION["level"]);
unset($_SESSION["nama"]);

session_unset();
session_destroy();

header('location:../index.php?eror=2');
