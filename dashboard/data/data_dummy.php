<?php
$categories = [
    [
        "id" => 1,
        "name" => "Matematika",
        "topics" => [
            [
                "id" => 1,
                "title" => "Operasi Bilangan",
                "sub_topics" => [
                    [
                        "id" => 1,
                        "title" => "Penjumlahan",
                        "rpp" => [
                            ["title" => "RPP Penjumlahan Kelas 4",],
                        ],
                        "lkp" => [
                            ["title" => "LKP Penjumlahan Dasar"],
                        ],
                        "videos" => [
                            ["title" => "Video Penjumlahan Sederhana"],
                        ]
                    ],
                    [
                        "id" => 2,
                        "title" => "Pengurangan",
                        "rpp" => [
                            ["title" => "RPP Pengurangan Kelas 4"],
                        ],
                        "lkp" => [
                            ["title" => "LKP pengurangan Dasar"]
                        ],
                        "videos" => [
                            [
                                "title" => "Video Pengurangan Lanjutan",
                                "link" => "https://www.example.com/video-pengurangan"
                            ],
                        ]
                    ]
                ]
            ],
            [
                "id" => 2,
                "title" => "Pecahan",
                "sub_topics" => [
                    [
                        "id" => 3,
                        "title" => "Pecahan Sederhana",
                        "rpp" => [],
                        "lkp" => [],
                        "videos" => []
                    ]
                ]
            ]
        ]
    ],
    [
        "id" => 2,
        "name" => "IPA",
        "topics" => [
            [
                "id" => 3,
                "title" => "Sistem Peredaran Darah",
                "sub_topics" => [
                    [
                        "id" => 4,
                        "title" => "Jantung",
                        "rpp" => [
                            ["title" => "RPP Anatomi Jantung"],
                        ],
                        "lkp" => [
                            ["title" => "LKP Struktur Jantung"],
                        ],
                        "videos" => [
                            // ["title" => "Video Fungsi Jantung"],
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        "id" => 3,
        "name" => "Bahasa Indonesia",
        "topics" => [
            [
                "id" => 4,
                "title" => "Teks Narasi",
                "sub_topics" => [
                    [
                        // "id" => 5,
                        // "title" => "Ciri-ciri Teks Narasi",
                        // "rpp" => [
                        //     ["title" => "RPP Ciri-ciri Teks Narasi"],
                        // ],
                        // "lkp" => [
                        //     ["title" => "LKP Ciri-ciri Teks Narasi"],
                        // ],
                        // "videos" => [
                        //     ["title" => "Video Ciri-ciri Teks Narasi"],
                        // ]
                    ]
                ]
            ]
        ]
    ]
];
