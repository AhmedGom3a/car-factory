<?php

namespace App\Domain;

class Brand
{

    public function __construct(
        private ?int $brandId = null,
        private $name
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