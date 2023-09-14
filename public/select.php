<?php

declare(strict_types=1);

use Html\AppWebPage;
use Html\Form\CountrySelect;

$webPage = new AppWebPage('Country selector');

$select = new CountrySelect('country', 'Pays', 'fr');

$select->setSelectedCodeFromRequest();

$webPage->appendContent(
    <<<HTML
    <form class="country-selector">
        {$select->toHtml()}
        <input type="submit" value="Choisir">
    </form>
    HTML
);

echo $webPage->toHTML();

