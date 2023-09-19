<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Genre.php';
require_once 'Modele/Animal.php';

class ControleurAdmingenres extends ControleurAdmin {

    private $genre;
    private $animal;

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

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel article et retourne à la liste des articles
    public function nouveau() {
        $genre['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
        $genre['nom'] = $this->requete->getParametre('titre');
        /*$genre['sous_titre'] = $this->requete->getParametre('sous_titre');
        $genre['texte'] = $this->requete->getParametre('texte');
        $genre['type'] = $this->requete->getParametre('type');*/
        $this->genre->setGenre($genre);
        $this->executerGenre('index');
    }

// Modifier un article existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $genre = $this->genre->getGenre($id);
        $this->genererVue(['genre' => $genre]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJour() {
        $genre['genre_id'] = $this->requete->getParametreId('id');
        $genre['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
        $genre['nom'] = $this->requete->getParametre('titre');
       /* $article['sous_titre'] = $this->requete->getParametre('sous_titre');
        $article['texte'] = $this->requete->getParametre('texte');
        $article['type'] = $this->requete->getParametre('type');*/
        $this->genre->updateGenre($genre);
        $this->executerAction('index');
    }

}
