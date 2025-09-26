<?php
function connect()
{
    $connect = mysqli_connect("localhost", "root", "", "manhattan");

    if (!$connect) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    return $connect;
}
