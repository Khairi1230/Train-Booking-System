<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketly</title>
    <link rel="stylesheet" href="{{asset('css/reservation.css')}}">
    <link rel="stylesheet" href="{{asset('css/files.css')}}">

</head>

<body>
    <nav>
        <nav>
            <div class="navbar">
                <div class="logo">
                    Ticketing system
                </div>
                <div class="links">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('tours')}}">Tours</a></li>
                        <li><a href="{{route('reservation')}}">Reservation</a></li>
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
    </nav>
    <main>
        
        
        <div class="form-container">
            <h2>Reservation</h2>
            @if (session('success'))
            <div class="alert alert-success" style="color:green;">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{route('reservationsubmit')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile No.</label>
                        <input type="text" id="mobile" placeholder="Mobile No." name="mobile">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date">Date of Travel</label>
                        <input type="date" name="date" id="date-of-travel">
                    </div>
                    <div class="form-group">
                        <label for="duration-type">Duration Type</label>
                        <select id="duration-type" name="duration_type">
                            <option>Select Duration Type</option>
                            <option>Short</option>
                            <option>Long</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="passenger-numbers">Passenger Numbers</label>
                        <input type="number" name="passenger_no" id="passenger-numbers" placeholder="Passenger Numbers">
                    </div>
                    <div class="form-group">
                        <label for="journey-to">Journey To</label>
                        <input type="text" name="destination" placeholder="destination">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="journeyform">Journey from</label>
                        <input id="journeyfrom" name="pickup" placeholder="journey from"></input>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" placeholder="Write your specification here..."></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button type="submit" class="submit-btn">Request</button>
                </div>
            </form>
        </div>
</body>
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
                    <li><a href="{{route('reservation')}}">Reservation</a></li>
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


</html>