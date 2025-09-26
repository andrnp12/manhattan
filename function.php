<?php

use LDAP\Result;

function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "manhattan");
    return $conn;
}


function register($username, $password, $verifikasi)
{
    $conn = koneksi();
    $role = 1;

    $checkuser = mysqli_escape_string($conn, $username);
    $checkpass = mysqli_escape_string($conn, $password);

    $passwordhash = password_hash($checkpass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user VALUES(null, '$checkuser', '$passwordhash', '$verifikasi', '$role')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // registrasi berhasil
        echo "<script>alert('Registerasi berhasil!'); window.location.href = 'index.php';</script>";
    } else {
        // registrasi gagal
        echo "<script>alert('Registerasi gagal!, coba cek lagi atau hubungi kami melalui kontak!'); window.location.href = 'register.php';</script>";
    }
}

function login($username, $password, $remember)
{
    $conn = koneksi();

    $checkuser = mysqli_escape_string($conn, $username);
    $checkpass = mysqli_escape_string($conn, $password);

    $sql = "SELECT * FROM user WHERE username = '$checkuser'";
    $query = mysqli_query($conn, $sql);

    if ($query->num_rows > 0) {
        $user = $query->fetch_assoc();
        // check password match
        if ($user['role'] == 1) { 
            if (password_verify($checkpass, $user['password'])) {
                // check remember checklist
                if ($remember) {
                    //password match, process login
                    session_start();
    
                    setcookie("username", $user['username'], time() + (86400 * 30), "/");
                    setcookie("id", $user['id_user'], time() + (86400 * 30), "/");
                    setcookie("password", $user['password'], time() + (86400 * 30), "/");
    
                    echo "<script>alert('Login Berhasil'); window.location.href = 'pages/index.php';</script>";
                } else {
                    //password match, process login
                    session_start();
    
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['id'] = $user['id_user'];
    
                    echo "<script>alert('Login Berhasil'); window.location.href = 'pages/index.php';</script>";
                }
            } else {
                // Password does not match, handle login failure
                echo "<script>alert('Password Salah'); window.location.href = 'index.php';</script>";
            }
        } else {
            if (password_verify($checkpass, $user['password'])) {
                // check remember checklist
                if ($remember) {
                    //password match, process login
                    session_start();
    
                    setcookie("username", $user['username'], time() + (86400 * 30), "/");
                    setcookie("id", $user['id_user'], time() + (86400 * 30), "/");
                    setcookie("password", $user['password'], time() + (86400 * 30), "/");
    
                    echo "<script>alert('Login Berhasil'); window.location.href = 'dashboard/html/index.php';</script>";
                } else {
                    //password match, process login
                    session_start();
    
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['id'] = $user['id_user'];
    
                    echo "<script>alert('Login Berhasil'); window.location.href = 'dashboard/html/index.php';</script>";
                }
            } else {
                // Password does not match, handle login failure
                echo "<script>alert('Password Salah'); window.location.href = 'index.php';</script>";
            }
        }
    } else {
        // No user found with the provided username
        echo "<script>alert('Username Tidak Terdaftar'); window.location.href = 'index.php';</script>";
    }
}

function forgot($username, $verifikasi)
{
    $conn = koneksi();

    $checkuser = mysqli_escape_string($conn, $username);
    $checkverif = mysqli_escape_string($conn, $verifikasi);

    $sql = "SELECT * FROM user WHERE username = '$checkuser'";
    $query = mysqli_query($conn, $sql);

    if ($query->num_rows > 0) {
        $user = $query->fetch_assoc();
        $verif = $user['verifikasi'];
        if ($checkverif == $verif) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id_user'];
            echo "<script>alert('Kode Verifikasi Benar'); window.location.href = 'reset.php';</script>";
        } else {
            echo "<script>alert('Kode Verifikasi Salah'); window.location.href = 'forgot.php';</script>";
        }
    } else {
        echo "<script>alert('Username Tidak Terdaftar'); window.location.href = 'forgot.php';</script>";
    }
}

function resetpass($password, $username, $logout)
{
    $conn = koneksi();

    $checkpass = mysqli_escape_string($conn, $password);
    $passwordhash = password_hash($checkpass, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = '$passwordhash' WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        if ($logout) {
            session_destroy();
            // header("Location: index.php");
            echo "<script>alert('Reset Kata Sandi Berhasil'); window.location.href = 'index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Reset Kata Sandi Berhasil'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Reset Kata Sandi Gagal'); window.location.href = 'reset.php';</script>";
    }
}

function kategori()
{
    $conn = koneksi();

    $sql = "SELECT kategori.nama_kategori, topik.nama_topik FROM kategori INNER JOIN topik ON kategori.id_kategori = topik.id_kategori";
    $query = mysqli_query($conn, $sql);

    return $query;
}

function kategorisatu()
{
    $conn = koneksi();

    $sql = "SELECT * FROM kategori";
    $query = mysqli_query($conn, $sql);

    return $query;
}

function filterdata()
{
    $conn = koneksi();

    // Query ambil data
    $sql = "SELECT kategori.id_kategori, topik.id_topik, topik.nama_topik FROM kategori INNER JOIN topik ON kategori.id_kategori = topik.id_kategori";
    $result = mysqli_query($conn, $sql);

    // Siapkan array kosong
    $filterData = [];

    // Loop hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        $kategori = $row['id_kategori'];

        // jika kategori belum ada, buatkan array baru
        if (!isset($filterData[$kategori])) {
            $filterData[$kategori] = [];
        }

        // tambahkan data label & value
        $filterData[$kategori][] = [
            "label" => $row['nama_topik'],
            "value" => $row['id_topik']
        ];
    }

    return $filterData;
}

function subtopik()
{
    $conn = koneksi();

    $sql = "SELECT * FROM subtopik INNER JOIN topik ON subtopik.id_topik = topik.id_topik";
    $query = mysqli_query($conn, $sql);

    return $query;
}

function detailsub($id)
{
    $conn = koneksi();

    $sql = "SELECT * FROM subtopik WHERE id_sub = '$id'";
    $query = mysqli_query($conn, $sql);

    return $query->fetch_assoc();
}

function user()
{
    $conn = koneksi();

    $sql = "SELECT * FROM user WHERE id_user = '$_SESSION[id]'";
    $query = mysqli_query($conn, $sql);

    return $query->fetch_assoc();
}

function updateuser($username, $password_hash)
{
    $conn = koneksi();

    $checkuser = mysqli_escape_string($conn, $username);
    $checkpass = mysqli_escape_string($conn, $password_hash);

    // $passwordhash = password_hash($checkpass, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET username = '$checkuser', password = '$password_hash' WHERE id_user = '$_SESSION[id]'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Update User Berhasil'); window.location.href = 'settings.php';</script>";
    } else {
        echo "<script>alert('Update Gagal'); window.location.href = 'settings.php';</script>";
    }
}
