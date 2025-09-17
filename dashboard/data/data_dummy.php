<?php
$categories = [
    [
        'id' => 1,
        'name' => 'Matematika',
        'description' => 'Kategori pelajaran Matematika dasar untuk guru SD',
        'topics' => [
            [
                'id' => 1,
                'title' => 'Operasi Bilangan Bulat',
                'description' => 'Belajar menjumlahkan dan mengurangkan bilangan bulat',
                'rpp' => [
                    [
                        'id' => 1,
                        'title' => 'RPP Operasi Bilangan Bulat 1',
                        'file' => 'file.pdf'
                    ],
                    [
                        'id' => 2,
                        'title' => 'RPP Operasi Bilangan Bulat 2',
                        'file' => 'file2.pdf'
                    ]
                ],
                'videos' => [
                    [
                        'id' => 1,
                        'title' => 'Video Penjumlahan Bilangan Bulat',
                        'url' => ''
                    ]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Pecahan Sederhana',
                'description' => 'Mengenal dan memahami konsep pecahan',
                'rpp' => [],
                'videos' => [
                    [
                        'id' => 2,
                        'title' => 'Video Pecahan Sederhana',
                        'url' => ''
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 2,
        'name' => 'Bahasa Indonesia',
        'description' => 'Kategori pelajaran Bahasa Indonesia dasar untuk guru SD',
        'topics' => []
    ],
    [
        'id' => 3,
        'name' => 'Ilmu Pengetahuan Alam',
        'description' => 'Kategori pelajaran IPA dasar untuk guru SD',
        'topics' => []
    ]
];
