<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\Services\CarService;
use App\Application\Services\BrandService;
use App\Application\Services\CarImageService;


class CarController extends Controller
{
    public function __construct(
        protected BrandService $brandService,
        protected CarService $carService,
        protected CarImageService $carImageService
    ) {
        //
    }

    public function list()
    {
        $cars = $this->carService->getAllCars();
        return view('cars.list', compact('cars'));
    }

    public function show(string $id)
    {
        $car = $this->carService->getCarByIdWithBrand($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return view('cars.show', compact('car'));
    }

    public function delete(string $id)
    {
        $this->carService->deleteCar($id);
        return redirect()->route('cars.list');
    }

    public function create()
    {
        $brands = $this->brandService->getAllBrands();
        $image = $this->carImageService->generateRandomCarImageUrl();
        return view('cars.create', compact('brands', 'image'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'plate_number' => 'required',
            'brand_id' => 'required',
        ]);

        try {
            $this->carService->createCar(
                $request->input('name'),
                $request->input('color'),
                $request->input('plate_number'),
                $request->input('brand_id')
            );

            return redirect()->route('cars.list');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function random()
    {
        $this->carService->createRandomCars();
        return \redirect()->route('cars.list');
    }

    public function deleteAllCars()
    {
        $this->carService->deleteAllCars();
        return redirect()->route('cars.list');
    }
}
