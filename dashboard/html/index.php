<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$file = "pages/$page.php";

// Jika request AJAX, kirim hanya konten
if (
  !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
) {

  if (file_exists($file)) {
    include $file;
  } else {
    echo "<h2>Halaman tidak ditemukan</h2>";
  }
  exit;
}

include(__DIR__ . '../../data/data_dummy.php');
include(__DIR__ . '../../function/index.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MaterailM Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" onclick="loadPage('dashboard'); return false;" aria-expanded="false">
                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="index.php?page=category" onclick="loadPage('category'); return false;" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <iconify-icon icon="solar:widget-add-line-duotone" class=""></iconify-icon>
                  </span>
                  <span class="hide-menu">Kategori</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="index.php?page=topik" onclick="loadPage('topik'); return false;" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                  </span>
                  <span class="hide-menu">Topik</span>
                </div>
                <!-- <span class="hide-menu badge bg-secondary-subtle text-secondary fs-1 py-1">Pro</span> -->
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#" onclick="loadPage('materi'); return false;" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <iconify-icon icon="solar:layers-line-duotone" class=""></iconify-icon>
                  </span>
                  <span class="hide-menu">Materi</span>
                </div>
                <!-- <span class="hide-menu badge bg-secondary-subtle text-secondary fs-1 py-1">Pro</span> -->
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#" onclick="loadPage('rpp'); return false;" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <iconify-icon icon="solar:layers-line-duotone" class=""></iconify-icon>
                  </span>
                  <span class="hide-menu">RPP</span>
                </div>
                <!-- <span class="hide-menu badge bg-secondary-subtle text-secondary fs-1 py-1">Pro</span> -->
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#" onclick="loadPage('lkp'); return false;" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <iconify-icon icon="solar:layers-line-duotone" class=""></iconify-icon>
                  </span>
                  <span class="hide-menu">LKP</span>
                </div>
                <!-- <span class="hide-menu badge bg-secondary-subtle text-secondary fs-1 py-1">Pro</span> -->
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#" onclick="loadPage('video'); return false;" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <iconify-icon icon="solar:layers-line-duotone" class=""></iconify-icon>
                  </span>
                  <span class="hide-menu">video</span>
                </div>
                <!-- <span class="hide-menu badge bg-secondary-subtle text-secondary fs-1 py-1">Pro</span> -->
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Auth</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <iconify-icon icon="solar:login-3-line-duotone"></iconify-icon>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <iconify-icon icon="solar:user-plus-rounded-line-duotone"></iconify-icon>
                <span class="hide-menu">Register</span>
              </a>
            </li>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="body-wrapper-inner" id="content">
        <!-- Konten awal akan dimuat di sini -->
        <?php
        if (file_exists($file)) include $file;
        else echo "<h2>Halaman tidak ditemukan</h2>";
        ?>
      </div>
    </div>
  </div>
  </div>

  <!-- model form tambah -->
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">Form Input</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="simpan.php" method="POST">
          <input type="hidden" name="tipe" id="tipe">

          <div class="modal-body">
            <!-- Field kategori -->
            <div class="mb-3 d-none" id="fieldKategori">
              <label class="form-label">Nama Kategori</label>
              <input type="text" class="form-control" name="kategori" required>
            </div>

            <!-- Field topik -->
            <div class="mb-3 d-none" id="fieldTopikKategori">
              <label class="form-label">Pilih Kategori</label>
              <select class="form-select" name="kategori_id" id="kategoriSelect" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($categories as $item) : ?>
                  <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3 d-none" id="fieldTopik">
              <label class="form-label">Judul Topik</label>
              <input type="text" class="form-control" name="topik" required>
            </div>

            <!-- Field topik -->
            <div class="mb-3 d-none" id="fieldRppTopik">
              <label class="form-label">Pilih Topik</label>
              <select class="form-select" name="topik_id" id="topikSelect" required>
                <option value="">-- Pilih Topik --</option>
              </select>
            </div>

            <!-- Field sub topik -->
            <div class="mb-3 d-none" id="fieldSubTopik">
              <label class="form-label">Judul Sub Topik</label>
              <input type="text" class="form-control" name="subTopik" required>
            </div>

            <!-- field RPP -->
            <div class="mb-3 d-none" id="fieldRpp">
              <label class="form-label">Judul RPP</label>
              <input type="text" class="form-control" name="rpp" required>

              <label for="filePdf" class="form-label mt-2">Upload File PDF RPP</label>
              <input class="form-control" type="file" id="filePdf" name="file_pdf" accept="application/pdf" required>
            </div>




            <!-- field LKP -->
            <div class="mb-3 d-none" id="fieldLkp">
              <label class="form-label">Judul LKP</label>
              <input type="text" class="form-control" name="lkp" required>

              <label for="filePdf" class="form-label mt-2">Upload File PDF LKP</label>
              <input class="form-control" type="file" id="filePdf2" name="file_pdf" accept="application/pdf" required>
            </div>

            <!-- Field video -->
            <div class="mb-3 d-none" id="fieldVideo">
              <label class="form-label">Judul Video</label>
              <input type="text" class="form-control" name="video" required>

              <label for="fileVideo" class="form-label mt-2">Upload File Video</label>
              <input class="form-control" type="url" id="linkVideo" name="link_video" placeholder="Masukkan link video YouTube" required>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- modal form edit -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Form Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="simpan.php" method="POST">
          <input type="hidden" name="tipe" value="kategori">
          <input type="hidden" name="id" id="editId">
          <div class="modal-body">
            <!-- <div class="mb-3">
              <label class="form-label">Nama Kategori</label>
              <input type="text" class="form-control" name="kategori" id="editKategori">
            </div>
            <div class="mb-3">
              <label class="form-label">Judul Topik</label>
              <input type="text" class="form-control" name="topik" id="editTopik">
            </div>
            <div class="mb-3">
              <label class="form-label">Judul Sub Topik</label>
              <input type="text" class="form-control" name="sub_topik" id="editSubTopik">
            </div> -->
            <div class="mb-3">
              <label class="form-label">Judul Sub Topik</label>
              <input type="text" class="form-control" name="sub_topik" id="editSubTopik">
            </div>
            <div class="mb-3">
              <label class="form-label">Judul RPP</label>
              <input type="text" class="form-control" name="rpp" id="editRpp">

              <label class="form-label mt-2">Upload File RPP</label>
              <input class="form-control" type="file" id="editFilePdf" name="file_pdf" accept="application/pdf">
            </div>
            <div class="mb-3">
              <label class="form-label">Judul LKP</label>
              <input type="text" class="form-control" name="lkp" id="editLkp">

              <label class="form-label mt-2">Upload File LKP</label>
              <input class="form-control" type="file" id="editFilePdf" name="file_pdf" accept="application/pdf">
            </div>
            <div class="mb-3">
              <label class="form-label">Judul Video</label>
              <input type="text" class="form-control" name="video" id="editVideo">

              <label for="fileVideo" class="form-label mt-2">Upload File Video</label>
              <input class="form-control" type="url" id="editLink" name="link_video" placeholder="Masukkan link video YouTube">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <!-- fungsi seperti single page aplication -->

  <script>
    function setActiveLink(linkElement) {
      document.querySelectorAll('.sidebar-link').forEach(link => link.classList.remove('active'));
      linkElement.classList.add('active');
      localStorage.setItem('activeLink', linkElement.textContent.trim());
    }

    function loadPage(page) {
      fetch(`index.php?page=${page}`, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(res => res.text())
        .then(html => {
          document.getElementById('content').innerHTML = html;
          history.pushState({}, '', `?page=${page}`);
          localStorage.setItem('lastPage', page);
        })
        .catch(() => {
          document.getElementById('content').innerHTML = '<h2>Halaman tidak ditemukan.</h2>';
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
      // Cek apakah ada ?page= di URL
      const urlParams = new URLSearchParams(window.location.search);
      const page = urlParams.get('page') || localStorage.getItem('lastPage') || 'dashboard';

      loadPage(page);

      // Tandai link aktif
      const activeLinkText = localStorage.getItem('activeLink');
      if (activeLinkText) {
        document.querySelectorAll('.sidebar-link').forEach(link => {
          if (link.textContent.trim() === activeLinkText) {
            link.classList.add('active');
          }
        });
      }
    });

    // Supaya tombol back/forward browser tetap bekerja
    window.addEventListener('popstate', () => {
      const urlParams = new URLSearchParams(window.location.search);
      const page = urlParams.get('page') || 'dashboard';
      loadPage(page);
    });
  </script>

  <!-- mengatur form modal input -->
  <script>
    // daftar konfigurasi field berdasarkan tipe 
    const config = {
      kategori: ['fieldKategori'],
      topik: ['fieldTopikKategori', 'fieldTopik'],
      rpp: ['fieldTopikKategori', 'fieldRppTopik', 'fieldRpp'],
      video: ['fieldTopikKategori', 'fieldRppTopik', 'fieldVideo'],
      materi: ['fieldTopikKategori', 'fieldRppTopik', 'fieldSubTopik', 'fieldRpp', 'fieldLkp', 'fieldVideo']
    };

    function openModal(tipe) {
      document.getElementById('tipe').value = tipe;
      document.getElementById('formModalLabel').textContent = 'Tambah ' + tipe.charAt(0).toUpperCase() + tipe.slice(1);

      // sembunyikan semua field dulu 
      document.querySelectorAll('#formModal .mb-3').forEach(el => el.classList.add('d-none'));

      // reset form input 
      document.querySelector('#formModal form').reset();

      // sembunyikan semua field + hilangkan required 
      document.querySelectorAll('#formModal .mb-3').forEach(el => {
        el.classList.add('d-none');
        el.querySelectorAll('input, select, textarea').forEach(input => {
          input.removeAttribute('required');
        });
      });

      // ambil field yang sesuai dengan tipe 
      const fields = config[tipe] || [];
      fields.forEach(id => {
        const field = document.getElementById(id);

        if (!field) return;

        field.classList.remove('d-none');

        const inputs = field.querySelectorAll('input, select, textarea');
        inputs.forEach(el => {
          el.setAttribute('required', true);
        });
      })



      if (tipe === 'kategori') {
        document.getElementById('fieldKategori').classList.remove('d-none');
      }

      if (tipe === 'topik') {
        document.getElementById('fieldTopikKategori').classList.remove('d-none');
        document.getElementById('fieldTopik').classList.remove('d-none');
      }

      if (tipe === 'rpp') {
        document.getElementById('fieldTopikKategori').classList.remove('d-none');
        document.getElementById('fieldRppTopik').classList.remove('d-none');
        document.getElementById('fieldRpp').classList.remove('d-none');
      }

      if (tipe === 'video') {
        document.getElementById('fieldTopikKategori').classList.remove('d-none');
        document.getElementById('fieldRppTopik').classList.remove('d-none');
        document.getElementById('fieldVideo').classList.remove('d-none');
      }

      if (tipe === 'materi') {
        document.getElementById('fieldTopikKategori').classList.remove('d-none');
        document.getElementById('fieldRppTopik').classList.remove('d-none');
        document.getElementById('fieldSubTopik').classList.remove('d-none');
        document.getElementById('fieldRpp').classList.remove('d-none');
        document.getElementById('fieldLkp').classList.remove('d-none');
        document.getElementById('fieldVideo').classList.remove('d-none');
        document.getElementById('topik').setAttribute('required', true);
      }
    }
  </script>

  <!-- mengisi data di modal edit -->
  <script>
    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var data = button.dataset;

      console.log(data);

      // loop isi daat
      Object.keys(data).forEach(function(key) {
        var modalInput = editModal.querySelector('#edit' + key.charAt(0).toUpperCase() + key.slice(1));
        if (modalInput) {
          modalInput.value = data[key] || '';
        }
      })
    });
  </script>

  <!-- mengatur dropdown topik berdasarkan kategori di modal -->
  <script>
    // ambil data dari PHP ke JS
    const categories = <?php echo json_encode($categories); ?>;

    const kategoriSelect = document.getElementById('kategoriSelect');
    const topikSelect = document.getElementById('topikSelect');

    kategoriSelect.addEventListener('change', function() {
      const kategoriId = this.value;
      topikSelect.innerHTML = ''; // kosongkan dulu

      if (!kategoriId) {
        topikSelect.innerHTML = '<option value="">-- Pilih Topik --</option>';
        return;
      }

      const kategori = categories.find(c => c.id == kategoriId);

      if (kategori && kategori.topics.length > 0) {
        topikSelect.innerHTML = '<option value="">-- Pilih Topik --</option>';
        kategori.topics.forEach(topik => {
          const opt = document.createElement('option');
          opt.value = topik.id;
          opt.textContent = topik.title;
          topikSelect.appendChild(opt);
        });
      } else {
        topikSelect.innerHTML = '<option disabled>Belum ada topik di kategori ini</option>';
      }
    });
  </script>

</body>

</html>