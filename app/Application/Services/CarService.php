<?php

namespace App\Application\Services;

use App\Domain\Car;
use App\Infrastructure\Repos\BrandRepository;
use App\Infrastructure\Repos\CarRepository;


class CarService
{
    private const DEFAULT_BRAND_COUNT = 2;
    private const DEFAULT_CAR_COUNT = 2;

    public function __construct(
        protected BrandRepository $brandRepository,
        protected CarRepository $carRepository
    ) {
        //
    }

    public function getCarByIdWithBrand(int $id): ?Car
    {
        return $this->carRepository->findCarByIdWithBrand($id);
    }

    public function createCar(string $name, string $color, string $plateNumber, int $brandId): Car
    {
        $brand = $this->brandRepository->findBrandById($brandId);
        if (!$brand) {
            throw new \Exception('Brand not found');
        }

        $car = new Car(
            name: $name,
            color: $color,
            plateNumber: $plateNumber,
            brand: $brand
        );

        return $this->carRepository->store($car);
    }

    public function createRandomCars(): void
    {
        $this->brandRepository->createRandomBrandsWithCars(
            brandCount: self::DEFAULT_BRAND_COUNT,
            carCount: self::DEFAULT_CAR_COUNT
        );
    }

    public function deleteAllCars(): void
    {
        $this->carRepository->deleteAll();
    }

    /**
     * @return Car[]
     */
    public function getAllCars(): array
    {
        return $this->carRepository->findAllCars();
    }

    public function deleteCar(int $id): void
    {
        $car = $this->getCarByIdWithBrand($id);
        if (!$car) {
            return;
        }

        $this->carRepository->delete($id);
    }
}
