<?php

declare(strict_types=1);

namespace Entity;

class Country
{
    private int $id;
    private string $code;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
