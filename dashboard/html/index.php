<?php
include(__DIR__ . '../../data/data_dummy.php');
include(__DIR__ . '../../function/koneksi.php');

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../../index.php");
}

ob_start();
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

    <!--  Sidebar Start -->
    <?php include 'component/sidebar.php'; ?>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php include 'component/header.php'; ?>
      <!--  Header End -->
      <div class="body-wrapper-inner" id="content">
        <!-- Konten awal akan dimuat di sini -->

        <?php
        if (isset($_GET['page']) && !empty($_GET['page'])) {
          $page = $_GET['page'];
          $file = __DIR__ . "/pages/{$page}.php";

          if (file_exists($file)) {
            include $file;
          } else {
            echo "<h2 class='text-danger p-5'>Halaman tidak ditemukan.</h2>";
          }
        } else {
        ?>

          <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row row-cols-1 row-cols-md-2">
              <div class="col">
                <div class="card bg-danger-subtle shadow-none w-100">
                  <div class="card-body">
                    <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-6">
                        <div
                          class="rounded-circle-shape bg-danger px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                          <iconify-icon icon="solar:users-group-rounded-bold-duotone"
                            class="fs-7 text-white"></iconify-icon>
                        </div>
                        <h6 class="mb-0 fs-4 fw-medium text-muted">
                          Jumlah Kategori
                        </h6>
                      </div>
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i
                                class="fs-4 ti ti-plus"></i>Add</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row align-items-end justify-content-between pt-4">
                      <div class="col-5">
                        <h2 class="mb-6 fs-8">4,562</h2>
                        <!-- <span class="badge rounded-pill border border-muted fw-bold text-muted fs-2 py-1">+23% last
                            month</span> -->
                      </div>
                      <div class="col-5">
                        <div id="total-followers" class="rounded-bars"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card bg-secondary-subtle shadow-none w-100">
                  <div class="card-body">
                    <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-6">
                        <div
                          class="rounded-circle-shape bg-secondary px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                          <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7 text-white"></iconify-icon>
                        </div>
                        <h6 class="mb-0 fs-4 fw-medium text-muted">
                          Jumlah Topik
                        </h6>
                      </div>
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i
                                class="fs-4 ti ti-plus"></i>Add</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row align-items-center justify-content-between pt-4">
                      <div class="col-5">
                        <h2 class="mb-6 fs-8 text-nowrap">$6,280</h2>
                      </div>
                      <div class="col-5">
                        <div id="total-income"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card bg-success-subtle shadow-none w-100">
                  <div class="card-body">
                    <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-6">
                        <div
                          class="rounded-circle-shape bg-success px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                          <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7 text-white"></iconify-icon>
                        </div>
                        <h6 class="mb-0 fs-4 fw-medium text-muted">
                          Jumlah RPP
                        </h6>
                      </div>
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i
                                class="fs-4 ti ti-plus"></i>Add</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row align-items-center justify-content-between pt-4">
                      <div class="col-5">
                        <h2 class="mb-6 fs-8 text-nowrap">$6,280</h2>
                      </div>
                      <div class="col-5">
                        <div id="total-income"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card bg-info-subtle shadow-none w-100">
                  <div class="card-body">
                    <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-6">
                        <div
                          class="rounded-circle-shape bg-info px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                          <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7 text-white"></iconify-icon>
                        </div>
                        <h6 class="mb-0 fs-4 fw-medium text-muted">
                          Jumlah video
                        </h6>
                      </div>
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i
                                class="fs-4 ti ti-plus"></i>Add</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row align-items-center justify-content-between pt-4">
                      <div class="col-5">
                        <h2 class="mb-6 fs-8 text-nowrap">$6,280</h2>
                      </div>
                      <div class="col-5">
                        <div id="total-income"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!--  Body Wrapper End-->

<?php
        }
?>




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



</body>

</html>

<?php
ob_end_flush();
?>