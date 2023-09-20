<?php

declare(strict_types=1);

namespace Html\Form;

class SessionManagedCountrySelect extends CountrySelect
{
    public function __construct(string $name, string $firstOption, string $selectedCode)
    {
        parent::__construct($name, $firstOption, $selectedCode);
        $this->setSelectedCodeFromSession();
        $this->setSelectedCodeFromRequest();
        $this->saveSelectedCodeIntoSession();
    }

    public function saveSelectedCodeIntoSession()
    {
        $_SESSION["SessionManagedCountrySelect"] = $this->getSelectedCode();
    }

    public function setSelectedCodeFromSession(): void
    {
        if (isset($_REQUEST["SessionManagedCountrySelect"])) {
            $this->setSelectedCode($_SESSION["SessionManagedCountrySelect"]);
        }
    }
}
