<?php $this->titre = "Animaux - animaux" ?>

<header>
    <h1 id="titreReponses">Animaux :</h1>
</header>
<?php
foreach ($animaux as $animal):
    ?>
    <?php if ($animal['efface'] == '0') : ?>
        <p><a href="Adminanimaux/confirmer/<?= $this->nettoyer($animal['animal_id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($animal['date']) ?>, <?= $this->nettoyer($animal['utilisateur_id']) ?> <br/>
            <strong><?= $this->nettoyer($animal['nom']) ?></strong><br/>
            <?= $this->nettoyer($animal['description']) ?><br />
            <a href="Admingenres/lire/<?= $this->nettoyer($animal['genre_id']) ?>" >
                [Voir l'animal]</a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="Adminanimaux/retablir/<?= $this->nettoyer($animal['animal_id']) ?>" >
                [Rétablir]</a>
            Animal du <?= $this->nettoyer($animal['date']) ?>, par <?= $this->nettoyer($animal['utilisateur_id']) ?> effacé! 
        </p>
    <?php endif; ?>
<?php endforeach; ?>