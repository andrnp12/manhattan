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

$keyword = $_GET['search'];
$sub = cari($keyword);

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section id="projects" class="padding-small">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div>
                <h6 class="text-primary">Materi Kami</h6>
                <h3 class="display-5 fw-bold ">Berikut Hasil Pencarian Dari <?php echo $keyword; ?></h3>
            </div>
        </div>

        <div class="grid-container mt-4">
            <div class="row">
                <?php
                while ($row = $sub->fetch_assoc()) { ?>
                    <div class="col-md-4 item <?php echo $row['id_topik']; ?> mb-4">
                        <a href="detail.php?id=<?php echo $row['id_sub']; ?>"><img src="https://img.youtube.com/vi/<?php echo $row['cover']; ?>/maxresdefault.jpg" alt="image" class="img-fluid"></a>
                        <h6 class="text-primary mt-3"><?php echo $row['nama_topik']; ?></h6>
                        <h3><a href="detail.php?id=<?php echo $row['id_sub']; ?>"><?php echo $row['judul_sub']; ?></a></h3>
                    </div>
                <?php } ?>
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