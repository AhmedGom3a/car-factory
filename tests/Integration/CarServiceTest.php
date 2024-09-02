<?php

namespace Tests\Integration;

use App\Models\Brand;
use App\Infrastructure\Repos\BrandRepository;
use App\Infrastructure\Repos\CarRepository;
use App\Application\Services\CarService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarServiceTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $carRepo = new BrandRepository();
        $brandRepo = new CarRepository();
        $this->carService = new CarService($carRepo, $brandRepo);
    }

    /**
     * @dataProvider carCreationDataProvider
     */
    public function testCarCreation(
        string $brandName,
        string $carName,
        string $carColor,
        string $carPlateNumber
    ) {
        // Arrange
        $brand = Brand::factory()->create(['name' => $brandName]);

        // Act
        $car = $this->carService->createCar($carName, $carColor, $carPlateNumber, $brand->id);

        // Assert
        $this->assertNotNull($car->getId());
        $this->assertEquals($carName, $car->getName());
        $this->assertEquals($carColor, $car->getColor());
        $this->assertEquals($carPlateNumber, $car->getPlateNumber());
        $this->assertEquals($brand->id, $car->getBrand()->getId());

        $this->assertDatabaseHas('cars', [
            'id' => $car->getId(),
            'name' => $carName,
            'color' => $carColor,
            'plate_number' => $carPlateNumber,
            'brand_id' => $brand->id
        ]);
    }

    public function testCarCreationFailsForNonExistentBrand()
    {
        // Expect an exception
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Brand not found');

        // Act
        $this->carService->createCar('Model S', 'Red', 'ABC-123', 999); // Non-existent brand ID
    }

    public static function carCreationDataProvider(): array
    {
        return [
            'car1' => [
                'brandName' => 'Tesla',
                'carName' => 'Model S',
                'carColor' => 'Red',
                'carPlateNumber' => 'ABC-123'
            ],
            'car2' => [
                'brandName' => 'Toyota',
                'carName' => 'Corolla',
                'carColor' => 'Blue',
                'carPlateNumber' => 'XYZ-456'
            ],
            'car3' => [
                'brandName' => 'Ford',
                'carName' => 'Fiesta',
                'carColor' => 'Green',
                'carPlateNumber' => 'DEF-789'
            ],
        ];
    }
}
