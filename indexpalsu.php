<?php ?>

<!DOCTYPE html>
<html>
  <?php include('header.php'); ?>

<section id="slider">
  <div class="swiper position-relative">
    <div class="swiper-wrapper">
      <!-- Slide 1 -->
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

      <!-- Slide 2 -->
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

      <!-- Slide 3 -->
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

    <!-- Pagination & Navigation -->
    <div class="swiper-pagination slider-pagination position-absolute pb-5"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

<style>
  /* FIX: pastikan semua slide punya ukuran */
  #slider .swiper {
    width: 100%;
    height: 90vh;
  }
  #slider .swiper-slide {
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
  }
</style>

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

  <section id="about-us" class="padding-medium">
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
  </section>

  <section id="services">
    <div class="container-fluid p-0">
      <h6 class="text-center text-primary">Layanan Kami</h6>
      <h3 class="text-center display-5 fw-bold mb-3">Apa Yang Kami Tawarkan</h3>
      <div class="row g-0 mt-5 justify-content-center">
        <div class="col-md-6 col-lg-3">
          <div class="service-post position-relative bg-primary">
            <img src="images/service1.jpg" class="service-img img-fluid" alt="img">
            <div class="position-absolute bottom-0 p-5">
              <h5 class="text-white">Video Pembelajaran Edukatif</h5>
              <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
              <a href="services-single.html">
                <h6 class="text-white text-decoration-underline">Lihat Semua</h6>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-post position-relative bg-primary">
            <img src="images/service2.jpg" class="service-img img-fluid" alt="img">
            <div class="position-absolute bottom-0 p-5">
              <h5 class="text-white">Materi Ajar RPS Terupdate</h5>
              <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
              <a href="services-single.html">
                <h6 class="text-white text-decoration-underline">Lihat Semua</h6>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-post position-relative bg-primary">
            <img src="images/service3.jpg" class="service-img img-fluid" alt="img">
            <div class="position-absolute bottom-0 p-5">
              <h5 class="text-white">Video dan Materi Downloadable</h5>
              <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
              <a href="services-single.html">
                <h6 class="text-white text-decoration-underline">Lihat Semua</h6>
              </a>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-3">
          <div class="service-post position-relative bg-primary">
            <img src="images/service1.jpg" class="service-img img-fluid" alt="img">
            <div class="position-absolute bottom-0 p-5">
              <h5 class="text-white">Solar panels</h5>
              <p class="text-white">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
              <a href="services-single.html">
                <h6 class="text-white text-decoration-underline">Read more</h6>
              </a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- <section id="feature" class="padding-medium">
    <div class="container">
      <h6 class="text-primary">Why Choose Us!</h6>
      <h3 class="display-5 fw-bold mb-3">Our motive to change world</h3>
      <p>Aliqu diam amet diam et dolor diam ipsum sit tet lorem sit clita duo eos. <br> Clita erat ipsum et lorem et
        sit, sed tempor erat elitr rebum at clita. </p>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="position-relative">
            <h2 style="color:#F9F4EC; -webkit-text-stroke: 1px #E6E1D9; font-size: 130px; ">01</h2>
            <h6 class="position-absolute top-50 start-50 translate-end m-0">Quality services</h6>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="position-relative">
            <h2 style="color:#F9F4EC; -webkit-text-stroke: 1px #E6E1D9; font-size: 130px; ">02</h2>
            <h6 class="position-absolute top-50 start-50 translate-end m-0">expertise workers</h6>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="position-relative">
            <h2 style="color:#F9F4EC; -webkit-text-stroke: 1px #E6E1D9; font-size: 130px; ">03</h2>
            <h6 class="position-absolute top-50 start-50 translate-end m-0">Free consulting</h6>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="position-relative">
            <h2 style="color:#F9F4EC; -webkit-text-stroke: 1px #E6E1D9; font-size: 130px; ">04</h2>
            <h6 class="position-absolute top-50 start-50 translate-end m-0">Customer support</h6>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- <section id="projects" class="padding-medium">
    <div class="container">
      <h6 class="text-center text-primary">Materi Kami</h6>
      <h3 class="text-center display-5 fw-bold ">Lihat Seluruh Materi Kami</h3>
      <div class="my-4">
        <p class="text-center">
          <button class="filter-button px-3 me-2 mb-3 active" data-filter="*">All</button>
          <button class="filter-button px-3 me-2 mb-3" data-filter=".energy">Energy</button>
          <button class="filter-button px-3 me-2 mb-3" data-filter=".wind">Wind Turbines</button>
          <button class="filter-button px-3 me-2 mb-3" data-filter=".renew">Renewable</button>
        </p>
      </div>

      <div class="isotope-container">
        <div class="row">
          <div class="col-md-4 item energy mb-4">
            <a href="project-single.html"><img src="images/project1.jpg" alt="image" class="img-fluid"></a>
            <h6 class="text-primary mt-3">energy</h6>
            <h3><a href="project-single.html">Houston roof solaring</a></h3>
          </div>
          <div class="col-md-4 item wind mb-4">
            <a href="project-single.html"><img src="images/project2.jpg" alt="image" class="img-fluid"></a>
            <h6 class="text-primary mt-3">wind</h6>
            <h3><a href="project-single.html">City solar light</a></h3>
          </div>
          <div class="col-md-4 item renew mb-4">
            <a href="project-single.html"><img src="images/project3.jpg" alt="image" class="img-fluid"></a>
            <h6 class="text-primary mt-3">renew</h6>
            <h3><a href="project-single.html">solar power house</a></h3>
          </div>
          <div class="col-md-4 item wind mb-4">
            <a href="project-single.html"><img src="images/project4.jpg" alt="image" class="img-fluid"></a>
            <h6 class="text-primary mt-3">wind</h6>
            <h3><a href="project-single.html">rooftop solaring</a></h3>
          </div>
          <div class="col-md-4 item energy mb-4">
            <a href="project-single.html"><img src="images/project5.jpg" alt="image" class="img-fluid"></a>
            <h6 class="text-primary mt-3">energy</h6>
            <h3><a href="project-single.html">adjustment solaring</a></h3>
          </div>
          <div class="col-md-4 item renew mb-4">
            <a href="project-single.html"><img src="images/project6.jpg" alt="image" class="img-fluid"></a>
            <h6 class="text-primary mt-3">renew</h6>
            <h3><a href="project-single.html">wind turbining</a></h3>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section> -->

  <!-- <section id="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-1 offset-md-1 ">
          <div class="me-3">
            <svg class="text-primary me-1" width="60px" height="60px">
              <use xlink:href="#quote"></use>
            </svg>
          </div>
        </div>
        <div class="col-md-9">
          <div class="swiper testimonial-swiper mt-3">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="review">
                  <div class="review-content">
                    <p class="fs-3 fst-italic fw-light lh-base">At the core of our practice is the idea that cities are
                      the incubators of our greatest achievements, and the best hope for a sustainable future. </p>
                    <h6 class="fw-bold">John Geoffrey <span class="fw-normal">| director</span></h6>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review">
                  <div class="review-content">
                    <p class="fs-3 fst-italic fw-light lh-base">At the core of our practice is the idea that cities are
                      the incubators of our greatest achievements, and the best hope for a sustainable future. </p>
                    <h6 class="fw-bold">John Geoffrey <span class="fw-normal">| director</span></h6>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review">
                  <div class="review-content">
                    <p class="fs-3 fst-italic fw-light lh-base">At the core of our practice is the idea that cities are
                      the incubators of our greatest achievements, and the best hope for a sustainable future. </p>
                    <h6 class="fw-bold">John Geoffrey <span class="fw-normal">| director</span></h6>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review">
                  <div class="review-content">
                    <p class="fs-3 fst-italic fw-light lh-base">At the core of our practice is the idea that cities are
                      the incubators of our greatest achievements, and the best hope for a sustainable future. </p>
                    <h6 class="fw-bold">John Geoffrey <span class="fw-normal">| director</span></h6>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review">
                  <div class="review-content">
                    <p class="fs-3 fst-italic fw-light lh-base">At the core of our practice is the idea that cities are
                      the incubators of our greatest achievements, and the best hope for a sustainable future. </p>
                    <h6 class="fw-bold">John Geoffrey <span class="fw-normal">| director</span></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination testimonial-pagination text-start position-relative mt-4"></div>
          </div>
        </div>
      </div>

  </section> -->

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
        <div class="col-md-4 mb-4">
          <a href="blog-single.html"><img src="images/blog1.jpg" alt="image" class="img-fluid"></a>
          <h6 class="text-primary mt-3">16 Feb, 2024</h6>
          <h3><a href="blog-single.html">New research for green life</a></h3>
        </div>
        <div class="col-md-4 mb-4">
          <a href="blog-single.html"><img src="images/blog2.jpg" alt="image" class="img-fluid"></a>
          <h6 class="text-primary mt-3">16 Feb, 2024</h6>
          <h3><a href="blog-single.html">Happy city after energized</a></h3>
        </div>
        <div class="col-md-4 mb-4">
          <a href="blog-single.html"><img src="images/blog3.jpg" alt="image" class="img-fluid"></a>
          <h6 class="text-primary mt-3">16 Feb, 2024</h6>
          <h3><a href="blog-single.html">Turbines helped alot for people</a></h3>
        </div>
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