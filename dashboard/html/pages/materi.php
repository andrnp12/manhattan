<?php
// include(__DIR__ . '../../../data/data_dummy.php');

include(__DIR__ . '../../../function/database_function.php');

// ambil data materi dari database
$materi = getAllMateri();
print_r($materi);
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
                                                <p class=" fw-normal mb-0"><?= $item['nama_topik']; ?> (<?= isset($item['judul_sub']) && $item['judul_sub'] ? $item['judul_sub'] : '<span class="text-danger">Belum ada sub topik</span>'; ?>)</p>
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
                                                                data-id=" <?= htmlspecialchars($item['id_kategori'], ENT_QUOTES) ?>"
                                                                data-categori="<?= htmlspecialchars($item['nama_kategori'], ENT_QUOTES) ?>"
                                                                data-topik="<?= htmlspecialchars($item['nama_topik'], ENT_QUOTES) ?>"
                                                                data-sub-topik="<?= htmlspecialchars($subTitle, ENT_QUOTES) ?>"
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
                                                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-trash"></i>Delete</a>
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

            <form action="simpan.php" method="POST" id="materiForm">
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

<!-- mengatur modal tambah materi -->
<script>
    function openTambahMateri() {
        // Reset semua input di form
        document.querySelectorAll('#materiForm input, #materiForm select').forEach(el => {
            el.value = '';
        });

        // Tampilkan semua field
        document.getElementById('fieldKategori').classList.remove('d-none');
        document.getElementById('fieldTopikKategori').classList.remove('d-none');
        document.getElementById('fieldTopik').classList.remove('d-none');
        document.getElementById('fieldRppTopik').classList.remove('d-none');
        document.getElementById('fieldSubTopik').classList.remove('d-none');
        document.getElementById('fieldRpp').classList.remove('d-none');
        document.getElementById('fieldLkp').classList.remove('d-none');
        document.getElementById('fieldVideo').classList.remove('d-none');
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
            <form action="database_funtion.php" method="POST">
                <input type="hidden" name="tipe" value="kategori">
                <input type="hidden" name="id" id="editId">
                <div class="modal-body">
                    <div class="mb-3">
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

<!-- mengatur form modal input -->
<script>
    function openEditMateri(el) {
        document.getElementById('editId').value = el.dataset.id;
        document.getElementById('editKategori').value = el.dataset.categori;
        document.getElementById('editTopik').value = el.dataset.topik;
        document.getElementById('editSubTopik').value = el.dataset.subTopik;
        document.getElementById('editRpp').value = el.dataset.rpp;
        document.getElementById('editLkp').value = el.dataset.lkp;
        document.getElementById('editVideo').value = el.dataset.video;
    }
</script>