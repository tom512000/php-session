<?php

declare(strict_types=1);

// Fix bad relative path in links when using PHP's built-in web server (add trailing / when not present)
if (preg_match('#/'.basename(__DIR__).'$#', $_SERVER['REQUEST_URI'])) {
    header('Location: '.$_SERVER['REQUEST_URI'].'/', true, 302);
    exit;
}

use Html\AppWebPage;

$webPage = new AppWebPage('Gestion des données de session - tests et démonstration');

$webPage->appendContent(
    <<<HTML
    <h2>Tests de la classe <code>Session</code></h2>
    <ul>
        <li><a href="start.php">Démarrage de la session</a>
        <li><a href="start-twice.php">Double démarrage de la session</a>
        <li><a href="start-fail.php">Démarrage impossible de la session</a>
    </ul>
    <h2>Démonstration de la gestion des données de session</h2>
    <ul>
        <li><a href="write.php">Écriture de la donnée</a>
        <li><a href="read.php">Lecture de la donnée</a>
        <li><a href="delete.php">Effacement de la donnée</a>
    </ul>
HTML
);

echo $webPage->toHTML();
