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
            @if (session('message'))
            <div style="color:green">
                {{session('message')}}
            </div>

            @endif
            @if (session('error'))
            <div style="color:red">
                {{session('error')}}
            </div>

            @endif

            <div class="contactform">
                <h2>Book Ticket</h2>
            </div>
            <form action="{{route('bookticketsubmit')}}" id="booking-form" method="post">
                @csrf

                <select name="bus_id">
                    @foreach($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->bus_name }} - Seats: {{ $bus->seat }}</option>
                    @endforeach
                </select>
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

                    <label for="password">No of Seat</label>
                    <input type="text" name="seat">
                    @error('seat')
                    <div class="text-danger" style="color: red;">{{'enter no of seats'}}</div>
                    @enderror

                </div>

                <input type="submit" name="book" value="book" class="btn" onclick="checkLogin(event)">

            </form>



        </div>
    </main>


</body>

</html>
