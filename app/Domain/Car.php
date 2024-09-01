<?php

namespace App\Domain;

use App\Domain\Brand;

class Car
{
    public function __construct(
        private ?int $carId = null,
        private string $name,
        private string $color,
        private string $plateNumber,
        private Brand $brand
    ) {
    }

    public function getId(): ?int
    {
        return $this->carId;
    }

    public function setId(int $carId): void
    {
        $this->carId = $carId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getPlateNumber(): string
    {
        return $this->plateNumber;
    }

    public function getBrandName(): string
    {
        return $this->brand->getName();
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }
}