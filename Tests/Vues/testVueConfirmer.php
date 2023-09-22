<?php

require_once 'Framework/Vue.php';
$animal = [
        'animal_id' => '3',
        'nom' => 'Vulpus',
        'description' => 'Renard',
        'date' => '2017-12-31',
        'auteur' => 'user1',
        'genre_id' => '3',
        'efface' => '0',
        'prive' => '0',
    ];
$vue = new Vue('Confirmer', 'AdminAnimaux');
$vue->generer(['animal' => $animal]);

