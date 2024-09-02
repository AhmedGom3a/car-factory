<?php

namespace App\Infrastructure\Repos;

use App\Models\Car as CarModel;
use App\Domain\Car;
use App\Domain\Brand;

class CarRepository
{
    public function findCarByIdWithBrand(int $carId): ?Car
    {
        $car = CarModel::with('brand')->find($carId);
        if (!$car) {
            return null;
        }

        return $this->mapCarModelToCar($car);
    }

    /**
     * @return Car[]
     */
    public function findAllCars(): array
    {
        $cars = CarModel::with('brand')->get();
        return $cars->map(function ($car) {
            return $this->mapCarModelToCar($car);
        })->all();
    }

    public function delete(int $carId): void
    {
        CarModel::destroy($carId);
    }

    public function deleteAll(): void
    {
        CarModel::truncate();
    }

    public function store(Car $car): Car
    {
        $carModel = new CarModel();
        $carModel->name = $car->getName();
        $carModel->color = $car->getColor();
        $carModel->plate_number = $car->getPlateNumber();
        $carModel->brand_id = $car->getBrand()->getId();
        $carModel->save();

        $car->setId($carModel->id);
        return $car;
    }

    private function mapCarModelToCar(CarModel $car): Car
    {
        return new Car(
            $car->name,
            $car->color,
            $car->plate_number,
            new Brand(
                $car->brand->name,
                $car->brand->id
            ),
            $car->id,
        );
    }
}
