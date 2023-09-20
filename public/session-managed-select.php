<?php

declare(strict_types=1);

use Html\AppWebPage;
use Html\Form\SessionManagedCountrySelect;

$webPage = new AppWebPage('Country selector');

$select = new SessionManagedCountrySelect('country', 'Pays', 'fr');

//$select->setSelectedCodeFromSession();
//$select->setSelectedCodeFromRequest();
//$select->saveSelectedCodeIntoSession();

//$webPage->appendContent('<pre>' . print_r($_SESSION, true) . '</pre>');

$webPage->appendContent(
    <<<HTML
    <form class="country-selector">
        {$select->toHtml()}
        <input type="submit" value="Choisir">
    </form>
    HTML
);

echo $webPage->toHTML();
