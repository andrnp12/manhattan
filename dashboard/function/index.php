<?php
function koneksi()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "manhattan";
    $conn = mysqli_connect($host, $user, $pass, $db);
    return $conn;
}
