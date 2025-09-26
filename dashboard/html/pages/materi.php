<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
} else {
    if ($_SESSION['role'] != 0) {
        session_destroy();
        header("Location: ../../index.php");
    }
}

// include(__DIR__ . '../../../data/data_dummy.php');

include(__DIR__ . '../../../function/database_function.php');

// ambil data kategori dari database
$categories = getCategories();

// Ambil semua topik
$topics = getAllTopics();

// Gabungkan topik ke dalam masing-masing kategori
foreach ($categories as &$cat) {
    $cat['topics'] = array_values(array_filter($topics, function ($t) use ($cat) {
        return $t['id_kategori'] == $cat['id_kategori'];
    }));
}

// ambil data materi dari database
$materi = getAllMateri();

// fungsi untuk membersihkan nama
// fungsi helper untuk bersihin nama
function sanitizeFileName($name)
{
    // hilangkan ekstensi
    $name = pathinfo($name, PATHINFO_FILENAME);
    // hilangkan suffix lama (_rpp atau _lkp) kalau ada
    $name = preg_replace('/(_rpp|_lkp)$/i', '', $name);
    // ganti spasi jadi underscore
    $name = preg_replace('/\s+/', '_', $name);
    // hanya huruf/angka/underscore
    $name = preg_replace('/[^A-Za-z0-9_]/', '', $name);
    return strtolower($name);
}

// menambahkan materi
if (isset($_POST['submit'])) {
    $target_dir = "../uploads/";

    $kategori_id = $_POST['kategori_id'];
    $id_topik    = $_POST['topik_id'];
    $judul_sub  = $_POST['subTopik'];
    $detail_sub   = $_POST['deskSubTopik'];
    $judul_rpp   = sanitizeFileName($_POST['rpp']);
    $judul_lkp   = sanitizeFileName($_POST['lkp']);
    $link_video  = $_POST['linkVideo'];

    // ambil kode unik yutube
    preg_match('/embed\/([^?]+)/', $link_video, $matches);
    $cover = $matches[1];


    // --- Upload RPP ---
    if (isset($_FILES['filePdfRpp']) && $_FILES['filePdfRpp']['error'] == 0) {
        $extRpp    = strtolower(pathinfo($_FILES["filePdfRpp"]["name"], PATHINFO_EXTENSION));
        $customRpp = preg_replace("/[^a-zA-Z0-9_-]/", "_", $judul_rpp) . "_rpp." . $extRpp;
        if ($extRpp === "pdf") {
            move_uploaded_file($_FILES["filePdfRpp"]["tmp_name"], $target_dir . $customRpp);
        }
    }

    // --- Upload LKP ---
    if (isset($_FILES['filePdfLkp']) && $_FILES['filePdfLkp']['error'] == 0) {
        $extLkp    = strtolower(pathinfo($_FILES["filePdfLkp"]["name"], PATHINFO_EXTENSION));
        $customLkp = preg_replace("/[^a-zA-Z0-9_-]/", "_", $judul_lkp) . "_lkp." . $extLkp;
        if ($extLkp === "pdf") {
            move_uploaded_file($_FILES["filePdfLkp"]["tmp_name"], $target_dir . $customLkp);
        }
    }

    // Simpan ke DB
    if (!empty($id_topik) && !empty($cover)  && !empty($judul_sub) && !empty($detail_sub)  && !empty($link_video) && !empty($customRpp) && !empty($customLkp)) {
        $result = addMateri($id_topik, $cover, $judul_sub, $detail_sub, $link_video, $customRpp, $customLkp);
        if ($result) {
            header("Location: index.php?page=materi&success=1");
            exit;
        } else {
            header("Location: index.php?page=materi&error=1");
            exit;
        }
    }
}

// menampilkan pesan tambah gagak dan berhasil 
if (isset($_GET['success'])) {
    echo "<script>alert('Materi berhasil ditambahkan!');</script>";
} elseif (isset($_GET['error'])) {
    echo "<script>alert('Materi gagal ditambahkan!');</script>";
}


