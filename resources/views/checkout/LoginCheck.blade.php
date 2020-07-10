<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My shop</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
   
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">

</head>
<body>
	<a href="{{url('/')}}"><i class="fa fa-home fa-3x" aria-hidden="true"></i></a>
	<h2>Sign in/up</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{URL::to('/create-account')}}" method="POST">
            	{{csrf_field()}}
                <h1>Create Account</h1>
                <input type="text" name= "newName"placeholder="Name" />
                <input type="email" name= "newEmail"placeholder="Email" />
                <input type="password" name= "newPassword"placeholder="Password" />
                <input type="text" name= "newPhone"placeholder="Phone number" />
                <button type="submit">Sign Up</button>
                

            </form>
            <a href="{{url('/to-cart')}}"><i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></a>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{URL::to('/login')}}" method="POST">
                {{csrf_field()}}
                <h1>Sign in</h1>
                
                <span>or use your account</span>
                <input type="email" name="email_account"placeholder="Email" />
                <input type="password" name="email_password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="subit">Sign In</button><br>
                
            </form>
            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
