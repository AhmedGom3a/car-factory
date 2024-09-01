@extends('cars.layout')

@section('content')
    <h1>{{ $car->name }}</h1>
    <p>Plate Number: {{ $car->plate_number }}</p>
    <p>Color: {{ $car->color }}</p>
    <p>Brand: {{ $car->brand->name }}</p>
    <p>Created at: {{ $car->created_at }}</p>
    <form action="{{ route('cars.delete', $car->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection