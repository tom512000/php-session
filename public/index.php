<?php

declare(strict_types=1);

use Html\AppWebPage;

$webPage = new AppWebPage('Gestion des données de session - liste de pays');

$webPage->appendContent(
    <<<HTML
<h2>Découverte du fonctionnement du stockage des données de session</h2>
<ul>
    <li><a href="demo/">Programmes de démonstration</a>
</ul>

<h2>Liste de pays</h2>
<ul>
    <li><a href="select.php">Liste déroulante des pays</a>
    <li><a href="session-managed-select.php">Liste déroulante des pays, code pays mémorisé dans les données de session</a>
    <li><a href="flags.php">Liste de pays</a>
    <li><a href="country.php">Le pays sélectionné</a>
</ul>
HTML
);

echo $webPage->toHTML();
