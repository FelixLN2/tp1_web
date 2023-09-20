<?php $this->titre = 'animaux'; ?>

<?php foreach ($genres as $genre):
    ?>

    <genre>
        <header>
            <a href="Genres/lire/<?= $genre['genre_id'] ?>">
                <h1 class="titreGenre"><?= $genre['nom'] ?></h1>
            </a>
         
            <time><?= $genre['date'] ?></time>, par utilisateur #<?= $genre['utilisateur_id'] ?>
        </header>
        
    </genre>
    <hr />
<?php endforeach; ?>    
