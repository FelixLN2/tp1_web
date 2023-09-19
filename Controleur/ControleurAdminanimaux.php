<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Animal.php';

class ControleurAdminanimaux extends ControleurAdmin {

    private $animal;

    public function __construct() {
        $this->animal = new Animal();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commentaires
    public function index() {
        $animaux = $this->animal->getAnimaux();
        $this->genererVue(['animaux' => $animaux]);
    }
  
// Confirmer la suppression d'un commentaire
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire à l'aide du modèle
        $animal = $this->animal->getAnimal($id);
        $this->genererVue(['animal' => $animal]);
    }

// Supprimer un commentaire
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $animal = $this->animal->getAnimal($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->animal->deleteAnimal($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Admingenres', 'lire/' . $animal['genre_id']);
    }

    // Rétablir un commentaire
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $animal = $this->animal->getAnimal($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->animal->restoreAnimal($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Admingenres', 'lire/' . $animal['genre_id']);
    }

}
