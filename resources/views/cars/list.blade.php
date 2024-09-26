@extends('cars.layout')

@section('style')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 0;
        padding-bottom: 60px;
    }

    h1 {
        text-align: center;
        font-size: 2.5em;
        color: #333;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    hr {
        border: 0;
        height: 4px;
        background-color: #2980b9;
        margin: 20px 0;
        width: 20%;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 5%;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .car-list {
        list-style-type: none;
        padding: 0;
        margin-top: 20px;
    }

    .car-list li {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 15px;
    }

    .car-list a {
        text-decoration: none;
        color: #007bff;
    }

    .car-list a:hover {
        text-decoration: underline;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 20px auto;
        display: block;
        width: 200px;
    }

    .button:hover {
        background-color: #0056b3;
        color: white;
        text-decoration: none;
    }

    .fixed-footer {
        background-color: #ffcccc;
        border: 1px solid red;
        padding: 10px;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        margin: 0;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <h1>Available Cars</h1>
        <hr>
        
        @if (count($cars) === 0)
            <p>You have not created any cars yet!</p>
            <br><br>
            If you would like to create random cars, click <a href="{{ route('cars.random') }}">here</a>
        @else
            <ul class="car-list">
                @foreach ($cars as $car)
                    <li>
                        <a href="{{ route('cars.show', $car->getId()) }}">
                            <h3>{{ $car->getName() }}</h3>
                            <p>Plate Number: {{ strtoupper($car->getPlateNumber()) }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        <br><br>

        <a href="{{ route('cars.create') }}" class="button">Add a new Car</a>
    </div>

    <div class="fixed-footer">
        If you would like to <strong>delete</strong> all cars, click <a href="{{ route('cars.deleteAll') }}">here</a>
    </div>
@endsection
