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

include(__DIR__ . '../../../function/database_function.php');

// ambil data kategori dari database
$categories = getCategories();

// menambahkan kategori
if (isset($_POST['submit'])) {
    $nama = ($_POST['nama_kategori']);

    if (!empty($nama)) {
        $result = addCategory($nama); // fungsi insert
        if ($result) {
            header("Location: index.php?page=category&success=1");
            exit;
        } else {
            header("Location: index.php?page=category&error=1");
            exit;
        }
    }
}

// menampilkan pesan tambah gagak dan berhasil 
if (isset($_GET['success'])) {
    echo "<script>alert('Kategori berhasil ditambahkan!');</script>";
} elseif (isset($_GET['error'])) {
    echo "<script>alert('Kategori gagal ditambahkan!');</script>";
}

// edit kategori
if (isset($_POST['edit_submit'])) {
    $id = $_POST['kategoriId'];
    $nama = $_POST['kategoriName'];

    if (!empty($id) && !empty($nama)) {
        $result = editCategory($id, $nama); // fungsi update
        if ($result) {
            header("Location: index.php?page=category&successEdit=1");
            exit;
        } else {
            header("Location: index.php?page=category&errorEdit=1");
            exit;
        }
    }
}

// menampilkan pesan edit gagak dan berhasil 
if (isset($_GET['successEdit'])) {
    echo "<script>alert('Edit Kategori berhasil ditambahkan!');</script>";
} elseif (isset($_GET['errorEdit'])) {
    echo "<script>alert('Edit Kategori gagal ditambahkan!');</script>";
}


// hapus kategori
if (isset($_POST['delete_submit'])) {

    $id = $_POST['deleteKategoriId'];
    $result = deleteCategory($id); // fungsi delete
    if ($result) {
        header("Location: index.php?page=category&successDelete=1");
        exit;
    } else {
        header("Location: index.php?page=category&errorDelete=1");
        exit;
    }
}

// menampilkan pesan hapus gagak dan berhasil 
if (isset($_GET['successDelete'])) {
    echo "<script>alert('Hapus Kategori berhasil!');</script>";
} elseif (isset($_GET['errorDelete'])) {
    echo "<script>alert('Hapus Kategori gagal!');</script>";
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="cold-12 d-flex justify-content-between mb-3">
                <h5 class="card-title fw-semibold">Kategori</h5>
                <button type="button" class="btn btn-primary tambah-btn" onclick="openTambahKategori()" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Kategori</button>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($categories as $item) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0"><?php echo $no++; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal" id="kategori-name-<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></p>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-6"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="openEditKategori('<?php echo $item['id_kategori']; ?>')" data-bs-toggle="modal" data-bs-target="#formEditKategori"><i class="fs-4 ti ti-edit edit-btn"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="deleteKategori('<?php echo $item['id_kategori']; ?>')" data-bs-toggle="modal" data-bs-target="#formDeleteKategori"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah kategori -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambahKategoriForm" action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function openTambahKategori() {
        document.getElementById('tambahKategoriForm').reset();
    }
</script>

<!-- Modal edit kategori -->
<div class="modal fade" id="formEditKategori" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editKategoriForm" action="" method="POST">
                    <input type="hidden" name="kategoriId" id="kategoriId">
                    <div class="mb-3">
                        <label for="kategoriName" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="kategoriName" name="kategoriName" required>
                    </div>
                    <button type="submit" name="edit_submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function openEditKategori(id) {

        let name = document.getElementById('kategori-name-' + id).innerText;
        document.getElementById('kategoriId').value = id;
        document.getElementById('kategoriName').value = name;

    }
</script>


<!-- modal delete -->
<div class="modal fade" id="formDeleteKategori" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteKategoriForm" action="" method="POST">
                <input type="hidden" name="deleteKategoriId" id="deleteKategoriId">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kategori <span class="fw-bold" id="kategoriName"></span>? </p>
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
    function deleteKategori(id) {
        let name = document.getElementById('kategori-name-' + id).innerText;

        document.getElementById('kategoriName').innerText = name; // tampil di modal
        document.getElementById('deleteKategoriId').value = id; // input hidden

    }
</script>