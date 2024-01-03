<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/css/style2.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    
    <div class="sidebar">
        <a href="{{ route ('schools.index') }}" class="logo">
            <i class='bx bxl-mailchimp'></i>
            <div class="logo-name"><span>Chimp</span>Pro</div>
        </a>
        <ul class="side-menu">
        
        
        </ul>
        <ul class="side-menu">
            <li class="de">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="logout" type="submit"> <i class='bx bx-log-out' ></i>Logout</button>
            </form>  
            </li>
        </ul>

    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <!-- <img src="images/logo.png"> -->
                <h4>{{ Auth::user()->name }}</h4>
            </a>
        </nav>



        <main>
            <div class="header">
                <div class="left">
                    <!-- <h1>Dashboard | Welcome {{ Auth::user()->name }}</h1> -->
                    @if(isset($selectedCategory))
                        <h1>{{ $selectedCategory->category_name }}</h1>
                    @endif
                    <div>
                        @if (session()->has('success'))
                            <p>{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                    
                        <i class='bx bx-receipt'></i>
                        <h3>FoodItem List</h3>
                        @if(auth()->user()->can('ed_de','view_only')|| auth()->user()->can('view_only'))
                        @if ($category)
                        <a href="{{ route('fooditem.create', ['category_id' => $category_id]) }}" class="newbtn2">Add New FoodItem</a>
                        @endif
                        @endif
                    
                        
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th><h2>FoodItem Name</h2></th>
                                <th><h2>Food_Price</h2></th>
                                <th><h2>Actions</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                
                        @foreach ($fooditem as $fooditem)
                        <tr>

                            <td>{{ $fooditem->fooditem_name }}</td>
                            <td>{{ $fooditem->fooditem_price }}</td>

                            <td class="butt">
                                <form action="{{ route('fooditem.destroy',$fooditem->fooditem_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="newbtn"><span class="newbtn_top">View</span></a>
                                    @if(auth()->user()->can('ed_de')|| auth()->user()->can('view_only'))
                                        <a href="{{ route('fooditem.edit',$fooditem->fooditem_id) }}" class="newbtn"><span class="newbtn_top">Edit</span></a>
                                        <input type="submit" class="newbtn1" value="Delete">
                                    @endif
                                    
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                
                        </tbody>
                    </table>
                </div>   
            </div>
        </main>

    </div>
    
    <script src="{{ url('backend/js/app2.js')}}"></script>
</body>
</html>