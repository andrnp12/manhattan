<?php
include(__DIR__ . '../../../data/data_dummy.php');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="cold-12 d-flex justify-content-between mb-3">
                <h5 class="card-title fw-semibold">Materi</h5>
                <button type="button" class="btn btn-primary" onclick="openModal('materi')" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Materi</button>
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
                                <?php foreach ($categories as $item): ?>
                                    <?php if (!empty($item['topics'])): ?>
                                        <?php foreach ($item['topics'] as $topik): ?>
                                            <?php foreach ($topik['sub_topics'] as $sub): ?>
                                                <?php
                                                $rpps   = !empty($sub['rpp']) ? $sub['rpp'] : [];
                                                $lkps   = !empty($sub['lkp']) ? $sub['lkp'] : [];
                                                $videos = !empty($sub['videos']) ? $sub['videos'] : [];
                                                $subTitle = !empty($sub['title'])
                                                    ? $sub['title']
                                                    : '';

                                                // print_r($titles ? $titles : 'no title');

                                                // kalau kosong, tetap looping sekali untuk kasih tanda di tabel
                                                if (empty($rpps))   $rpps[]   = ['title' => '<span class="text-danger">Belum ada RPP</span>', 'is_empty' => true];
                                                if (empty($lkps))   $lkps[]   = ['title' => '<span class="text-danger">Belum ada LKP</span>', 'is_empty' => true];
                                                if (empty($videos)) $videos[] = ['title' => '<span class="text-danger">Belum ada Video</span>', 'is_empty' => true];

                                                ?>
                                                <?php foreach ($rpps as $rpp): ?>
                                                    <?php foreach ($lkps as $lkp): ?>
                                                        <?php foreach ($videos as $video): ?>
                                                            <tr>
                                                                <td>
                                                                    <h6 class=" fw-semibold mb-0"><?= $no++; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <p class=" fw-normal mb-0"><?= $item['name']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class=" fw-normal mb-0"><?= $topik['title']; ?> (<?= isset($sub['title']) && $sub['title'] ? $sub['title'] : '<span class="text-danger">Belum ada sub topik</span>'; ?>)</p>
                                                                </td>
                                                                <td>
                                                                    <p class=" fw-normal mb-0"><?= $rpp['title']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class=" fw-normal mb-0"><?= $lkp['title']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class=" fw-normal mb-0"><?= $video['title']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown dropstart">
                                                                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="ti ti-dots-vertical fs-6"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                            <li>
                                                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editModal"
                                                                                    data-id="<?= $item['id']; ?>"
                                                                                    data-sub-topik="<?= htmlspecialchars($subTitle, ENT_QUOTES) ?>"
                                                                                    data-rpp="<?= isset($rpp['is_empty']) ? '' : $rpp['title']; ?>"
                                                                                    data-lkp="<?= isset($lkp['is_empty']) ? '' : $lkp['title']; ?>"
                                                                                    data-video="<?= isset($video['is_empty']) ? '' : $video['title']; ?>"
                                                                                    data-pdf="<?= !empty($lkp['pdf']) ? $lkp['pdf'] : ''; ?>"
                                                                                    data-link="<?= !empty($video['link']) ? $video['link'] : ''; ?>">
                                                                                    <i class="fs-4 ti ti-edit"></i>
                                                                                    Edit
                                                                                </a>

                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
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