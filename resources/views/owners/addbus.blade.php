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
            @if (session('Failed'))
            <div>
                {{session('Failed')}}
            </div>

            @endif
            <h2>Add Bus</h2>
            <form action="{{ route('addbussubmit') }}" method="post">
                @csrf
                <input type="hidden" name="owner_id" value="{{ session('owner_id') }}">
                <div class="registerform">
                    <label for="bus_name">Bus name</label>
                    <input type="text" name="bus_name" value="{{ old('bus_name') }}">
                    @error('bus_name')
                    <div class="text-danger">{{ 'Please enter a bus name' }}</div>
                    @enderror
                </div>

                <div class="registerform">
                    <label for="route_id">Bus Route</label>
                    <select name="route_id" style="padding:10px;">
                        <option value="" style="padding:10px">Select Route</option>
                        @foreach($routes as $route)
                        <option value="{{ $route->id }}">{{ $route->route_name }}</option>
                        @endforeach
                    </select>
                    @error('route_id')
                    <div class="text-danger">{{ 'Please select a valid route' }}</div>
                    @enderror
                </div>

                <div class="registerform">
                    <label for="seat">Seating capacity</label>
                    <input type="text" name="seat" value="{{ old('seat') }}">
                    @error('seat')
                    <div class="text-danger">{{ 'Please enter the seat capacity' }}</div>
                    @enderror
                </div>

                <div class="registerform">
                    <label for="price">Enter price</label>
                    <input type="text" name="price" value="{{ old('price') }}">
                    @error('price')
                    <div class="text-danger">{{ 'Price field cannot be empty' }}</div>
                    @enderror
                </div>
                 <div class="registerform">
                    <label for="price">Enter date</label>
                    <input type="date" name="date" value="{{ old('date') }}">
                    @error('date')
                    <div class="text-danger">{{ 'date field cannot be empty' }}</div>
                    @enderror
                </div>
                <div class="registerform">
                    <label for="time">Enter time</label>
                    <input type="time" name="time" value="{{ old('time') }}">
                    @error('time')
                    <div class="text-danger">{{ 'time field cannot be empty' }}</div>
                    @enderror
                </div>

                <input type="submit" name="register" value="Register" class="btn">
            </form>


        </div>
    </div>

</body>

</html>