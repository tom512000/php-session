<?php

declare(strict_types=1);

namespace Html;

/**
 * Classe WebPage permettant de ne plus écrire l'enrobage HTML lors de la création d'un contenu HTML.
 *
 * @startuml
 *
 * skinparam DefaultFontSize 14
 * skinparam ClassAttributeIconSize 0
 *
 * class WebPage {
 *     - head : string := ""
 *     - title : string := ""
 *     - body : string := ""
 *     + __construct(title : string := "")
 *     + getHead(): string
 *     + getTitle(): string
 *     + setTitle(title : string): void
 *     + getBody(): string
 *     + appendToHead(content : string): void
 *     + appendCss(css : string): void
 *     + appendCssUrl(url : string): void
 *     + appendJs(js : string): void
 *     + appendJsUrl(url : string): void
 *     + appendContent(content : string): void
 *     + toHTML(): string
 *     + {static} getLastModification(): string
 *     + {static} escapeString(string $string): string
 * }
 *
 * @enduml
 */
class WebPage
{
    use StringEscaper;

    /**
     * Texte qui sera compris entre \<head\> et \</head\>.
     */
    private string $head = '';

    /**
     * Texte qui sera compris entre \<title\> et \</title\>.
     */
    private string $title = '';

    /**
     * Texte qui sera compris entre \<body\> et \</body\>.
     */
    private string $body = '';

    /**
     * Constructeur.
     *
     * @param string $title Titre de la page
     */
    public function __construct(string $title = '')
    {
        $this->setTitle($title);
    }

    /**
     * Retourner le contenu de $this->head.
     */
    public function getHead(): string
    {
        return $this->head;
    }

    /**
     * Retourner le contenu de $this->title.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Affecter le titre de la page.
     *
     * @param string $title Le titre
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Retourner le contenu de $this->body.
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Ajouter un contenu dans $this->head.
     *
     * @param string $content Le contenu à ajouter
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /**
     * Ajouter un contenu CSS dans $this->head.
     *
     * @param string $css Le contenu CSS à ajouter
     *
     * @see WebPage::appendToHead(string $content) : void
     */
    public function appendCss(string $css): void
    {
        $this->appendToHead(
            <<<HTML
    <style>
    {$css}
    </style>

HTML
        );
    }

    /**
     * Ajouter l'URL d'un script CSS dans $this->head.
     *
     * @param string $url L'URL du script CSS
     *
     * @see WebPage::appendToHead(string $content) : void
     */
    public function appendCssUrl(string $url): void
    {
        $this->appendToHead(
            <<<HTML
    <link rel="stylesheet" href="{$url}">

HTML
        );
    }

    /**
     * Ajouter un contenu JavaScript dans $this->head.
     *
     * @param string $js Le contenu JavaScript à ajouter
     *
     * @see WebPage::appendToHead(string $content) : void
     */
    public function appendJs(string $js): void
    {
        $this->appendToHead(
            <<<HTML
    <script>
    {$js}
    </script>

HTML
        );
    }

    /**
     * Ajouter l'URL d'un script JavaScript dans $this->head.
     *
     * @param string $url L'URL du script JavaScript
     *
     * @see WebPage::appendToHead(string $content) : void
     */
    public function appendJsUrl(string $url): void
    {
        $this->appendToHead(
            <<<HTML
    <script src="{$url}"></script>

HTML
        );
    }

    /**
     * Ajouter un contenu dans $this->body.
     *
     * @param string $content Le contenu à ajouter
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
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
{$this->getBody()}
        <div id="lastmodified">Dernière modification : {$lastModification}</div>
    </body>
</html>
HTML;
    }

    /**
     * Donner la date et l'heure de la dernière modification du script principal.
     *
     * @see https://www.php.net/manual/fr/function.getlastmod.php
     * @see https://www.php.net/manual/fr/class.datetime.php
     * @see https://www.php.net/manual/fr/datetime.format.php
     */
    public static function getLastModification(): string
    {
        $date = new \DateTime();
        $date->setTimestamp(getlastmod());

        return $date->format('d/m/Y - H:i:s');
    }
}
