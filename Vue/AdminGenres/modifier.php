<?php $this->titre = "Animaux - " . $genre['nom']; ?>

<header>
    <h1 id="titreReponses">Modifier un genre de l'utilisateur 1 :</h1>
</header>
<form action="Admingenres/miseAJour" method="post">
    <h2>Modifier un genre</h2>
    <p>
        <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" value="<?= $genre['nom'] ?>" /> <br />
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="hidden" name="id" value="<?= $genre['genre_id'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="Admingenres/lire/<?= $genre['genre_id'] ?>" method="post">
    <input type="submit" value="Annuler" />
</form>

