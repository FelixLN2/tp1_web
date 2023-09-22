<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Animal extends Modele {

    // Renvoie la liste des commentaires associés à un article
    public function getAnimaux($idGenre = NULL) {
        if ($idGenre == NULL) {
            $sql = 'select * from animaux';
            $animaux = $this->executerRequete($sql);
        } else {
            $sql = 'select * from animaux'
                    . ' where genre_id = ?';
            $animaux = $this->executerRequete($sql, [$idGenre]);
        }
        return $animaux;
    }

// Renvoie un commentaire spécifique
    public function getAnimal($id) {
        $sql = 'select * from animaux'
                . ' where animal_id = ?';
        $animal = $this->executerRequete($sql, [$id]);
        if ($animal->rowCount() == 1) {
            return $animal->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun animal ne correspond à l'identifiant '$id'");
        }
    }

// Efface un commentaire
    public function deleteAnimal($id) {
        $sql = 'UPDATE animaux'
                . ' SET efface = 1'
                . ' WHERE animal_id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un commentaire
    public function restoreAnimal($id) {
        $sql = 'UPDATE animaux'
                . ' SET efface = 0'
                . ' WHERE animal_id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un commentaire associés à un article
    public function setAnimal($animal) {
        $sql = 'INSERT INTO animaux (nom, description, date, auteur, genre_id, efface, prive) VALUES(?,?,NOW(),?,?,?,?)';
        $result = $this->executerRequete($sql, [$animal['nom'], $animal['description'], $animal['date'], $animal['auteur'], $animal['genre_id'], $animal['efface'], $animal['prive']]);
        return $result;
    }

}
