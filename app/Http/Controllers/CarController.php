<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function list()
    {
        $cars = Car::with('brand')->get();
        return view('cars.list', compact('cars'));
    }

    public function show(string $id)
    {
        $car = Car::with('brand')->find($id);
        return view('cars.show', compact('car'));
    }

    public function delete(string $id)
    {
        Car::destroy($id);
        return redirect()->route('cars.list');
    }

    public function create()
    {
        $brands = Brand::all();
        return view('cars.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->fill($request->all());
        $car->save();
        return redirect()->route('cars.list');
    }

    public function random()
    {
        $car = Brand::factory()->count(2)->hasCars(3)->create();
        return \redirect()->route('cars.list');
    }
}
