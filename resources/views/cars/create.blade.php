@extends('cars.layout')

@section('content')
    <h1>Create Car</h1>
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="plate_number">Plate Number:</label><br>
        <input type="text" id="plate_number" name="plate_number" required><br>

        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color" required><br>

        <label for="brand_id">Brand:</label><br>
        <select name="brand_id" id="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">Create</button>
@endsection