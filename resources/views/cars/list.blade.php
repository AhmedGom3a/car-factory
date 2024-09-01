@extends('cars.layout')

@section('style')
<style>
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
        width: 100%;
        text-align: center;
        margin: 0;
    }
</style>
@endsection


@section('content')
    <h1>Available Cars</h1>
    @if (count($cars) === 0)
        <p>You have not created any cars yet!</p>
        
        </br></br>if you would like to create random cars, click <a href="{{ route('cars.random') }}">here</a>
    @endif

    <ul>
        @foreach ($cars as $car)
            <li>
                <a href="{{ route('cars.show', $car->getId()) }}">
                    <h3> {{ $car->getName() }} </h3>
                    <p>Plate Number: {{ strtoupper($car->getPlateNumber()) }}</p>
                </a>
            </li>
        @endforeach
    </ul>

    </br></br>

    <a href="{{ route('cars.create') }}" class="button">Add a new Car</a>
@endsection

<div class="fixed-footer">
    If you would like to <strong>delete</strong> all cars, click <a href="{{ route('cars.deleteAll') }}">here</a>
</div>