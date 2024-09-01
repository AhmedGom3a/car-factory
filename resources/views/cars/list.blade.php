@extends('cars.layout')

@section('content')
    <h1>Available Cars</h1>
    <ul>
        @if (count($cars) === 0)
            <p>No cars available</p>

            <a href="{{ route('cars.create') }}">Create Car</a>

            </br></br> Or if you would like to create random cars, click <a href="{{ route('cars.random') }}">here</a>
        @endif

        @foreach ($cars as $car)
            <li>
                <a href="{{ route('cars.show', $car->id) }}">
                    <h3> {{ $car->name }} </h3>
                    <p>Plate Number: {{ $car->plate_number }}</p>
                    <p>Color: {{ $car->color }}</p>
                    <p>Brand: {{ $car->brand->name }}</p>
                </a>
            </li>
        @endforeach
    </ul>
@endsection