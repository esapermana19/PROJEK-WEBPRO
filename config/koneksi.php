<?php
$koneksi = mysqli_connect("localhost","root","","pos");
if(!$koneksi) {
    mysqli_connect_errno();
    die;
}