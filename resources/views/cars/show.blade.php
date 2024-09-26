@extends('cars.layout')

@section('style')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
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

        .details-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .image-container {
            margin-left: 15%;
            width: 70%;
            aspect-ratio: 1816 / 1144;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: <?php echo $car->getColor() ?>;
        }

        .image-container img {
            width: 100%;
            height: 101%;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .details-box p {
            font-size: 1.2em;
            color: #555;
            margin: 10px 0;
        }

        .details-box label {
            font-weight: bold;
        }

        button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: inline-block;
        }

        button:hover {
            background-color: #c0392b;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            font-size: 1em;
            color: #3498db;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>{{ $car->getName() }}</h1>
        <hr>
        
        <div class="details-box">
            <div class="image-container">
                <img src="{{ $car->getImage() }}" alt="Car Image">
            </div>

            <p><label>Plate Number:</label> {{ $car->getPlateNumber() }}</p>
            <p><label>Brand:</label> {{ $car->getBrandName() }}</p>

            <form action="{{ route('cars.delete', $car->getId()) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

        <a class="back-link" href="{{ route('cars.list') }}">Back to Cars</a>
    </div>
@endsection
