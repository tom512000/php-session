<?php

declare(strict_types=1);

use Html\AppWebPage;
use Service\Session;

Session::start();

$webPage = new AppWebPage('Effacement des données de session');

// Suppression du cookie de session
if (isset($_SESSION['MA_DONNEE_DE_SESSION'])) {
    unset($_SESSION['MA_DONNEE_DE_SESSION']);
    $webPage->appendContent('<h2>Donnée en session effacée</h2>');
} else {
    $webPage->appendContent('<h2>Pas de donnée en session</h2>');
}

echo $webPage->toHTML();
