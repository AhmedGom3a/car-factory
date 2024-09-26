<?php

namespace App\Application\Services;

class CarImageService
{
    private const IMAGE_BASE_PATH = 'images/';
    private const AVAILABLE_IMAGES_COUNT = 2;

    public function generateRandomCarImageUrl(): string
    {
        return asset(self::IMAGE_BASE_PATH . "car-temp-" . rand(1, self::AVAILABLE_IMAGES_COUNT) . ".png");
    }
}
