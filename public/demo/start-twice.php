<?php

declare(strict_types=1);

require __DIR__.'/error.php';

use Html\AppWebPage;
use Service\Session;

$webPage = new AppWebPage('Démarrage de la session');

setErrorHandler($webPage);

Session::start();
Session::start();

if (isset($_SESSION)) {
    $webPage->appendContent('<h2 class="success">Session démarrée</h2>');
} else {
    $webPage->appendContent('<h2 class="error">Session NON démarrée</h2>');
}

echo $webPage->toHTML();
