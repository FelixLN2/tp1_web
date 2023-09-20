<?php $titre = "Supprimer - " . $animal['titre']; ?>

<genre>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $animal['date'] ?><br/>
        <strong><?= $animal['nom'] ?></strong><br/>
        <?= $animal['description'] ?>
        par <?= $animal['utilisateur_id']?>
        </p>
    </header>
</genre>

<form action="Adminanimaux/supprimer/<?= $animal['animal_id'] ?>" method="post">
    <input type="submit" value="Oui" />
</form>
<form action="Adminanimaux/lire/<?= $animal['genre_id'] ?>" method="post" >
    <input type="submit" value="Annuler" />
</form>

