<?php

require_once 'Framework/Modele.php';


class Genre extends Modele {

// Renvoie la liste de tous les Genres, triés par identifiant décroissant
    public function getGenres() {
        $sql = 'select * from genres'
                . ' order by genre_id desc';
        $genres = $this->executerRequete($sql);
        return $genres;
    }

// Renvoie la liste de tous les Genres, triés par identifiant décroissant
    public function setGenre($genre) {
        $sql = 'INSERT INTO genres (nom, date, utilisateur_id) VALUES(?,NOW(), ?)';
        $result = $this->executerRequete($sql, [$genre['nom'], $genre['utilisateur_id']]);
        return $result;
    }

// Renvoie les informations sur un Genre
    function getGenre($idGenre) {
        $sql = 'select * from genres'
                . ' where genre_id=?';
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
                . ' SET nom = ?, date = NOW(), utilisateur_id = ?'
                . ' WHERE genre_id = ?';
        $result = $this->executerRequete($sql, [$genre['nom'], $genre['utilisateur_id']]);
        return $result;
    }
    
}
