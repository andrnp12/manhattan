<?php

session_start();
if (!isset($_SESSION['username'])) {
    session_destroy();
    header("Location: ../../index.php");
} else {
    if ($_SESSION['role'] != 0) {
        session_destroy();
        header("Location: ../../index.php");
    }
}

// ambil data topik dari database
$topics = getAllTopics();

// ambil data kategori dari database
$categories = getCategories();

// menambahkan topik
if (isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
    $topik = $_POST['namaTopik'];

    if (!empty($kategori) && !empty($topik)) {
        $result = addTopic($topik, $kategori); // fungsi insert
        if ($result) {
            header("Location: index.php?page=topik&success=1");
            exit;
        } else {
            header("Location: index.php?page=topik&error=1");
            exit;
        }
    }
}

// menampilkan pesan tambah gagak dan berhasil 
if (isset($_GET['success'])) {
    echo "<script>
    alert('Topik berhasil ditambahkan!');
    window.location.href = 'index.php?page=topik';
    </script>";
} elseif (isset($_GET['error'])) {
    echo "<script>
    alert('Topik gagal ditambahkan!');
    window.location.href = 'index.php?page=topik';
    </script>";
}

// edit topik
if (isset($_POST['edit_submit'])) {
    $id = $_POST['editTopikId'];
    $kategori = $_POST['editKategori'];
    $topik = $_POST['editJudulTopik'];

    if (!empty($kategori) && !empty($topik)) {
        $result = editTopic($id, $topik, $kategori); // fungsi insert
        if ($result) {
            header("Location: index.php?page=topik&successEdit=1");
            exit;
        } else {
            header("Location: index.php?page=topik&errorEdit=1");
            exit;
        }
    }
}

// menampilkan pesan edit gagak dan berhasil 
if (isset($_GET['successEdit'])) {
    echo "<script>
    alert('Edit Topik berhasil!');
    window.location.href = 'index.php?page=topik';
    </script>";
} elseif (isset($_GET['errorEdit'])) {
    echo "<script>
    alert('Edit Topik gagal!');
    window.location.href = 'index.php?page=topik';
    </script>";
}


// hapus topik
if (isset($_POST['delete_submit'])) {

    $id = $_POST['deleteTopikId'];
    $result = deleteTopic($id); // fungsi delete
    if ($result) {
        header("Location: index.php?page=topik&successDelete=1");
        exit;
    } else {
        header("Location: index.php?page=topik&errorDelete=1");
        exit;
    }
}

// menampilkan pesan hapus gagak dan berhasil 
if (isset($_GET['successDelete'])) {
    echo "<script>
    alert('Hapus Topik berhasil!');
    window.location.href = 'index.php?page=topik';
    </script>";
} elseif (isset($_GET['errorDelete'])) {
    echo "<script>
    alert('Hapus Topik gagal!');
    window.location.href = 'index.php?page=topik';
    </script>";
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="cold-12 d-flex justify-content-between mb-3">
                <h5 class="card-title fw-semibold">Topik</h5>
                <button type="button" class="btn btn-primary" onclick="openTambahTopik()" data-bs-toggle="modal" data-bs-target="#formTambahTopik">Tambah Topik</button>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($topics as $item) : ?>
                                    <?php if (!empty($item['nama_topik'])) : ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <h6 class="fs-4 fw-semibold mb-0"><?php echo $no++; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal" id="kategori-name-<?php echo $item['id_kategori']; ?>" data-id="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></p>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal" id="topik-name-<?php echo $item['id_topik']; ?>"><?php echo $item['nama_topik']; ?></p>
                                            </td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical fs-6"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="openEditTopik('<?php echo $item['id_topik'] ?? ''; ?>', '<?php echo $item['id_kategori']; ?>')" data-bs-toggle="modal" data-bs-target="#formEditTopik"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0) " onclick="deleteTopik('<?php echo $item['id_topik']; ?>')" data-bs-toggle="modal" data-bs-target="#formDeleteTopik"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <h6 class="fs-4 fw-semibold mb-0"><?php echo $no++; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal" id="kategori-name-<?php echo $item['id_kategori']; ?>" data-id="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></p>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal text-danger">Belum ada topik</p>
                                            </td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical fs-6"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <?php
                                                            $idTopik = !empty($item['id_topik']) ? $item['id_topik'] : 'kategori_' . $item['id_kategori'];
                                                            ?>
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="openEditTopik('<?php echo $item['id_topik'] ?? ''; ?>', '<?php echo $item['id_kategori']; ?>')" data-bs-toggle="modal" data-bs-target="#formEditTopik"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="deleteTopik('<?php echo $idTopik; ?>')"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
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

<!-- model tambah topik -->
<div class="modal fade" id="formTambahTopik" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Topik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="topikForm" action="" method="POST">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <?php foreach ($categories as $item) : ?>
                                <option value="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="namaTopik" class="form-label">Judul Topik</label>
                        <input type="text" class="form-control" id="namaTopik" name="namaTopik" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" form="topikForm">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openTambahTopik() {
        // Reset form fields
        document.getElementById('topikForm').reset();
    }
</script>

<!-- modal edit materi -->
<div class="modal fade" id="formEditTopik" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Topik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTopikForm" action="" method="POST">
                    <input type="hidden" name="editTopikId" id="editTopikId">
                    <div class="mb-3">
                        <label for="editKategori" class="form-label">Kategori</label>
                        <select class="form-select" id="editKategori" name="editKategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <?php foreach ($categories as $item) : ?>
                                <option value="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori'] ?? ""; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editJudulTopik" class="form-label">Judul Topik</label>
                        <input type="text" class="form-control" id="editJudulTopik" name="editJudulTopik" required>
                    </div>
                    <button type="submit" name="edit_submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function openEditTopik(idTopik, idKategori) {
        // cari kategori berdasarkan idKategori
        let kategori = document.getElementById('kategori-name-' + idKategori);
        let kategoriId = kategori ? kategori.getAttribute('data-id') : '';

        // cari topik berdasarkan idTopik
        let topik = '';
        if (idTopik) {
            let topikElement = document.getElementById('topik-name-' + idTopik);
            if (topikElement) {
                topik = topikElement.innerText;
            }
        }

        // isi ke form modal
        document.getElementById('editTopikId').value = idTopik || '';
        document.getElementById('editKategori').value = kategoriId || '';
        document.getElementById('editJudulTopik').value = topik || '';
    }
</script>

<!-- modal hapus topik -->
<div class="modal fade" id="formDeleteTopik" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteTopikForm" action="" method="POST">
                <input type="hidden" name="deleteTopikId" id="deleteTopikId">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Hapus Topik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus topik <span class="fw-bold" id="topikName"></span>? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="delete_submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function deleteTopik(id) {
        let name = document.getElementById('topik-name-' + id).innerText;
        document.getElementById('topikName').innerText = name; // tampil di modal
        document.getElementById('deleteTopikId').value = id; // input hidden
    }
</script>