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
                    <p>Plate Number: {{ strtoupper($car->plate_number) }}</p>
                </a>
            </li>
        @endforeach
    </ul>
@endsection

<style>
    .fixed-footer {
        background-color: #ffcccc;
        border: 1px solid red;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin: 0;
    }
</style>

<div class="fixed-footer">
    If you would like to <strong>delete</strong> all cars, click <a href="{{ route('cars.deleteAll') }}">here</a>
</div>