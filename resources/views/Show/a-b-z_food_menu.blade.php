<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/css/style3.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <span class="navbar"><h1>{{ $school->school_name }}</h1></span>
        <span class="navbar_sec"><h2>Food Menu</h2></span>
    </nav>

    @foreach($school->canteen as $canteen)
    <h4>{{ $canteen->canteen_name }}</h4>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="mm">
                    @foreach($canteen->category as $category)   
                        <div class="food_menu">
                        <h4>{{ $category->category_name }}</h4>
                            <ul>
                                @foreach($category->fooditem as $fooditem)
                                    <li>{{ $fooditem->fooditem_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="food_price">
                        <h4>Price</h4>
                            <ul>
                                @foreach($category->fooditem as $fooditem)
                                    <li>{{ $fooditem->fooditem_price }}</li>
                                @endforeach
                            </ul>
                    </div>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
    @endforeach
    
    <footer>
        <span class="foot">&copy; KBTC 2023 - All rights reserved.</span>
    </footer>
</body>
</html>
