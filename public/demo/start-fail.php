<?php

declare(strict_types=1);

require __DIR__.'/error.php';

use Html\AppWebPage;
use Service\Exception\SessionException;
use Service\Session;

$webPage = new AppWebPage('Démarrage de la session');

setErrorHandler($webPage);

// Send a lot of data to the client (more than 4Ko, default output_buffering value)
for ($i = 0; $i < 4097; ++$i) {
    echo ' ';
}

try {
    Session::start();
} catch (SessionException $exception) {
    $webPage->appendContent('<h2 class="success"><code>SessionException</code> attrapée</h2>');
} catch (Exception $e) {
    $webPage->appendContent('<h2 class="error">Problème rencontré</h2>');
    $webPage->appendContent('<p class="error">'.$e->getMessage().'</p>');
}

if (isset($_SESSION)) {
    $webPage->appendContent('<h2 class="error">Session démarrée</h2>');
} else {
    $webPage->appendContent('<h2 class="success">Session NON démarrée</h2>');
}

echo $webPage->toHTML();
