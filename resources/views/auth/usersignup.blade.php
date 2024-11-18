<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register user</title>
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>

<body>
    <div class="signupform">


        <div class="logo-container">

            <h2><a href="{{route('home')}}">Ticketly</a></h2>
            <p>Ticket Booking system</p>
        </div>
        <div class="registeruser">
            <h2>Register</h2>
            <form action="{{route('signupsubmit')}}" method="post">
                @csrf
                <div class="registerform">
                    <label for="name">enter your name</label>
                    <input type="text" name="name">
                    @error('name')
                    <div class="text-danger" style="color: red;">{{'please enter the name'}}</div>
                    @enderror

                </div>
                <div class="registerform">

                    <label for="email">enter email</label>
                    <input type="email" name="email">
                    @error('email')
                    <div class="text-danger" style="color: red;">{{'please enter the valid email'}}</div>
                    @enderror

                </div>
                <div class="registerform">

                    <label for="phone">mobile number</label>
                    <input type="text" name="phone">
                    @error('phone')
                    <div class="text-danger" style="color: red;">{{'please enter the valid mobile number'}}</div>
                    @enderror


                </div>
                <div class="registerform">

                    <label for="password">enter password</label>
                    <input type="password" name="password">
                    @error('password')
                    <div class="text-danger" style="color: red;">{{'password field cannot be empty'}}</div>
                    @enderror

                </div>

                <div class="registerform">

                    <label for="address">enter Address</label>
                    <input type="text" name="address">
                    @error('address')
                    <div class="text-danger" style="color: red;">{{'please enter the address'}}</div>
                    @enderror


                </div>
                <input type="submit" name="register" value="register" class="btn">
                <p class="belowsubmit">Already have account?<span><a href="{{route('userlogin')}}">login</a></span></p>
            </form>
        </div>
    </div>

</body>

</html>