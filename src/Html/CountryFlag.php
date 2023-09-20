<?php

declare(strict_types=1);

namespace Html;

class CountryFlag
{
    private string $code;
    private string $baseUrl;

    public function __construct(string $code, string $baseUrl)
    {
        $this->code = $code;
        $this->baseUrl = $baseUrl;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function toHtml()
    {
        return <<<HTML
            <img src="{$this->baseUrl}" alt="{$this->code}">
        HTML;
    }
}
