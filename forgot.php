<?php

include('function.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $verifikasi = $_POST['verifikasi'];
  forgot($username, $verifikasi);
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
      <div class="col-lg-6">
        <div class="card shadow-lg">
          <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4">Lupa Kata Sandi?</h1>
            <form method="POST" action="forgot.php" class="needs-validation" novalidate="" autocomplete="off">
              <div class="mb-3">
                <label class="mb-2 text-muted" for="name">Username</label>
                <input id="name" type="text" class="form-control" name="username" value="" required autofocus>
                <div class="invalid-feedback">
                  Username tidak valid
                </div>
              </div>

              <div class="mb-3">
                <label class="mb-2 text-muted" for="verif">Kode Verifikasi</label>
                <input id="verif" type="text" class="form-control" name="verifikasi" value="" required autofocus>
                <div class="invalid-feedback">
                  Kode verifikasi tidak valid
                </div>
              </div>

              <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary ms-auto" name="submit">
                  Reset Sekarang
                </button>
              </div>
            </form>
          </div>
          <div class="card-footer py-3 border-0">
            <div class="text-center">
              Ingat Kata Sandi? <a href="index.php" class="text-dark">Masuk</a>
            </div>
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