// edit materi
if (isset($_POST['edit_submit'])) {
    $id_sub     = $_POST['editMateriId'];
    $judul_sub  = $_POST['editSubTopik'];
    $detail_sub = $_POST['editDeskSubTopik'];
    $judul_rpp  = sanitizeFileName($_POST['editRpp']);
    $judul_lkp  = sanitizeFileName($_POST['editLkp']);
    $link_video = $_POST['editLinkVideo'];

    // ambil kode unik yutube
    preg_match('/embed\/([^?]+)/', $link_video, $matches);
    $cover = $matches[1];

    $oldRpp = $_POST['oldRpp'];
    $oldLkp = $_POST['oldLkp'];

    $rpp = $oldRpp;
    $lkp = $oldLkp;

    // Upload / Rename RPP
    if (isset($_FILES['editFilePdfRpp']) && $_FILES['editFilePdfRpp']['error'] == 0) {
        $extRpp = pathinfo($_FILES['editFilePdfRpp']['name'], PATHINFO_EXTENSION);
        $newRppName = $judul_rpp . "_rpp." . $extRpp;
        $target_dir = "../uploads/" . $newRppName;

        if (move_uploaded_file($_FILES['editFilePdfRpp']['tmp_name'], $target_dir)) {
            if ($oldRpp && file_exists("../uploads/" . $oldRpp)) {
                unlink("../uploads/" . $oldRpp);
            }
            $rpp = $newRppName;
        }
    } else {
        // jika rename RPP (tanpa upload baru)
        if (!empty($oldRpp)) {
            $extRpp = pathinfo($oldRpp, PATHINFO_EXTENSION);
            $newRppName = $judul_rpp . "_rpp." . $extRpp;

            if ($oldRpp !== $newRppName) {
                $oldPath = "../uploads/" . $oldRpp;
                $newPath = "../uploads/" . $newRppName;

                if (file_exists($oldPath)) {
                    if (rename($oldPath, $newPath)) {
                        $rpp = $newRppName;
                    }
                }
            }
        }
    }

    // Upload / Rename LKP
    if (isset($_FILES['editFilePdfLkp']) && $_FILES['editFilePdfLkp']['error'] == 0) {
        $extLkp = pathinfo($_FILES['editFilePdfLkp']['name'], PATHINFO_EXTENSION);
        $newLkpName = $judul_lkp . "_lkp." . $extLkp;
        $target_dir = "../uploads/" . $newLkpName;

        if (move_uploaded_file($_FILES['editFilePdfLkp']['tmp_name'], $target_dir)) {
            if ($oldLkp && file_exists("../uploads/" . $oldLkp)) {
                unlink("../uploads/" . $oldLkp);
            }
            $lkp = $newLkpName;
        }
    } else {
        // jika rename LKP (tanpa upload baru)
        if (!empty($oldLkp)) {
            $extLkp = pathinfo($oldLkp, PATHINFO_EXTENSION);
            $newLkpName = $judul_lkp . "_lkp." . $extLkp;

            if ($oldLkp !== $newLkpName) {
                $oldPath = "../uploads/" . $oldLkp;
                $newPath = "../uploads/" . $newLkpName;

                if (file_exists($oldPath)) {
                    if (rename($oldPath, $newPath)) {
                        $lkp = $newLkpName;
                    }
                }
            }
        }
    }

    // Simpan ke database
    if (!empty($id_sub) && !empty($judul_sub) && !empty($detail_sub) && !empty($link_video)) {
        $result = editMateri($id_sub, $cover, $judul_sub, $detail_sub, $link_video, $rpp, $lkp);
        if ($result) {
            header("Location: index.php?page=materi&successEdit=1");
            exit;
        } else {
            header("Location: index.php?page=materi&errorEdit=1");
            exit;
        }
    }
}



// menampilkan pesan edit gagak dan berhasil 
if (isset($_GET['successEdit'])) {
    echo "<script>alert('Edit Materi berhasil!');</script>";
} elseif (isset($_GET['errorEdit'])) {
    echo "<script>alert('Edit Materi gagal!');</script>";
}

// hapus materi
if (isset($_POST['delete_submit'])) {
    $id = $_POST['deleteMateriId'];

    $materi = getMateriById($id);

    if ($materi) {
        if (!empty($materi['nama_rpp']) && file_exists("../uploads/" . $materi['nama_rpp'])) {
            unlink("../uploads/" . $materi['nama_rpp']);
        }
        if (!empty($materi['nama_lkp']) && file_exists("../uploads/" . $materi['nama_lkp'])) {
            unlink("../uploads/" . $materi['nama_lkp']);
        }

        $result = deleteMateri($id); // fungsi delete
        if ($result) {
            header("Location: index.php?page=materi&successDelete=1");
            exit;
        } else {
            header("Location: index.php?page=materi&errorDelete=1");
            exit;
        }
    } else {
        header("Location: index.php?page=materi&errorDelete=1");
        exit;
    }
}

