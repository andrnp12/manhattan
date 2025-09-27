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

// panggil fungsi kategori
$satu = kategorisatu();

// panggil fungsi filter data kategori
$filter = filterdata();

// panggil fungsi subtopik
$sub = subtopik('');

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section id="projects" class="padding-small">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div>
        <h6 class="text-primary">Materi Kami</h6>
        <h3 class="display-5 fw-bold ">Lihat Seluruh Materi Kami</h3>
      </div>
      <div class="my-4">
        <div class="dropdown">
          <button class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" role="button"
            aria-expanded="false">Kategori</button>
          <ul class="dropdown-menu animate border-0 shadow">
            <li class="dropdown-submenu">
              <?php
              while ($row = $satu->fetch_assoc()) { ?>
                <a class="dropdown-item text-uppercase" tabindex="-1" href="#" data-category="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori']; ?> </a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="my-4">
      <!-- Tempat muncul filter tags -->
      <div id="filterTags" class="mb-4" style="display: none;"></div>
    </div>

    <div class="grid-container">
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

<!-- Script -->
<script>
  // Data filter per kategori
  const filterData = <?php echo json_encode($filter, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>;

  // Buka submenu dropdown Bootstrap 5 saat diklik
  document.querySelectorAll('.dropdown-submenu > a').forEach(a => {
    a.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      const submenu = this.nextElementSibling;
      if (submenu) submenu.classList.toggle('show');
    });
  });

  // Klik dropdown item kategori
  document.querySelectorAll('.dropdown-item[data-category]').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      const category = this.dataset.category;

      const filterTagsContainer = document.getElementById('filterTags');
      filterTagsContainer.style.display = "block";
      filterTagsContainer.innerHTML = '';

      (filterData[category] || []).forEach(tag => {
        const btn = document.createElement('button');
        btn.className = "btn btn-outline-primary me-2 mb-2";
        btn.textContent = tag.label;
        btn.dataset.filter = tag.value;

        btn.addEventListener('click', function() {
          // Hapus active dari semua tombol dalam container yang sama
          filterTagsContainer.querySelectorAll('button').forEach(b => b.classList.remove('active'));
          // Tambahkan active pada tombol ini
          this.classList.add('active');

          const filterValue = this.dataset.filter;
          const items = document.querySelectorAll('.grid-container .item');

          items.forEach(el => {
            if (filterValue === "*" || el.classList.contains(filterValue)) {
              el.classList.remove('hidden');
              el.style.display = 'block';
              setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'scale(1)';
              }, 10);
            } else {
              el.style.opacity = '0';
              el.style.transform = 'scale(0.95)';
              setTimeout(() => el.style.display = 'none', 300);
              el.classList.add('hidden');
            }
          });
        });

        filterTagsContainer.appendChild(btn);
      });

      // Tutup dropdown setelah pilih
      const dropdown = this.closest('.dropdown-menu');
      if (dropdown) dropdown.classList.remove('show');
    });
  });
</script>

</html>