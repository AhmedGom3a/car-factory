<?php

namespace App\Domain;

class Brand
{
    public function __construct(
        private $name,
        private ?int $brandId = null
    ) {
        //
    }

    public function getId(): ?int
    {
        return $this->brandId;
    }

    public function getName(): string
    {
        return $this->name;
    }
}