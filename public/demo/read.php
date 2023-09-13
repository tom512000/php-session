<?php

declare(strict_types=1);

use Html\AppWebPage;
use Service\Session;

Session::start();

$webPage = new AppWebPage('Lecture des données de session');

// Récupération du nom du cookie de session
if (isset($_SESSION['MA_DONNEE_DE_SESSION'])) {
    $webPage->appendContent("<h2>Donnée en session : <code>{$_SESSION['MA_DONNEE_DE_SESSION']}</code></h2>");
} else {
    $webPage->appendContent('<h2>Pas de donnée en session</h2>');
}

echo $webPage->toHTML();
