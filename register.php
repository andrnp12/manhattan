<?php ?>

<!DOCTYPE html>
<html>
  <?php include('header.php'); ?>

<!-- <section id="slider">
  <div class="swiper position-relative">
    <div class="swiper-wrapper">
      Slide 1
      <div class="swiper-slide"
        style="background-image: url(images/slider-image.jpg);">
        <div class="container m-auto">
          <div class="text-start col-md-10">
            <h2 class="display-1 fw-bold text-white">Materi Ajar RPS Terbaik dan Terpadu</h2>
            <p class="text-white">Vero elitr justo clita dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
            <a href="services-single.html" class="btn btn-primary mt-3">Read More</a>
          </div>
        </div>
      </div>

      Slide 2
      <div class="swiper-slide"
        style="background-image: url(images/slider-image1.jpg);">
        <div class="container m-auto">
          <div class="text-start col-md-10">
            <h2 class="display-1 fw-bold text-white">Top Solar and Renewable Energy</h2>
            <p class="text-white">Vero elitr justo clita dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
            <a href="services-single.html" class="btn btn-primary mt-3">Read More</a>
          </div>
        </div>
      </div>

      Slide 3
      <div class="swiper-slide"
        style="background-image: url(images/slider-image2.jpg);">
        <div class="container m-auto">
          <div class="text-start col-md-10">
            <h2 class="display-1 fw-bold text-white">Top Solar and Renewable Energy</h2>
            <p class="text-white">Vero elitr justo clita dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
            <a href="services-single.html" class="btn btn-primary mt-3">Read More</a>
          </div>
        </div>
      </div>
    </div>

    Pagination & Navigation
    <div class="swiper-pagination slider-pagination position-absolute pb-5"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section> -->

  <!-- <section id="info" class="padding-medium">
    <div class="container">
      <div class="row">
        <div class="col-md-3 text-center mb-4 mb-lg-0">
          <h3 class="display-3 fw-bold text-primary">1999</h3>
          <h6>Happy Customer</h6>
        </div>
        <div class="col-md-3 text-center mb-4 mb-lg-0">
          <h3 class="display-3 fw-bold text-primary">1721</h3>
          <h6>project done</h6>
        </div>
        <div class="col-md-3 text-center mb-4 mb-lg-0">
          <h3 class="display-3 fw-bold text-primary">97</h3>
          <h6>award win</h6>
        </div>
        <div class="col-md-3 text-center mb-4 mb-lg-0">
          <h3 class="display-3 fw-bold text-primary">1650</h3>
          <h6>Expert worker</h6>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Bagian background di luar section -->
  <div class="bg-images"></div>

  <section class="section-images h-100" style="padding-bottom: 10rem !important;">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-lg-6">
					<!-- <div class="text-center my-5">
						<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
					</div> -->
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Daftar Akun Baru</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Username</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
									<div class="invalid-feedback">
										Username diperlukan	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Kata Sandi</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Kata Sandi diperlukan
							    	</div>
								</div>

                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">Kode Verifikasi</label>
									<input id="text" type="text" class="form-control" name="verifikasi" value="" disabled>
									<!-- <div class="invalid-feedback">
										Email is invalid
									</div> -->
								</div>

								<p class="form-text text-muted mb-3">
									Simpan kode verifikasi diatas dengan aman. Kode verifikasi akan diminta saat anda mencoba mereset kata sandi anda.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Daftar Sekarang	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Sudah memiliki akun? <a href="index.php" class="text-dark">Masuk</a>
							</div>
						</div>
					</div>
					<!-- <div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div> -->
				</div>
			</div>
		</div>
	</section>

  <!-- <section id="about-us" class="padding-medium">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="imageblock me-4 position-relative">
            <img class="img-fluid" src="images/materi.jpg" alt="img">
            <a type="button" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/W_tIumKa8VY"
              data-bs-target="#myModal" class="play-btn position-absolute top-50 start-50 translate-middle">
              <svg class="play-icon text-primary" width="70" height="70">
                <use xlink:href="#play"></use>
              </svg>
            </a>
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <h6 class="text-primary">Tentang Kami</h6>
          <h3 class="display-5 fw-bold mb-3">Situs Edukasi Bahan Ajar RPS dan Materi Pendidikan Terbaik</h3>
          <p>Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet. Tempor erat sed stet lorem
            sit clita duo justo elitr rebum at clita diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
            ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet
          </p>
          <a class="btn btn-primary mt-4" href="about.html">Jelajahi Sekarang</a>
        </div>
      </div>
    </div>
  </section> -->

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