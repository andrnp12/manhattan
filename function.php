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

function forgot ($username, $verifikasi) {
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

function resetpass ($password, $username, $logout) {
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

?>