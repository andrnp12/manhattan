<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Swiper Test</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    .swiper {
      width: 100%;
      height: 90vh;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body>

  <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide" style="background-image:url('https://picsum.photos/id/1015/1920/1080')"></div>
      <div class="swiper-slide" style="background-image:url('https://picsum.photos/id/1016/1920/1080')"></div>
      <div class="swiper-slide" style="background-image:url('https://picsum.photos/id/1018/1920/1080')"></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: {
        delay: 2000,
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
</body>
</html>
