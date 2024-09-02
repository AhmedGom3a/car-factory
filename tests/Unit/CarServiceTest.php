<?php

namespace Tests\Unit;

use App\Domain\Brand;
use App\Domain\Car;
use App\Infrastructure\Repos\BrandRepository;
use App\Infrastructure\Repos\CarRepository;
use App\Application\Services\CarService;
use Tests\TestCase;

class CarServiceTest extends TestCase
{
    /**
     * @dataProvider carCreationDataProvider
     */
    public function testCarCreationUsingService(
        int $brandId,
        string $name,
        string $color,
        string $plateNumber,
        int $carId
    ): void
    {
        $brandMock = $this->createMock(Brand::class);
        $brandRepositoryMock = $this->createMock(BrandRepository::class);
        $brandRepositoryMock->method('findBrandById')->willReturn($brandMock);

        $carRepositoryMock = $this->createMock(CarRepository::class);
        $carRepositoryMock->method('store')->willReturn(new Car(
            name: $name,
            color: $color,
            plateNumber: $plateNumber,
            brand: $brandMock,
            carId: $carId
        ));

        $carService = new CarService(
            $brandRepositoryMock,
            $carRepositoryMock
        );

        $car = $carService->createCar($name, $color, $plateNumber, $brandId);

        $this->assertEquals($name, $car->getName());
        $this->assertEquals($color, $car->getColor());
        $this->assertEquals($plateNumber, $car->getPlateNumber());
        $this->assertEquals($brandMock, $car->getBrand());
        $this->assertEquals($carId, $car->getId());
    }

    public static function carCreationDataProvider(): array
    {
        return [
            'car1' => [
                'brandId' => 1,
                'name' => 'Car 1',
                'color' => 'Red',
                'plateNumber' => 'ABC123',
                'carId' => 1
            ],
            'car2' => [
                'brandId' => 2,
                'name' => 'Car 2',
                'color' => 'Blue',
                'plateNumber' => 'DEF456',
                'carId' => 2
            ]
        ];
    }
}
