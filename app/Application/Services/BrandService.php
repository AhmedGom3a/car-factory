<?php

namespace App\Application\Services;

use App\Domain\Brand;
use App\Infrastructure\Repos\BrandRepository;

class BrandService
{
    public function __construct(protected BrandRepository $brandRepository)
    {
        //
    }

    public function getAllBrands(): array
    {
        return $this->brandRepository->findAllBrands();
    }
}