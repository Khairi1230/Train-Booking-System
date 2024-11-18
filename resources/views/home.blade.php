<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/42b863db93.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <title>home</title>
</head>

<body>
    <header>
        <div class="upper-header">

            <div class="contactinfo">

            </div>
            <div class="authentication">

                @if (Session::has('user_id'))


                <p><a href="{{route('userdashboard')}}"><i class="fa-solid fa-user"></i>Booking Details</a></p>
                <p><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <p><a href="{{route('ownerdashboard')}}"><i class="fa-solid fa-user"></i>agent</a></p>
                <p><a href="{{route('userlogin')}}"><i class="fa-solid fa-right-to-bracket"></i>Login</a></p>
                <p><a href="{{route('usersignup')}}"><i class="fa-solid fa-user-plus"></i>Signup</a></p>

                @endif

            </div>

        </div>
        <nav>

        </nav>
    </header>
    <main>

<!-- Make sure you include the Bootstrap CSS link in the head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-sm" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4">Book Your Trip</h2>
            <form action="{{route('availablebussubmit')}}" method="POST" class="bookings">
                @csrf

                <!-- Pickup location select -->
                <div class="mb-3">
                    <label for="pickup" class="form-label">Pickup Location</label>
                    <select name="pickup" id="pickup" class="form-select" required>
                        <option value="" disabled selected>Select Pickup location...</option>
                        <option value="Kathmandu">Pahang</option>
                        <option value="Chitwan">Johor</option>
                        <option value="Hetauda">Kelantan</option>
                        <option value="Pokhara">Terangganu</option>
                        <option value="Jhapa">Kedah</option>
                        <option value="Dharan">Perak</option>
                    </select>
                </div>

                <!-- Destination location select -->
                <div class="mb-3">
                    <label for="destination" class="form-label">Destination</label>
                    <select name="destination" id="destination" class="form-select" required>
                        <option value="" disabled selected>Select Destination...</option>
                        <option value="Chitwan">Pahang</option>
                        <option value="Kathmandu">Johor</option>
                        <option value="Hetauda">Terangganu</option>
                        <option value="Pokhara">Kelantan</option>
                        <option value="Jhapa">kedah</option>
                        <option value="Dharan">Perak</option>
                    </select>
                </div>

                <!-- Travel date input -->
                <div class="mb-3">
                    <label for="travle-date" class="form-label">Travel Date</label>
                    <input type="date" name="travledate" id="travle-date" class="form-control" value="{{ request('travledate', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Make sure to include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


    </main>


    <script>
        function getCurrentDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;



        }

        function setcurrentDate() {
            const currentDate = getCurrentDate();
            const dateitems = document.querySelectorAll('.date-item');
            dateitems.forEach(item => {
                const itemdate = item.getAttribute('data-date');
                if (itemdate === currentDate) {
                    document.getElementById('travle-date').value = currentDate;
                    item.classList.add('selected');

                } else {
                    item.classList.remove('selected');
                }
            })
        }
        window.onload = setcurrentDate;

        document.querySelectorAll('.date-item').forEach(item => {
            item.addEventListener('click', function() {
                const SelectDate = this.getAttribute('data-date');
                document.getElementById('travle-date').value = SelectDate;

                document.querySelectorAll('.date-item').forEach(i => i.classList.remove('selected'));
                this.classList.add('selected');
            })
        })
    </script>
    <style>
        .date-item.selected {
            background-color: #007bff;
            color: white;
        }

        .date-item {
            cursor: pointer;

        }
    </style>

</body>

</html>
