<?php

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Country;
use PDO;

class CountryCollection
{
    /**
     * Méthode permettant de retourner tous les pays de la table country.
     *
     * @return Country[]
     */
    public static function findAll(): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
            SELECT id, code, name
            FROM country
            ORDER BY name
        SQL
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Country::class);
        return $stmt->fetchAll();
    }
}
