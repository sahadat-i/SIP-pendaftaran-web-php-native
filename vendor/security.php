<?php
$url        = 'https://script.google.com/macros/s/AKfycbzWnRxy6zlD4tlGQUAHJkTUTD0wkrnBi0_A8CnaQkNKToc-zxIdAZSDajbkH3EpaUhf0A/exec';
$json       = file_get_contents($url);
$data       = json_decode($json, true);
$isActive   = $data['data'][3]['status']; //akses baris
if ($isActive == 0) {
    header('location:../elvira/logout.php?id=1');
}else{
    include('../elvira/connectdb.php');
}
?>