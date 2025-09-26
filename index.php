<?php

include('function.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $remember = isset($_POST['remember']) ? $_POST['remember'] : false;
  login($username, $password, $remember);
}

//panggil fungsi sub
$topik = subtopik('LIMIT 3');

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<!-- Bagian background di luar section -->
<!-- <div class="bg-home"></div> -->

<section id="about-us" class="padding-medium">
  <div class="container">
    <div class="index-header row align-items-center">
      <div class="col-lg-6 mt-5 mt-lg-0">
        <div class="col-lg-10">
          <h6 class="text-primary">Tentang Kami</h6>
          <h3 class="display-5 fw-bold mb-3">Sistem Bahan Ajar RPS dan Materi Pendidikan Terbaik</h3>
          <p>Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet. Tempor erat sed stet lorem
            sit clita duo justo elitr rebum at clita diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
            ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet
          </p>
          <a class="btn btn-primary mt-4" href="about.html">Jelajahi Fitur</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card shadow-lg">
          <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4">Masuk ke akun anda</h1>
            <form method="POST" action="index.php" class="needs-validation" novalidate="" autocomplete="off">
              <div class="mb-3">
                <label class="mb-2 text-muted" for="name">Username</label>
                <input id="name" type="text" class="form-control" name="username" value="" required autofocus>
                <div class="invalid-feedback">
                  Username tidak valid
                </div>
              </div>

              <div class="mb-3">
                <div class="mb-2 w-100">
                  <label class="text-muted" for="password">Password</label>
                  <a href="forgot.php" class="float-end">
                    Lupa Kata Sandi?
                  </a>
                </div>
                <input id="password" type="password" class="form-control" name="password" required>
                <div class="invalid-feedback">
                  Kata Sandi tidak valid
                </div>
              </div>

              <div class="d-flex align-items-center">
                <div class="form-check">
                  <input type="checkbox" name="remember" id="remember" class="form-check-input">
                  <label for="remember" class="form-check-label">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary ms-auto" name="submit">
                  Masuk
                </button>
              </div>
            </form>
          </div>
          <div class="card-footer py-3 border-0">
            <div class="text-center">
              Belum memiliki akun? <a href="register.php" class="text-dark">Daftar Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services">
  <div class="container-fluid p-0">
    <h6 class="text-center text-primary">Layanan Kami</h6>
    <h3 class="text-center display-5 fw-bold mb-3">Apa Yang Anda Dapatkan?</h3>
    <div class="row g-0 mt-5 justify-content-center">
      <div class="col-md-6 col-lg-3">
        <div class="service-post position-relative bg-primary">
          <img src="images/service1.png" class="service-img img-fluid" alt="img">
          <div class="position-absolute bottom-0 p-5">
            <h5 class="text-white">Video Pembelajaran Edukatif</h5>
            <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
            <a href="services-single.html">
              <!-- <h6 class="text-white text-decoration-underline">Lihat Semua</h6> -->
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="service-post position-relative bg-primary">
          <img src="images/service2.png" class="service-img img-fluid" alt="img">
          <div class="position-absolute bottom-0 p-5">
            <h5 class="text-white">Materi Ajar RPP Terupdate</h5>
            <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
            <a href="services-single.html">
              <!-- <h6 class="text-white text-decoration-underline">Lihat Semua</h6> -->
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="service-post position-relative bg-primary">
          <img src="images/service3.png" class="service-img img-fluid" alt="img">
          <div class="position-absolute bottom-0 p-5">
            <h5 class="text-white">Video dan Materi Downloadable</h5>
            <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
            <a href="services-single.html">
              <!-- <h6 class="text-white text-decoration-underline">Lihat Semua</h6> -->
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="service-post position-relative bg-primary">
          <img src="images/service4.png" class="service-img img-fluid" alt="img">
          <div class="position-absolute bottom-0 p-5">
            <h5 class="text-white">Akses Gratis dan Mudah</h5>
            <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
            <a href="services-single.html">
              <!-- <h6 class="text-white text-decoration-underline">Read more</h6> -->
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="blogs" class="padding-medium">
  <div class="container">
    <div class="mb-3 d-flex flex-wrap align-items-center justify-content-between">
      <div>
        <h6 class="text-primary">Materi Terbaru</h6>
        <h3 class="display-5 fw-bold mb-3">Lihat Materi Terbaru Kami</h3>
      </div>
      <a href="blog.html" class="btn btn-primary">Lihat Semuanya</a>
    </div>
    <div class="row mt-5 mt-lg-0">
      <?php while ($row = $topik->fetch_assoc()) { ?>
        <div class="col-md-4 mb-4">
          <a href="pages/index.php"><img src="https://img.youtube.com/vi/<?php echo $row['cover']; ?>/maxresdefault.jpg" alt="image" class="img-fluid"></a>
          <h6 class="text-primary mt-3"><?php echo $row['nama_topik']; ?></h6>
          <h3><a href="pages/index.php"><?php echo $row['judul_sub']; ?></a></h3>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<section id="contact-info" class="padding-small bg-gray">
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