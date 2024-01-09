<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/css/style4.css') }}">
    <title>KBTC Canteen Menu</title>
</head>

<body>

    <nav>
        <span class="navbar"><h1>{{ $school->school_name }}</h1></span>
        <span class="navbar_sec"><h2>Canteens</h2></span>
    </nav>

    <!-- Canteen_Name_Section -->
    <div class="canteenN">
    @foreach($school->canteen as $canteen)
        <a href="{{ route('show_food_menu',['school_name' => $school->school_name, 'canteen_name' => $canteen->canteen_name]) }}">
            <button class="button-56" role="button">{{ $canteen->canteen_name }}</button>
        </a>
    @endforeach
    </div>
    <div class="nth">
        <!-- This is just for spacing -->
    </div>
    
    <footer>
        <span class="foot">&copy; KBTC 2023 - All rights reserved.</span>
    </footer>
</body>
</html>