@extends('cars.layout')

@section('content')
    <h1>{{ $car->getName() }}</h1>
    <p>Plate Number: {{ $car->getPlateNumber() }}</p>
    <p>Color: {{ $car->getColor() }}</p>
    <p>Brand: {{ $car->getBrandName() }}</p>
    <form action="{{ route('cars.delete', $car->getId()) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    </br></br>
    <a href="{{ route('cars.list') }}">Back to Cars</a>
@endsection