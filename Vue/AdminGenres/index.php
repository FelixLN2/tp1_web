<?php $this->titre = 'Animaux'; ?>

<a href="Admingenres/ajouter">
    <h2 class="titreGenre">Ajouter un genre</h2>
</a>
<?php foreach ($genres as $genre):
    ?>

    <genre>
        <header>
            <a href="Admingenres/lire/<?= $genre['genre_id'] ?>">
                <h1 class="titreGenre"><?= $genre['nom'] ?></h1>
            </a>
            
            <time><?= $genre['date'] ?></time>, par utilisateur #<?= $genre['utilisateur_id'] ?>
        </header>
        
            
            <a href="Admingenres/modifier/<?= $genre['genre_id'] ?>"> [modifier le genre]</a>
        </p>
    </genre>
    <hr />
<?php endforeach; ?>    
