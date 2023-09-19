<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Animal.php';
require_once 'Modele/Genre.php';

class ControleurGenres extends Controleur {

    private $animal;
    private $genre;

    public function __construct() {
        $this->genre = new Genre();
        $this->animal = new Animal();
        
    }

// Affiche la liste de tous les articles du blog
    public function index() {
        $genres = $this->genre->getGenres();
        $this->genererVue(['genres' => $genres]);
    }

// Affiche les détails sur un article
    public function lire() {
        $idGenre = $this->requete->getParametreId("id");
        $genre = $this->genre->getGenre($idGenre);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $animaux = $this->animal->getAnimaux($idGenre);
        $this->genererVue(['genre' => $genre, 'animaux' => $animaux, 'erreur' => $erreur]);
    }

}
