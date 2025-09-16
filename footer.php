<section id="footer">
    <div class="container footer-container mt-5 pt-3">
      <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 my-5 py-5 ">
      <div class="col-md-12 col-lg-6 mb-6 mb-lg-0">
          <a href="index.php" class="d-flex align-items-center">
            <img src="images/main-logo.png" alt="Sola" class="img-fluid me-2 py-3">
            <!-- <h5 class="py-1">Sola</h5> -->
          </a>
          <ul class="nav flex-column">
            <li class="location text-capitalize d-flex align-items-center">
              <svg class="text-primary me-1" width="16" height="16">
                <use xlink:href="#location"></use>
              </svg>State Road 54 Trinity, Florida
            </li>
            <li class="phone text-capitalize d-flex align-items-center">
              <svg class="text-primary me-1" width="16" height="16">
                <use xlink:href="#phone"></use>
              </svg>+666 333 9999
            </li>
            <li class="time text-capitalize d-flex align-items-center">
              <svg class="text-primary me-1" width="16" height="16">
                <use xlink:href="#email"></use>
              </svg>yourdomain@email.com
            </li>
          </ul>
          <ul class="social-links d-flex flex-wrap list-unstyled mt-4">
            <!-- <li class="social me-4">
              <a href="#">
                <svg width="16" height="16">
                  <use xlink:href="#facebook"></use>
                </svg>
              </a>
            </li> -->
            <!-- <li class="social me-4">
              <a href="#">
                <svg width="16" height="16">
                  <use xlink:href="#twitter"></use>
                </svg>
              </a>
            </li> -->
            <!-- <li class="social me-4">
              <a href="#">
                <svg width="16" height="16">
                  <use xlink:href="#linkedin"></use>
                </svg>
              </a>
            </li> -->
            <li class="social me-4">
              <a href="#">
                <svg width="16" height="16">
                  <use xlink:href="#instagram"></use>
                </svg>
              </a>
            </li>
            <li class="social me-4">
              <a href="#">
                <svg width="16" height="16">
                  <use xlink:href="#youtube"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
          <h5 class="py-3">Quick links</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="text-uppercase p-0 "> About us </a></li>
            <li class="nav-item"><a href="#" class="text-uppercase p-0 "> Our Services </a></li>
            <li class="nav-item"><a href="#" class="text-uppercase p-0 "> Privacy Policy</a></li>
            <li class="nav-item"><a href="#" class="text-uppercase p-0 "> Contact us </a></li>
            <li class="nav-item"><a href="#" class="text-uppercase p-0 "> Support </a></li>
          </ul>
        </div>
        <!-- <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
          <h5 class="py-3">Project Gallery</h5>
          <div class="row g-1">
            <div class="col-4">
              <a href="images/post1.jpg" title="Sola" class="image-link"><img src="images/post1.jpg"
                  class="post-image img-fluid "></a>
            </div>
            <div class="col-4">
              <a href="images/post2.jpg" title="Sola" class="image-link"><img src="images/post2.jpg"
                  class="post-image img-fluid "></a>
            </div>
            <div class="col-4">
              <a href="images/post3.jpg" title="Sola" class="image-link"><img src="images/post3.jpg"
                  class="post-image img-fluid "></a>
            </div>
            <div class="col-4">
              <a href="images/post4.jpg" title="Sola" class="image-link"><img src="images/post4.jpg"
                  class="post-image img-fluid "></a>
            </div>
            <div class="col-4">
              <a href="images/post5.jpg" title="Sola" class="image-link"><img src="images/post5.jpg"
                  class="post-image img-fluid "></a>
            </div>
            <div class="col-4">
              <a href="images/post6.jpg" title="Sola" class="image-link"><img src="images/post6.jpg"
                  class="post-image img-fluid "></a>
            </div>
          </div>
        </div> -->
        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
          <h5 class="py-3">Our Newsletter</h5>
          <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
          <form class=" position-relative">
            <input type="text" class="form-control rounded-5 px-4 py-2 bg-transparent" placeholder="Your email address">
            <a href="#" class="position-absolute top-50 end-0 translate-middle-y bg-primary rounded-circle p-1 mx-1">
              <svg class="text-white" width="25" height="25">
                <use xlink:href="#send"></use>
              </svg>
            </a>
          </form>
        </div>

      </footer>
    </div>

    <hr class="text-black">

    <div class="container">
      <footer class="row align-items-center py-2">
        <div class="col-md-6 ">
          <p>© 2024 Sola - All rights reserved</p>

        </div>
        <div class="col-md-6 text-md-end">
          <p class="">Free Website Template:<a href="https://templatesjungle.com/" class="text-decoration-underline"
              target="_blank">TemplatesJungle</a></p>
        </div>

      </footer>
    </div>
  </section>

  <!-- Video Popup -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg class="bi" width="40"
              height="40">
              <use xlink:href="#close-sharp"></use>
            </svg></button>
          <div class="ratio ratio-16x9">
            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
              allow="autoplay"></iframe>
          </div>
        </div>

      </div>

    </div>
  </div>

  <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/plugins.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>