<?php $titre = "Animaux - " . $genre['nom']; ?>

<genre>
    <header>
        <h1 class="titreGenre"><?= $genre['nom'] ?></h1>
        <time><?= $genre['date'] ?></time>, par utilisateur #<?= $genre['utilisateur_id'] ?>    
    </header>
  
</genre>
<hr />
<header>
    <h1 id="titreAnimaux">Animaux du Genre <?= $genre['nom'] ?> :</h1>
</header>

<?php
foreach ($animaux as $animal):
    ?>
        <p>
            <?= $this->nettoyer($animal['date']) ?>, <?= $this->nettoyer($animal['utilisateur_id']) ?> <br/>
            <strong><?= $this->nettoyer($animal['nom']) ?></strong><br/>
            <?= $this->nettoyer($animal['description']) ?>
        </p>
<?php endforeach; ?>

<form action="Animaux/ajouter" method="post">
    <h2>Ajouter un animal</h2>
    <p>
        
        <label for="nom">Nom</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="description">Description</label> :  <textarea type="text" name="description" id="description" >Écrivez une description ici</textarea><br />
        <input type="hidden" name="genre_id" value="<?= $genre['genre_id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

