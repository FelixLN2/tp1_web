<?php

require_once 'Framework/Vue.php';
$genres= [
    [
        'genre_id' => '3',
        'nom' => 'Vulpes',
        'date' => '2017-12-31',
        'auteur' => 'user1',
    ],
    [
        'genre_id' => '4',
        'nom' => 'Lupus',
        'date' => '2017-12-31',
        'auteur' => 'user2',

    ]
];
$vue = new Vue('index', 'Genres');
$vue->generer(['genres' => $genres]);

