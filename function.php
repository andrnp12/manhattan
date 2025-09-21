<?php

use LDAP\Result;

function koneksi() {
    $conn = mysqli_connect("localhost", "root", "", "manhattan");
    return $conn;
}


function register($username, $password, $verifikasi) {
    $conn = koneksi();

    $checkuser = mysqli_escape_string($conn, $username);
    $checkpass = mysqli_escape_string($conn, $password);

    $passwordhash = password_hash($checkpass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user VALUES(null, '$checkuser', '$passwordhash', '$verifikasi')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // registrasi berhasil
        echo "<script>alert('Registerasi berhasil!'); window.location.href = 'pages/materi.php';</script>";
    } else {
        // registrasi gagal
        echo "<script>alert('Registerasi gagal!, coba cek lagi atau hubungi kami melalui kontak!'); window.location.href = 'register.php';</script>";
    }

}

function login($username, $password) {
    $conn = koneksi();

    $checkuser = mysqli_escape_string($conn, $username);
    $checkpass = mysqli_escape_string($conn, $password);

    $sql = "SELECT * FROM user WHERE username = '$checkuser'";
    $query = mysqli_query($conn, $sql);

    if ($query->num_rows > 0) {
            $user = $query->fetch_assoc();
            // check password match
            if (password_verify($checkpass, $user['password'])) {
                //password match, process login
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id_user'];
                echo "<script>alert('Login Berhasil'); window.location.href = 'pages/materi.php';</script>";
            } else {
                // Password does not match, handle login failure
                echo "<script>alert('Password Salah'); window.location.href = 'index.php';</script>";
            }
    } else {
        // No user found with the provided username
        echo "<script>alert('Username Tidak Terdaftar'); window.location.href = 'index.php';</script>";
    }
}

?>