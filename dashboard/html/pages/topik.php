<?php
// include(__DIR__ . '../../../data/data_dummy.php');
include(__DIR__ . '../../../function/database_function.php');

// ambil data topik dari database
$topics = getAllTopics();
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="cold-12 d-flex justify-content-between mb-3">
                <h5 class="card-title fw-semibold">Tppik</h5>
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
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="openEditTopik('<?php echo $item['id_topik']; ?>', '<?php echo $item['id_kategori']; ?>')" data-bs-toggle="modal" data-bs-target="#formEditTopik"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-trash"></i>Delete</a>
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
                                                <p class="mb-0 fw-normal"><?php echo $item['nama_kategori']; ?></p>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal text-danger">Belum ada topik</p>
                                            </td>
                                            <td></td>
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

<!-- model tambah materi -->
<div class="modal fade" id="formTambahTopik" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Topik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="topikForm">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <?php foreach ($topics as $item) : ?>
                                <option value="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judulTopik" class="form-label">Judul Topik</label>
                        <input type="text" class="form-control" id="judulTopik" name="judulTopik" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="topikForm">Tambah</button>
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
                <form id="editTopikForm">
                    <input type="hidden" name="topikId" id="topikId">
                    <div class="mb-3">
                        <label for="editKategori" class="form-label">Kategori</label>
                        <select class="form-select" id="editKategori" name="editKategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <?php foreach ($topics as $item) : ?>
                                <option value="<?php echo $item['id_kategori']; ?>"><?php echo $item['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editJudulTopik" class="form-label">Judul Topik</label>
                        <input type="text" class="form-control" id="editJudulTopik" name="editJudulTopik" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function openEditTopik(id) {

        let kategori = document.getElementById('kategori-name-' + id);
        let idKategori = kategori.getAttribute('data-id');
        let topik = document.getElementById('topik-name-' + id).innerText;

        document.getElementById('topikId').value = id;
        document.getElementById('editKategori').value = idKategori;
        document.getElementById('editJudulTopik').value = topik;
    }
</script>