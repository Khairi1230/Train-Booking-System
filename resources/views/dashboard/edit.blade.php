<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/files.css')}}">

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
        <div class="container">
            <h2>Edit Booking</h2>
            @if (session('message'))
            <div style="color:red">
                {{session('message')}}
            </div>

            @endif

            <form action="{{ route('updatebooking', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="bus_name">Bus</label>
                    <input type="text" id="bus_name" value="{{ $booking->bus->bus_name }}" disabled class="form-control">
                </div>

                <div class="form-group">
                    <label for="seat">Seat(s)</label>
                    <select name="seat" id="seat" class="form-control">
                        @foreach($availableSeats as $seat)
                        <option value="{{ $seat }}" {{ $seat == $booking->seat ? 'selected' : '' }}>
                            {{ $seat }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Departure Date</label>
                    <input type="text" id="date" value="{{ \Carbon\Carbon::parse($booking->bus->date)->format('d M Y') }}" disabled class="form-control">
                </div>

                <div class="form-group">
                    <label for="time">Departure Time</label>
                    <input type="text" id="time" value="{{ \Carbon\Carbon::parse($booking->bus->time)->format('h:i A') }}" disabled class="form-control">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save">Save Changes</button>
                    <a href="{{ route('userdashboard') }}" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>

        <style>
            .container {
                width: 50%;
                margin: 0 auto;
                padding: 20px;
                margin-top: 6rem;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            h2 {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
                color: #333;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .form-control {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .form-actions {
                margin-top: 20px;
                display: flex;
                justify-content: flex-end;
            }

            .btn {
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                text-decoration: none;
            }

            .btn-save {
                background-color: #28a745;
                color: white;
            }

            .btn-save:hover {
                background-color: #218838;
            }

            .btn-cancel {
                background-color: #dc3545;
                color: white;
                margin-left: 10px;
            }

            .btn-cancel:hover {
                background-color: #c82333;
            }
        </style>
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
</body>

</html>