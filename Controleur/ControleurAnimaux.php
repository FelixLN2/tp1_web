<?php

require_once 'Modele/Animal.php';
require_once 'Framework/Vue.php';

class ControleurAnimaux extends Controleur {

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

// Ajoute un commentaire à un article
    public function ajouter() {
        $animal['genre_id'] = $this->requete->getParametreId("genre_id");
        $animal['utilisateur_id'] = $this->requete->getParametre('utilisateur_id');
        $validation_courriel = filter_var($animal['utilisateur_id'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            $animal['nom'] = $this->requete->getParametre('nom');
            $animal['description'] = $this->requete->getParametre('description');
            // Ajuster la valeur de la case à cocher
            //$commentaire['prive'] = $this->requete->existeParametre('prive') ? 1 : 0;
            // Ajouter le commentaire à l'aide du modèle
            $this->animal->setAnimal($animal);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
        }
        //Recharger la page pour mettre à jour la liste des commentaires associés ou afficher une erreur
        $this->rediriger('Genres', 'lire/' . $animal['genre_id']);
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
        $this->rediriger('Genres', 'genre/' . $animal['genre_id']);
    }

    // Rétablir un commentaire
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $animal = $this->animal->getAnimal($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->animal->restoreAnimal($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Genres', 'genre/' . $animal['genre_id']);
    }

}
