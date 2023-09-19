<?php

require_once 'Framework/Modele.php';

class Animal extends Modele {

// Renvoie la liste de tous les animaux, triés par identifiant décroissant
    public function getAnimals() {
        $sql = 'select * from animaux'
                . ' order by ID desc';
        $animal = $this->executerRequete($sql);
        return $animal;
    }

// Renvoie la liste de tous les aniamuxc, triés par identifiant décroissant
    public function setAnimal($animal) {
        $sql = 'INSERT INTO animaux (nom, description, utilisateur_id, genre_id) VALUES(?, ?)';
        $result = $this->executerRequete($sql, [$animal['nom'], $animal['description'], $animal['utilisateur_id'], $animal['genre_id']]);
        return $result;
    }

// Renvoie les informations sur un aniaml
    function getAnimal($idAnimal) {
        $sql = 'select * from animaux'
                . ' where ID=?';
        $animal = $this->executerRequete($sql, [$idAnimal]);
        if ($animal->rowCount() == 1) {
            return $animal->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun animal ne correspond à l'identifiant '$idAnimal'");
        }
    }
    
    // Efface un animal
    public function deleteAnimal($id) {
        $sql = 'UPDATE animaux'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }
    
    // Réactive un animal
    public function restoreAnimal($id) {
        $sql = 'UPDATE animaux'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }
    
// Met à jour un animal
    public function updateAnimal($animal) {
        $sql = 'UPDATE animaux'
                . ' SET nom = ?, description = ?, utilisateur_id = ?, genre_id = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$animal['nom'], $animal['description'], $animal['utilisateur_id'], $animal['genre_id']]);
        return $result;
    }
    
}
