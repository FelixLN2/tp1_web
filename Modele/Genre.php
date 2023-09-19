<?php

require_once 'Framework/Modele.php';


class Genre extends Modele {

// Renvoie la liste de tous les Genres, triés par identifiant décroissant
    public function getGenres() {
        $sql = 'select * from genres'
                . ' order by ID desc';
        $genres = $this->executerRequete($sql);
        return $genres;
    }

// Renvoie la liste de tous les Genres, triés par identifiant décroissant
    public function setGenre($genre) {
        $sql = 'INSERT INTO genres (nom, utilisateur_id) VALUES(?, ?)';
        $result = $this->executerRequete($sql, [$genre['nom'], $genre['utilisateur_id']]);
        return $result;
    }

// Renvoie les informations sur un Genre
    function getGenre($idGenre) {
        $sql = 'select * from genres'
                . ' where ID=?';
        $genre = $this->executerRequete($sql, [$idGenre]);
        if ($genre->rowCount() == 1) {
            return $genre->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun Genre ne correspond à l'identifiant '$idGenre'");
        }
    }
// Met à jour un Genre
    public function updateGenre($genre) {
        $sql = 'UPDATE genres'
                . ' SET nom = ?, utilisateur_id = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$genre['nom'], $genre['utilisateur_id']]);
        return $result;
    }
    
}
