<?php

declare(strict_types=1);

namespace Html\Form;

use Service\Exception\SessionException;
use Service\Session;

class SessionManagedCountrySelect extends CountrySelect
{
    /**
     * @throws SessionException
     */
    public function __construct(string $name, string $firstOption, string $selectedCode)
    {
        parent::__construct($name, $firstOption, $selectedCode);
        Session::start();
        $this->setSelectedCodeFromSession();
        $this->setSelectedCodeFromRequest();
        $this->saveSelectedCodeIntoSession();
    }

    public function saveSelectedCodeIntoSession()
    {
        $_SESSION[$this->getSelectedCode()] = $this->getSelectedCode();
    }

    public function setSelectedCodeFromSession(): void
    {
        if (isset($_SESSION[$this->getSelectedCode()])) {
            $this->setSelectedCode($_SESSION[$this->getSelectedCode()]);
        }
    }
}
