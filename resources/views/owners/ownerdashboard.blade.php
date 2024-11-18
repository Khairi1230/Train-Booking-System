<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/files.css')}}">
    <title>Document</title>
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
                    <li><a href="{{route('availableseat')}}">Available seat</a></li>
                    <li><a href="{{route('addbus')}}">Add Bus</a></li>
                    <li><a href="{{route('contactus')}}">Contact us</a></li>
                    @if (Session::has('owner_id'))
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

                    <form id="logout-form" action="{{ route('ownerlogout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <main>
        @if (session('success'))
        <div style="color:red;">
            {{session('success')}}
        </div>
        @endif
        <div class="table-container">
            <h2>Your Buses</h2>
            @if($buses->isEmpty())
            <p style="color:black; margin:1rem 0">You have not added any buses yet.</p>
            @else
            <table class="bus-table">
                <thead>
                    <tr class="tableheading">
                        <th>Bus Name</th>
                        <th>Route</th>
                        <th>Seats</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buses as $bus)
                    <tr>
                        <td>{{ $bus->bus_name }}</td>
                        <td>{{ $bus->routes ? $bus->routes->route_name : 'No route assigned' }}</td>
                        <td>{{ $bus->seat }}</td>
                        <td>{{ $bus->price }}</td>
                        <td>{{ $bus->date }}</td>
                        <td>{{ $bus->time }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @endif
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