<?php

require_once 'Modele/Animal.php';

$tstAnimal = new Animal;
$animaux = $tstAnimal->getAnimaux(0);
echo '<h3>Test getAnimaux : </h3>';
var_dump($animaux->rowCount());

$animal = $tstAnimal->getAnimal(3);
echo '<h3>Test getAnimal : </h3>';
var_dump($animal);