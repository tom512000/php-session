<?php

declare(strict_types=1);

namespace Html\Form;

class SessionManagedCountrySelect extends CountrySelect
{
    public function __construct(string $name, string $firstOption, string $selectedCode)
    {
        parent::__construct($name, $firstOption, $selectedCode);
    }

    public function saveSelectedIntoSession()
    {
        $_SESSION["SessionManagedCountrySelect"] = $this->getSelectedCode();
    }

    public function setSelectedFromSession(): void
    {
        if (isset($_REQUEST["SessionManagedCountrySelect"])) {
            $this->setSelectedCode($_SESSION["SessionManagedCountrySelect"]);
        }
    }
}
