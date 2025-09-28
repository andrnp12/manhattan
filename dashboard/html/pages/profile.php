<?php

// panggil fungsi settings
$user = user();

//panggil fungsi update user
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($password)) {
        $password_hash = $user['password'];
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    }

    updateuser($username, $password_hash);
}

?>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
        class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="../assets/images/logos/logo.svg" alt="">
                            </a>
                            <p class="text-center">Pengaturan Akun</p>
                            <form method="POST" action="" class="needs-validation" novalidate autocomplete="off">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username</label>
                                    <input id="name" type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required autofocus>
                                    <div class="invalid-feedback">Username diperlukan</div>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan kata sandi baru jika ingin mengubahnya">
                                    <div class="invalid-feedback">Kata Sandi diperlukan</div>
                                </div>
                                <div class="mb-4">
                                    <label class="mb-2 text-muted" for="verifikasi">Kode Verifikasi</label>
                                    <input id="verifikasi" type="text" class="form-control" name="verifikasi" value="<?php echo $user['verifikasi']; ?>" readonly>
                                </div>
                                <p class="form-text text-muted mb-3">
                                    Simpan kode verifikasi di atas dengan aman. Kode verifikasi akan diminta saat Anda mencoba mereset kata sandi.
                                </p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>