// menampilkan pesan tambah gagak dan berhasil 
if (isset($_GET['successDelete'])) {
    echo "<script>alert('Materi berhasil dihapus!');</script>";
} elseif (isset($_GET['errorDelete'])) {
    echo "<script>alert('Materi gagal dihapus!');</script>";
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="cold-12 d-flex justify-content-between mb-3">
                <h5 class="card-title fw-semibold">Materi</h5>
                <button type="button" class="btn btn-primary tambah-btn" onclick="openTambahMateri()" data-bs-toggle="modal" data-bs-target="#formTambahMateri">Tambah Materi</button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle ">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">No</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Kategori</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Topik</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Cover</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">RPP</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">LKP</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Video</h6>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($materi as $item): ?>
                                    <?php if (!empty($item['nama_topik'])): ?>

                                        <?php
                                        $rpps   = !empty($item['nama_rpp']) ? $item['nama_rpp'] : '';
                                        $lkps   = !empty($item['nama_lkp']) ? $item['nama_lkp'] : '';
                                        $videos = !empty($item['link_video']) ? $item['link_video'] : '';
                                        $subTitle = !empty($item['judul_sub']) ? $item['judul_sub'] : '';

                                        ?>

                                        <tr>
                                            <td>
                                                <h6 class=" fw-semibold mb-0"><?= $no++; ?></h6>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $item['nama_kategori']; ?></p>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0" id="materi-name-<?php echo $item['id_sub']; ?>"><?= $item['nama_topik']; ?> (<?= isset($item['judul_sub']) && $item['judul_sub'] ? $item['judul_sub'] : '<span class="text-danger">Belum ada sub topik</span>'; ?>)</p>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $item['cover']; ?></p>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $rpps ?></p>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $lkps; ?></p>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $videos; ?></p>
                                            </td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical fs-6"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3 edit-btn"
                                                                data-id="<?= htmlspecialchars($item['id_sub'], ENT_QUOTES) ?>"
                                                                data-kategori-id="<?= htmlspecialchars($item['id_kategori'], ENT_QUOTES) ?>"
                                                                data-kategori-nama="<?= htmlspecialchars($item['nama_kategori'], ENT_QUOTES) ?>"
                                                                data-topik="<?= htmlspecialchars($item['nama_topik'], ENT_QUOTES) ?>"
                                                                data-sub-topik="<?= htmlspecialchars($subTitle, ENT_QUOTES) ?>"
                                                                data-deskripsi="<?= htmlspecialchars($item['detail_sub'], ENT_QUOTES) ?>" data-cover="<?= htmlspecialchars($item['cover'], ENT_QUOTES) ?>"
                                                                data-rpp="<?= htmlspecialchars($rpps, ENT_QUOTES) ?>"
                                                                data-lkp="<?= htmlspecialchars($lkps, ENT_QUOTES) ?>"
                                                                data-video="<?= htmlspecialchars($videos, ENT_QUOTES) ?>"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#formEditMateri"
                                                                onclick="openEditMateri(this)">
                                                                <i class="fs-4 ti ti-edit"></i>Edit
                                                            </a>

                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="deleteMateri('<?php echo $item['id_sub']; ?>')" data-bs-toggle="modal" data-bs-target="#formDeleteMateri"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php else: ?>
                                        <tr>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $no++; ?></p>
                                            </td>
                                            <td>
                                                <p class=" fw-normal mb-0"><?= $item['name']; ?></p>
                                            </td>
                                            <td colspan="5">
                                                <p class=" fw-normal mb-0"><span class="text-danger">Belum ada Topik</span></p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- model form tambah materi -->
<div class="modal fade" id="formTambahMateri" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Form Input</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="POST" id="materiForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Field kategori -->
                    <div class="mb-3">
                        <label class="form-label">Pilih Kategori</label>
                        <select class="form-select" name="kategori_id" id="kategoriSelect" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($categories as $item) : ?>
                                <option value="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Field topik -->
                    <div class="mb-3">
                        <label class="form-label">Pilih Topik</label>
                        <select class="form-select" name="topik_id" id="topikSelect" required>
                            <option value="">-- Pilih Topik --</option>
                        </select>
                    </div>
                    <!-- Field sub topik -->
                    <div class="mb-3">
                        <label class="form-label">Judul Sub Topik</label>
                        <input type="text" class="form-control" name="subTopik" required>
                    </div>
                    <!-- Field deskripsi sub topik -->
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskSubTopik" required>
                    </div>
                    <!-- field RPP -->
                    <div class="mb-3">
                        <label class="form-label">Judul RPP</label>
                        <input type="text" class="form-control" name="rpp" required>

                        <label for="filePdf" class="form-label mt-2">Upload File PDF RPP</label>
                        <input class="form-control" type="file" id="filePdfRpp" name="filePdfRpp" accept="application/pdf" required>
                    </div>
                    <!-- field LKP -->
                    <div class="mb-3">
                        <label class="form-label">Judul LKP</label>
                        <input type="text" class="form-control" name="lkp" required>

                        <label for="filePdf" class="form-label mt-2">Upload File PDF LKP</label>
                        <input class="form-control" type="file" id="filePdfLkp" name="filePdfLkp" accept="application/pdf" required>
                    </div>
                    <!-- Field video -->
                    <div class="mb-3">
                        <label for="fileVideo" class="form-label mt-2">Upload Link Video</label>
                        <input class="form-control" type="url" id="linkVideo" name="linkVideo" placeholder="Masukkan link video YouTube" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- mengatur dropdown topik berdasarkan kategori di modal -->
<script>
    kategoriSelect.addEventListener('change', function() {
        const categories = <?php echo json_encode($categories); ?>;
        const kategoriId = this.value;
        topikSelect.innerHTML = '<option value="">-- Pilih Topik --</option>';

        const kategori = categories.filter(c => c.id_kategori == kategoriId)[0];
        console.log(categories);

        if (kategori && kategori.topics.length > 0) {
            kategori.topics.forEach(topik => {
                const opt = document.createElement('option');
                opt.value = topik.id_topik;
                opt.textContent = topik.nama_topik;
                topikSelect.appendChild(opt);
            });
        } else {
            topikSelect.innerHTML = '<option disabled>Belum ada topik di kategori ini</option>';
        }
    });
</script>


<!-- mengatur modal tambah materi -->
<script>
    function openTambahMateri() {
        // Reset semua input di form
        document.querySelectorAll('#materiForm input, #materiForm select').forEach(el => {
            el.value = '';
        });
    }
</script>


<!-- modal form edit -->
<div class="modal fade" id="formEditMateri" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editMateriForm" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="editMateriId" id="editMateriId">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Sub Topik</label>
                        <input type="text" class="form-control" name="editSubTopik" id="editSubTopik">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="editDeskSubTopik" id="editDeskSubTopik">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul RPP</label>
                        <input type="text" class="form-control" name="editRpp" id="editRpp">

                        <label class="form-label mt-2">Upload File RPP</label>
                        <input class="form-control" type="file" id="editFilePdfRpp" name="editFilePdfRpp" accept="application/pdf">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul LKP</label>
                        <input type="text" class="form-control" name="editLkp" id="editLkp">

                        <label class="form-label mt-2">Upload File LKP</label>
                        <input class="form-control" type="file" id="editFilePdfLkp" name="editFilePdfLkp" accept="application/pdf">
                    </div>

                    <!-- file pdf lama -->
                    <input type="hidden" name="oldRpp" id="oldRpp">
                    <input type="hidden" name="oldLkp" id="oldLkp">

                    <div class="mb-3">
                        <label for="fileVideo" class="form-label mt-2">Upload Link Video</label>
                        <input class="form-control" type="url" id="editLinkVideo" name="editLinkVideo" placeholder="Masukkan link video YouTube">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="edit_submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- mengatur form modal input -->
<script>
    function openEditMateri(el) {
        document.getElementById('editMateriId').value = el.dataset.id; // id materi
        // document.getElementById('editKategori').value = el.dataset.kategoriId; // dropdown kategori (pakai id_kategori)
        // document.getElementById('editTopik').value = el.dataset.topik;
        document.getElementById('editSubTopik').value = el.dataset.subTopik;
        document.getElementById('editDeskSubTopik').value = el.dataset.deskripsi;
        document.getElementById('editRpp').value = el.dataset.rpp;
        document.getElementById('oldRpp').value = el.dataset.rpp;
        document.getElementById('editLkp').value = el.dataset.lkp;
        document.getElementById('oldLkp').value = el.dataset.lkp;
        document.getElementById('editLinkVideo').value = el.dataset.video;
    }
</script>


<!-- modal form delete -->
<div class="modal fade" id="formDeleteMateri" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteMateriForm" action="" method="POST">
                <input type="hidden" name="deleteMateriId" id="deleteMateriId">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus materi ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="delete_submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- mengatur form modal delete -->
<script>
    function deleteMateri(id) {
        let name = document.getElementById('materi-name-' + id).innerText;
        console.log(name);

        document.getElementById('deleteMateriId').value = id;
    }
</script>