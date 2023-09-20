<?php $titre = "Animaux - " . $genre['nom']; ?>

<header>
    <h1 id="titreReponses">Ajouter un genre de l'utilisateur 1 :</h1>
</header>
<form action="Admingenres/nouveau" method="post">
    <h2>Ajouter un genre</h2>
    <p>
        <label for="nom">nom</label> :  <input type="text" name="nom" id="nom" /><br />
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

