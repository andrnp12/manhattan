<?php

require_once(__DIR__ . '../../function/koneksi.php');


// bagian Kategori
// mengambil semua data kategori
function getCategories()
{
    $con = connect();
    $categories = [];

    $query = "SELECT * FROM kategori";
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }

    mysqli_close($con);
    return $categories;
}

// menambahkan kategori baru
function addCategory($nama)
{
    $con = connect();
    $query = 'INSERT INTO kategori (nama_kategori) VALUES (?)';
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $nama);
    $exec = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec; // true jika berhasil, false jika gagal
}


// bagian topik
// mengambil semua data topik berdasarkan
function getAllTopics()
{
    $con = connect();
    $topics = [];

    $query = "SELECT * FROM topik JOIN kategori ON topik.id_kategori = kategori.id_kategori; ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $topics[] = $row;
        }
    }
    mysqli_close($con);
    return $topics;
}

// bagian materi
// mengambil semua data dari materi

function getAllMateri()
{
    $con = connect();
    $materi = [];

    $query = "SELECT * FROM topik JOIN kategori ON topik.id_kategori = kategori.id_kategori JOIN subtopik ON topik.id_topik = subtopik.id_topik;";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $materi[] = $row;
        }
    }
    mysqli_close($con);
    return $materi;
}
