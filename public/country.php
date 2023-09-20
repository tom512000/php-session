<?php

declare(strict_types=1);

use Html\AppWebPage;
use Html\CountryFlag;
use Html\Form\SessionManagedCountrySelect;

$webPage = new AppWebPage('Country selector');

$select = new SessionManagedCountrySelect('country', 'Pays', "fr");

$countryFlag = new CountryFlag($select->getSelectedCode(), "./img/flags/{$select->getSelectedCode()}.png");

$webPage->appendContent(
    <<<HTML
        {$countryFlag->toHtml()}
    HTML
);

echo $webPage->toHTML();
