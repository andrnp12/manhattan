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
    mysqli_stmt_bind_param($stmt, 's', $nama);
    $exec = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec;
}

// edit kategori
function editCategory($id, $nama)
{
    $con = connect();
    $query = 'UPDATE kategori SET nama_kategori = ? WHERE id_kategori = ?';
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'si', $nama, $id);
    $exec = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec;
}

// menghapus kategori
function deleteCategory($id)
{
    $con = connect();
    if (!$con) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }

    $query = 'DELETE FROM kategori WHERE id_kategori = ?';
    $stmt = mysqli_prepare($con, $query);
    // if (!$stmt) {
    //     die('Prepare gagal: ' . mysqli_error($con));
    // }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    $exec = mysqli_stmt_execute($stmt);

    // if (!$exec) {
    //     echo 'Eksekusi gagal: ' . mysqli_stmt_error($stmt);
    // }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec;
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

// menambah topik baru pada kategori
function addTopic($topik, $kategori)
{
    $con = connect();
    $query = 'INSERT INTO topik (nama_topik, id_kategori) VALUES (?, ?)';
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'si', $topik, $kategori);
    $exec = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec;
}

// edit topik
function editTopic($id, $topik, $kategori)
{
    $con = connect();
    $query = 'UPDATE topik SET nama_topik = ?, id_kategori = ? WHERE id_topik = ?';
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'sii', $topik, $kategori, $id);
    $exec = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec;
}

// menghapus topik
function deleteTopic($id)
{
    $con = connect();
    // if (!$con) {
    //     die('Koneksi gagal: ' . mysqli_connect_error());
    // }

    $query = 'DELETE FROM topik WHERE id_topik = ?';
    $stmt = mysqli_prepare($con, $query);
    // if (!$stmt) {
    //     die('Prepare gagal: ' . mysqli_error($con));
    // }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    $exec = mysqli_stmt_execute($stmt);

    // if (!$exec) {
    //     echo 'Eksekusi gagal: ' . mysqli_stmt_error($stmt);
    // }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $exec;
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
