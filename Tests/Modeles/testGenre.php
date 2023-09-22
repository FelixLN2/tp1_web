<?php

require_once 'Modele/Genre.php';

$tstGenre = new Genre;
$genres = $tstGenre->getGenres();
echo '<h3>Test getGenres : </h3>';
var_dump($genres->rowCount());

echo '<h3>Test getGenre : </h3>';
$genre =  $tstGenre->getGenre(3);
var_dump($genre);