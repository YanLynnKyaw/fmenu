<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/css/style4.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <span class="navbar"><h1>{{ $school->school_name }}</h1></span>
        <span class="navbar_sec"><h2>FoodMenu</h2></span>
    </nav>

    <!-- Canteen_Name_Section -->
    @foreach($school->canteen as $canteen)
    <h3>{{ $canteen->canteen_name }}</h3>

        <!-- Main_Section -->
        <div class="content">
            <div class="cat_n">
                @foreach($canteen->category as $category)
                    <div class="name">
                        <h4>{{ $category->category_name }}</h4>
                            <div class="food_all">
                                @foreach($category->fooditem as $fooditem)
                                <div class="food_in">
                                    
                                        <div class="rr">
                                            <h5>{{ $fooditem->fooditem_name }}</h5>
                                            
                                        </div>
                                        <div class="rr2">
                                            <h5>{{ $fooditem->fooditem_price }}</h5>
                                        </div>
                                    
                                </div>
                                @endforeach
                                
                                <!-- <div class="food_ip">
                                   
                                </div> -->
                            </div>
                    </div>
                @endforeach
            </div> 
        </div>


    @endforeach
    
    
    <footer>
        <span class="foot">&copy; KBTC 2023 - All rights reserved.</span>
    </footer>
</body>
</html>