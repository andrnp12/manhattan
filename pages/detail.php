<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}

include('../function.php');

$id = $_GET['id'];

// panggil fungsi subtopik
$sub = detailsub($id);

// panggil fungsi topik
$topik = subtopik();

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section id="about-us" class="padding-small">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-10">
        <h3 class="display-5 fw-bold mb-3"><?php echo $sub['judul_sub']; ?></h3>
      </div>
      <div class="col-lg-12 pb-5">
        <p>
          <?php echo $sub['detail_sub']; ?>
        </p>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="col-lg-8">
        <h3 class="display-8 fw-bold mb-3">Video Edukasi Materi</h3>
      </div>
      <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000;">
        <iframe
          src="<?php echo $sub['link_video']; ?>"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        </iframe>
      </div>
    </div>
    <br>

    <div class="col-lg-12">
      <div class="col-lg-12 d-flex flex-wrap align-items-center justify-content-between pb-4 pt-5">
        <h3 class="display-8 fw-bold">Detail RPS Materi</h3>
        <div class="">
          <a class="btn btn-primary" href="../dashboard/uploads/<?php echo $sub['nama_rpp']; ?>">Download PDF Materi</a>
        </div>
      </div>
      <iframe
        src="https://docs.google.com/gview?embedded=true&url=https://b3c605ec45fd.ngrok-free.app/website-2/manhattan/dashboard/uploads/<?php echo urlencode($sub['nama_rpp']); ?>"
        style="width:100%; height:500px;"
        frameborder="0">
      </iframe>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-12 d-flex flex-wrap align-items-center justify-content-between pb-4 pt-5">
        <h3 class="display-8 fw-bold">Detail SKSS Laporan</h3>
        <div class="">
          <a class="btn btn-primary" href="../dashboard/uploads/<?php echo $sub['nama_lkp']; ?>">Download PDF Laporan</a>
        </div>
      </div>
      <iframe
        src="https://docs.google.com/gview?embedded=true&url=https://b3c605ec45fd.ngrok-free.app/website-2/manhattan/dashboard/uploads/<?php echo urlencode($sub['nama_lkp']); ?>"
        style="width:100%; height:500px;"
        frameborder="0">
      </iframe>
    </div>

  </div>
</section>

<section id="blogs" class="pb-5 mb-5">
  <div class="container">
    <div class="mb-3 d-flex flex-wrap align-items-center justify-content-between">
      <div>
        <h6 class="text-primary">Materi Terbaru</h6>
        <h3 class="display-5 fw-bold mb-3">Lihat Materi Terbaru Kami</h3>
      </div>
      <a href="index.php" class="btn btn-primary">Lihat Semuanya</a>
    </div>
    <div class="row mt-5 mt-lg-0">
      <?php while ($row = $topik->fetch_assoc()) { ?>
        <div class="col-md-4 mb-4">
          <a href="detail.php?id=<?php echo $row['id_sub']; ?>"><img src="https://img.youtube.com/vi/<?php echo $row['cover']; ?>/maxresdefault.jpg" alt="image" class="img-fluid"></a>
          <h6 class="text-primary mt-3"><?php echo $row['nama_topik']; ?></h6>
          <h3><a href="detail.php?id=<?php echo $row['id_sub']; ?>"><?php echo $row['judul_sub']; ?></a></h3>
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