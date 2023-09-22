<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleGenre') {
        require 'Tests/Modeles/testGenre.php';
    } else if ($_GET['test'] == 'modeleAnimal') {
        require 'Tests/Modeles/testAnimal.php';
    } else if ($_GET['test'] == 'vueGenres') {
        require 'Tests/Vues/testVueGenres.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleGenre">Genre</a>
    </li>
    <li>
        <a href="tests.php?test=modeleAnimal">Animal</a>
    </li>

</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueGenres">Genres</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
