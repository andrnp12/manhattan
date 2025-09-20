<?php 

function koneksi() {
    $conn = mysqli_connect("localhost", "root", "", "manhattan");
    return $conn;
}


function register($username, $password, $verifikasi) {
    $conn = koneksi();

    $checkuser = mysqli_escape_string($conn, $username);
    $checkpass = mysqli_escape_string($conn, $password);

    $sql = "INSERT INTO user VALUES(null, '$checkuser', '$checkpass', '$verifikasi')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // registrasi berhasil
        echo "<script>alert('Registerasi berhasil!'); window.location.href = 'pages/materi.php';</script>";
    } else {
        // registrasi gagal
        echo "<script>alert('Registerasi gagal!, coba cek lagi atau hubungi kami melalui kontak!'); window.location.href = 'register.php';</script>";
    }

}


?>