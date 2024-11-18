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
                    <li><a href="{{route('availableseat')}}">Available Seat</a></li>
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
    <main class="dashboard">
        <h1>Bus Dashboard</h1>

        @foreach($buses as $bus)
        <h2>{{ $bus->bus_name }}</h2>
        <p class="total-seats">Total Seats: {{ $bus->seat }}</p>
        <p class="booked-seats">Booked Seats: {{ $bus->bookings->sum('seat') }}</p>
        <p class="available-seats">Available Seats: {{ $bus->seat - $bus->bookings->sum('seat') }}</p>

        <h3 class="details">Booking Details</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Seats Booked</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bus->bookings as $booking)
                <tr>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->seat }}</td>
                    <td>{{ $booking->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach

        <style>
            .dashboard {
                margin: 6rem auto 3rem;
                max-width: 1200px;
                padding: 20px;
                background-color: #f5f5f5;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            h1 {
                font-size: 2.5rem;
                margin-bottom: 2rem;
                text-align: center;
                color: #333;
            }

            h2 {
                font-size: 1.8rem;
                margin-top: 1.5rem;
                color: #444;
            }

            .styled-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
                background-color: #fff;
            }

            .styled-table thead {
                background-color: #333;
                color: #fff;
            }

            .styled-table th,
            .styled-table td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ccc;
            }

            .styled-table th {
                font-weight: bold;
            }

            .styled-table tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .styled-table tbody tr:hover {
                background-color: #f1f1f1;
            }

            .total-seats,
            .booked-seats,
            .available-seats {
                font-size: 1.2rem;
                margin: 0.5rem 0;
                color: #555;
            }

            .details {
                margin-top: 1.5rem;
                font-size: 1.5rem;
                color: #333;
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