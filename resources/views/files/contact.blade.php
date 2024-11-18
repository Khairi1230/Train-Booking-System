<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/files.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <title>Ticketly</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                Ticketing system
            </div>
            <div class="links">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('tours')}}">Tours</a></li>
                    <li><a href="">Reservation</a></li>
                    <li><a href="">Blogs</a></li>
                    <li><a href="{{route('contactus')}}">Contact us</a></li>
                    @if (Session::has('user_id'))
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li><a href="{{route('userlogin')}}">login</a></li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <main>
        <div class="maincontactform">
            @if(session('success'))
            <div class="alert alert-success" style="color:red;" style="margin:1rem">
                {{ session('success') }}
            </div>
            @endif
            <div class="contactform">
                <h2>Contact Us</h2>
            </div>
            <form action="{{route('contactsubmit')}}" method="post">
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
                    <div class="text-danger" style="color: red;">{{'please enter valid mobile number'}}</div>
                    @enderror


                </div>
                <div class="registerform">

                    <label for="password">Subject</label>
                    <input type="text" name="subject">
                    @error('subject')
                    <div class="text-danger" style="color: red;">{{'enter subject feild'}}</div>
                    @enderror

                </div>
                <div class="registerform">

                    <label for="message">Message</label>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                    @error('message')
                    <div class="text-danger" style="color: red;">{{'enter message'}}</div>
                    @enderror


                </div>


                <input type="submit" name="register" value="register" class="btn">
            </form>
        </div>
    </main>
    <footer>
        <div class="mainfooterpart">

            <div class="footerpart">
                <div class="footerlogo">
                    <h2 class="footerheading">Ticketly</h2>
                    <p class="footerintro">Ticketly is one of the best ticket booking system of the nepal. it was introduced to improve the online ticketing system of our country.</p>
                </div>
                <div class="webpages">
                    <h3>Useful links</h3>
                    <ul class="footerlinks">
                        <li><a href="{{route('tours')}}">Tours</a></li>
                        <li><a href="">Reservation</a></li>
                        <li><a href="{{route('userlogin')}}">Login</a></li>
                        <li><a href="{{route('usersignup')}}">register</a></li>
                        <li><a href="{{route('contactus')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="contactlinks">
                    <h3>Contact</h3>
                    <ul class="footerlinks">
                        <li><i class="fa-solid fa-phone"></i> <a href="">9869050407</a></li>
                        <li> <i class="fa-solid fa-envelope"></i><a href="">biplobkafle21@gmail.com</a></li>
                    </ul>

                </div>
            </div>
            <div class="copyright">&copy;All rights reserved 2024</div>
        </div>
    </footer>

</body>

</html>