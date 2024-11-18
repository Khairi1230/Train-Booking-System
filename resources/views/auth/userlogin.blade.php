<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketly</title>
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>

<body>
    <div class="signupform">


        <div class="logo-container">

            <h2><a href="{{route('home')}}">Ticketly</a></h2>
            <p>Ticket Booking system</p>
        </div>
        <div class="registeruser">
            @if (session('message'))
            <div style="color:red">
                {{session('message')}}
            </div>
        

            @endif
            <div></div>
            <h2>Login</h2>
            <form action="{{route('loginsubmit')}}" method="post">
                @csrf

                <div class="registerform">

                    <label for="phone">mobile number:</label>
                    <input type="text" name="phone">
                    @error('phone')
                    <div class="text-danger" style="color: red;">{{'please enter the valid mobile number'}}</div>
                    @enderror


                </div>
                <div class="registerform">

                    <label for="password">enter password:</label>
                    <input type="password" name="password">
                    @error('password')
                    <div class="text-danger" style="color: red;">{{'password field cannot be empty'}}</div>
                    @enderror

                </div>
                <input type="submit" name="login" value="login" class="btn">
                <p class="belowsubmit">Do not have Aaccount?<span><a href="{{route('usersignup')}}">register</a></span></p>
            </form>
        </div>
    </div>

</body>

</html>