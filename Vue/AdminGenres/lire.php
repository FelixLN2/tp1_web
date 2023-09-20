<?php $titre = "Animaux - " . $genre['nom']; ?>

<genre>
    <header>
        <a href="Admingenres/modifier/<?= $genre['genre_id'] ?>"> [modifier le genre]</a><br>
        <h1 class="titreGenre"><?= $genre['nom'] ?></h1>
        <time><?= $genre['date'] ?></time>, par utilisateur #<?= $genre['utilisateur_id'] ?>
        
    </header>
    <p><?= $genre['texte'] ?></p>
    <p><?= $genre['type'] ?></p>
</genre>
<hr />

<?php
foreach ($animaux as $animal):
    ?>
    <?php if ($animal['efface'] == '0') : ?>
        <p><a href="Adminanimaux/confirmer/<?= $this->nettoyer($animal['animal_id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($animal['date']) ?><br/>
            <strong><?= $this->nettoyer($animal['nom']) ?></strong><br/>
            
        </p>
    <?php else : ?>
        <p class="efface"><a href="Adminanimaux/retablir/<?= $this->nettoyer($animal['animal_id']) ?>" >
                [Rétablir]</a>
            animal EFFACÉ du <?= $this->nettoyer($animal['date']) ?>
        </p>
    <?php endif; ?>
<?php endforeach; ?>

