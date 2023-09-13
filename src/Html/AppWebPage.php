<?php

declare(strict_types=1);

namespace Html;

class AppWebPage extends WebPage
{
    /**
     * Constructeur.
     *
     * @param string $title Titre de la page
     */
    public function __construct(string $title = '')
    {
        parent::__construct($title);
        $this->appendCssUrl('/css/style.css');
    }

    /**
     * Produire la page Web complète.
     */
    public function toHTML(): string
    {
        $lastModification = self::getLastModification();

        return <<<HTML
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{$this->getTitle()}</title>
{$this->getHead()}
    </head>
    <body>
        <header class="header">
            <h1 class="header__title">{$this->getTitle()}</h1>
        </header>
        <section class="content">
{$this->getBody()}
        </section>
        <footer class="footer">
            <div>Dernière modification : {$lastModification}</div>
        </footer>
    </body>
</html>
HTML;
    }
}
