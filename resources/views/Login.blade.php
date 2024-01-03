<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('backend/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('backend/css/style.css') }}">
</head>
<body>

    <!-- <div class="container login-container">
        <h2 class="text-center">Login</h2>

        @if(Session::has('error'))

            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>

        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group mb-3 ">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div> -->

    
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a> -->
                </div>
                <!-- <span>or use your email for registeration</span> -->
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <input type="text" placeholder="Name" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password" name="confirm-password">
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="POST">
                @csrf 
                <h1>Sign in</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a> -->
                </div>
                <!-- <span>or use your email and password</span> -->
                @if(Session::has('error'))

                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>

                @endif

                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" >Login</button>
            </form>
        </div>


        <div class="toggle-container">
            <div class="toggle">    

                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Already have an Account,Please Login!</p>
                    <button class="hidden" id="login">Sign in</button>
                </div>
            
                <div class="toggle-panel toggle-right">
                    <h1>Hello!</h1>
                    <p>Register for the first time!</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>

            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ url('backend/js/app.js')}}"></script>
</body>
</html>