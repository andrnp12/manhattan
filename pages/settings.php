<?php

session_start();
if (!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../index.php");
} else {
  if ($_SESSION['role'] != 1) {
    session_destroy();
    header("Location: ../index.php");
  }
}

include('../function.php');

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

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<!-- Bagian background di luar section -->
<div class="bg-images"></div>

<section class="section-images h-100" style="padding-bottom: 10rem !important;">
  <div class="container h-100">
    <div class="row justify-content-sm-center h-100">
      <div class="col-lg-12" id="tentang">
        <div class="card shadow-lg">
          <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4">Pengaturan Akun</h1>
            <form method="POST" action="settings.php" class="needs-validation" novalidate autocomplete="off">

              <div class="mb-3">
                <label class="mb-2 text-muted" for="name">Username</label>
                <input id="name" type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required autofocus>
                <div class="invalid-feedback">Username diperlukan</div>
              </div>

              <div class="mb-3">
                <label class="mb-2 text-muted" for="password">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan kata sandi baru jika ingin mengubahnya">
                <div class="invalid-feedback">Kata Sandi diperlukan</div>
              </div>

              <div class="mb-3">
                <label class="mb-2 text-muted" for="verifikasi">Kode Verifikasi</label>
                <input id="verifikasi" type="text" class="form-control" name="verifikasi" value="<?php echo $user['verifikasi']; ?>" readonly>
              </div>

              <p class="form-text text-muted mb-3">
                Simpan kode verifikasi di atas dengan aman. Kode verifikasi akan diminta saat Anda mencoba mereset kata sandi.
              </p>

              <div class="d-flex justify-content-end">
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
</section>

<section id="contact-info" class="m-t-5 padding-small bg-gray">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div>
        <h3 class="display-5 fw-bold mb-3">Segera Hubungi Kami</h3>
        <p>Jika anda memiliki masukan atau pesan dan kesan pada kami silahkan hubungi di <br> yyy@gmail.com atau Via Whatsapp di +628123456789</p>
      </div>
      <a href="contact.html" class="btn btn-primary">Contact Us</a>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>

</html>