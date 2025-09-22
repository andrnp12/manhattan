<?php
include(__DIR__ . '../../../data/data_dummy.php');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="cold-12 d-flex justify-content-between mb-3">
                <h5 class="card-title fw-semibold">Video</h5>
                <button type="button" class="btn btn-primary" onclick="openModal('video')" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Video</button>
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
                                        <h6 class="fs-4 fw-semibold mb-0">Video</h6>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($categories as $item) : ?>
                                    <?php if (!empty($item['topics'])) : ?>
                                        <?php foreach ($item['topics'] as $topik) : ?>
                                            <?php if (!empty($topik['rpp'])) : ?>
                                                <?php foreach ($topik['videos'] as $video) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <h6 class="fs-4 fw-semibold mb-0"><?php echo $no++; ?></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 fw-normal"><?php echo $item['name']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 fw-normal"><?php echo $topik['title']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 fw-normal"><?php echo $video['title']; ?></p>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropstart">
                                                                <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ti ti-dots-vertical fs-6"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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
                                                        <p class="mb-0 fw-normal"><?php echo $item['name']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fw-normal"><?php echo $topik['title']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fw-normal text-danger">Belum ada Video</p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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
                                                <p class="mb-0 fw-normal"><?php echo $item['name']; ?></p>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal text-danger">Belum ada topik</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 fw-normal text-danger">Belum ada Video</p>
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
</div>
</div>