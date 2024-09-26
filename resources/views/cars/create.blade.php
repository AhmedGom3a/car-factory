@extends('cars.layout')

@section('style')
    <style xmlns="">
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

        .form-box {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .form-content {
            flex: 1;
            max-width: 25%;
            padding-right: 20px;
        }

        .image-container {
            width: 70%;
            aspect-ratio: 1816 / 1144;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f9f9f9;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        form label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input[type="color"] {
            padding: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20%;
        }

        button:hover {
            background-color: #2980b9;
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
        <h1>Create a New Car</h1>
        <hr>
        <div class="form-box">
            <div class="form-content">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    <label for="name">Car Model Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="plate_number">Plate Number:</label>
                    <input type="text" id="plate_number" name="plate_number" required>

                    <label for="color">Select Car Color:</label>
                    <input type="color" id="color" name="color" value="white" required>

                    <label for="brand_id">Car Brand:</label>
                    <select name="brand_id" id="brand_id" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->getId() }}">{{ $brand->getName() }}</option>
                        @endforeach
                    </select>

                    <button type="submit">Create</button>
                </form>
            </div>

            <div class="image-container">
                <img src="{{ $image }}" alt="Car Image">
            </div>
        </div>

        <a class="back-link" href="{{ route('cars.list') }}">Back to Cars</a>
    </div>

    <script>
        document.querySelector('.image-container').style.backgroundColor = document.getElementById('color').value;

        document.getElementById('color').addEventListener('input', function() {
            document.querySelector('.image-container').style.backgroundColor = this.value;
        });
    </script>
@endsection
