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
        <div class="mainpart">
            <div class="heading">
                <h2>Popular Tours</h2>
            </div>
            <div class="mainflexbox">

                <div class="flexbox">
                    <a href="{{route('pokharatour')}}"><img src="pokhara.jpg" alt="Pokhara Tour"></a>
                    <h2>Pokhara Tour</h2>
                    <p>Pokhara is in the heart of Nepal, is a best tourist destination.we can bunjey jump paragliding and everyhting.Explore the stunning landscapes...</p>
                    <div class="price-review">
                        <span class="price">NPR 7000/person</span>
                    </div>
                </div>

                <div class="flexbox">
                    <a href="{{route('chitwantour')}}"><img src="chitwan.jpg" alt="Chitwan Tour"></a>
                    <h2>Chitwan Tour</h2>
                    <p>chitwan is a district of Nepal. It is one of the best place to enjoy the holiday because there lies many temple , rivers where we can enjoy the night view as well as chitwan national park...</p>
                    <div class="price-review">
                        <span class="price">NPR 6500/person</span>
                    </div>
                </div>

                <div class="flexbox">
                    <a href="{{route('ilamtour')}}"><img src="ilam.jpg" alt="Dharan Tour"></a>
                    <h2>Ilam Tour</h2>
                    <p>ilam is a popular tourist destination of Nepal, known for its breathtaking natural beauty and its overwhelming culture...</p>
                    <div class="price-review">
                        <span class="price">NPR 12000/person</span>
                    </div>
                </div>

            </div>
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
                        <li><a href="">Login</a></li>
                        <li><a href="">register</a></li>
                        <li><a href="">Contact</a></li>
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