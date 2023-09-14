<?php

declare(strict_types=1);

namespace Html\Form;

use Entity\Collection\CountryCollection;
use Html\StringEscaper;

class CountrySelect
{
    private string $name;
    private string $firstOption;
    private string $selectedCode;

    public function __construct(string $name, string $firstOption, string $selectedCode)
    {
        $this->name = $name;
        $this->firstOption = $firstOption;
        $this->selectedCode = $selectedCode;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFirstOption(): string
    {
        return $this->firstOption;
    }

    /**
     * @param string $firstOption
     */
    public function setFirstOption(string $firstOption): void
    {
        $this->firstOption = $firstOption;
    }

    /**
     * @return string
     */
    public function getSelectedCode(): string
    {
        return $this->selectedCode;
    }

    /**
     * @param string $selectedCode
     */
    public function setSelectedCode(string $selectedCode): void
    {
        $this->selectedCode = $selectedCode;
    }

    public function setSelectedCodeFromRequest(): void
    {
        // si le tableau "$_REQUEST" comporte une clé égale à la valeur
        // de la propriété "name"
        if (isset($_REQUEST[$this->name])) {
            // si elle est non vide
            if (strlen($_REQUEST[$this->name]) != 0) {
                // affecte la propriété « selectedCode » avec la valeur
                $this->selectedCode = $_REQUEST[$this->name];
            }
        }
    }

    public function toHtml(): string
    {
        $html = <<<HTML

            <select name="{$this->name}">
                <option value="">{$this->firstOption}</option>
        HTML;
        $tab = CountryCollection::findAll();
        for ($i = 0; $i < count($tab); $i++) {
            $verif = StringEscaper::escapeString($tab[$i]->getName());
            $selection = ($this->selectedCode == $tab[$i]->getCode()) ? "selected" : "";
            $html .= <<<HTML
                <option value="{$tab[$i]->getCode()}" {$selection}>{$verif}</option>
            HTML;
        }

        $html .= <<<HTML
            </select>
        HTML;
        return $html;
    }
}
