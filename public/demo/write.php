<?php

declare(strict_types=1);

use Html\AppWebPage;
use Service\Session;

Session::start();

// Création du cookie de session
$_SESSION['MA_DONNEE_DE_SESSION'] = 'Je suis stockée sur le serveur';

$webPage = new AppWebPage('Écriture dans les données de session');

$webPage->appendContent('<h2>Donnée de session écrite</h2>');

echo $webPage->toHTML();
