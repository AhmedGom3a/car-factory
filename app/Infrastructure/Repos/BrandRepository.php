<?php

namespace App\Infrastructure\Repos;

use App\Models\Brand as BrandModel;
use App\Domain\Brand;

class BrandRepository
{
    public function findBrandById(int $brandId): ?Brand
    {
        $brand = BrandModel::find($brandId);
        if (!$brand) {
            return null;
        }

        return new Brand(
            $brand->name,
            $brand->id
        );
    }

    /**
     * @return Brand[]
     */
    public function findAllBrands(): array
    {
        $brands = BrandModel::all();
        return $brands->map(function ($brand) {
            return new Brand(
                $brand->name,
                $brand->id
            );
        })->all();
    }

    public function createRandomBrandsWithCars(int $brandCount, int $carCount): void
    {
        BrandModel::factory()->count($brandCount)->hasCars($carCount)->create();
    }
}
