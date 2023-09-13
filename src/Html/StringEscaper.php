<?php

declare(strict_types=1);

namespace Html;

trait StringEscaper
{
    /**
     * Protéger les caractères spéciaux pouvant dégrader la page Web.
     *
     * @param string|null $string $string La chaîne à protéger
     *
     * @return string La chaîne protégée
     *
     * @see https://www.php.net/manual/en/function.htmlspecialchars.php
     */
    public static function escapeString(?string $string): string
    {
        return htmlspecialchars($string ?? '', ENT_QUOTES | ENT_HTML5, 'utf-8');
    }

    /**
     * Supprimer les balises pouvant dégrader la page Web et nettoyer les espaces en tête et en queue de chaîne.
     *
     * @param string|null $string $string La chaîne à protéger
     *
     * @return string La chaîne nettoyée
     *
     * @see https://www.php.net/manual/fr/function.strip-tags.php
     * @see https://www.php.net/manual/fr/function.trim.php
     */
    public static function stripTagsAndTrim(?string $string): string
    {
        return trim(strip_tags($string ?? ''));
    }
}
