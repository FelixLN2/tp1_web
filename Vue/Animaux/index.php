<?php $this->titre = "Animaux - Animaux" ?>

<header>
    <h1 id="titreAnimaux">Animaux:</h1>
</header>
<?php
foreach ($animaux as $animal):
    ?>
    <?php if ($animal['efface'] == '0') : ?>
        <p>
            <?= $this->nettoyer($animal['date']) ?>, <?= $this->nettoyer($animal['utilisateur_id']) ?><br/>
            <strong><?= $this->nettoyer($animal['nom']) ?></strong><br/>
            <?= $this->nettoyer($animal['description']) ?><br />
            <a href="Genres/lire/<?= $this->nettoyer($genre['genre_id']) ?>" >
                [Voir le genre]</a>
        </p>
    <?php endif; ?>
<?php endforeach; ?>