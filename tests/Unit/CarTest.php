<?php

namespace Tests\Unit;

use App\Domain\Car;
use App\Domain\Brand;
use Tests\TestCase;

class CarTest extends TestCase
{
    /**
     * @dataProvider carDataProvider
     */
    public function testCarCanBeCreated(
        string $carName,
        string $carColor,
        string $carPlateNumber,
        string $brandName
    ) {
        $brand = new Brand($brandName);
        $car = new Car($carName, $carColor, $carPlateNumber, $brand);

        $this->assertEquals($carName, $car->getName());
        $this->assertEquals($carColor, $car->getColor());
        $this->assertEquals($carPlateNumber, $car->getPlateNumber());
        $this->assertEquals($brand, $car->getBrand());
        $this->assertEquals($brandName, $car->getBrandName());
    }

    public static function carDataProvider(): array
    {
        return [
            [
                'carName' => 'Toyota Corolla',
                'carColor' => 'Red',
                'carPlateNumber' => 'ABC123',
                'brandName' => 'Toyota'
            ],
            [
                'carName' => 'Honda Civic',
                'carColor' => 'Blue',
                'carPlateNumber' => 'XYZ456',
                'brandName' => 'Honda'
            ]
        ];
    }
}
