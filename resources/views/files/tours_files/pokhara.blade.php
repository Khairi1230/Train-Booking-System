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
        <div class="tour-description">
            <div class="tourintro">
                <h2>Pokhara Tour</h2>
                <div class="toppart">

                    <div class="priceandtime">
                        <span>2 Night and 3days</span>
                        <span>NPR 7000</span>
                    </div>
                    <div class="booknow">
                        <a href="{{route('service-unavailable')}}"><button class="bookbtn">Book now</button></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="maindesc">
            <div class="pokharahead">
                <h2>Overview</h2>
                <p>Pokhara is a popular destination for group tours, offering a perfect blend of natural beauty and adventure. Nestled in the foothills of the Himalayas, it boasts stunning views of mountain ranges like Annapurna and Machapuchare. Group travelers can enjoy a variety of activities, from boating on Phewa Lake and exploring the tranquil Peace Pagoda to more thrilling adventures like paragliding and trekking. The city's vibrant lakeside area is also a great spot for dining, shopping, and experiencing local culture. Pokhara's serene environment and diverse attractions make it ideal for group exploration.In addition to its natural wonders, Pokhara offers easy access to popular trekking routes, such as the Annapurna Circuit, making it a hub for adventure enthusiasts. Groups can also visit attractions like Davis Falls, Gupteshwor Cave, and the International Mountain Museum to learn more about the region’s cultural and geological significance. The city's relaxed vibe and warm hospitality create a memorable experience for group tours.</p>
            </div>
            <div class="termsandcondition">
                <h2>Terms and Condition</h2>
                <p>
                <ol>
                    <li>Booking and Payment: A non-refundable deposit is required upon booking, with the full payment due 7 days before the tour departure date</li>
                    <li>Liability: The tour organizer is not responsible for any loss, injury, or damage during the trip due to factors beyond their control, such as natural disasters or travel delays.</li>
                </ol>
                </p>
            </div>
            <div class="aboutplace">
                <h2>About place

                </h2>
                <div class="imganddesc">
                    <img src="{{asset('pokhara.jpg')}}" alt="pokhara">
                    <p>Pokhara, located in central Nepal, is a serene city known for its breathtaking natural beauty and tranquil atmosphere. It is famous for its stunning views of the Annapurna and Dhaulagiri mountain ranges, which provide a majestic backdrop to the city. Phewa Lake, the second-largest lake in Nepal, is a popular attraction where visitors can enjoy peaceful boat rides while admiring the reflection of the snow-capped peaks on the water.

                        The city is also a gateway to the famous Annapurna trekking circuit, attracting adventure enthusiasts from around the world. Pokhara offers several other attractions, including the Peace Pagoda, a symbol of peace and harmony perched on a hilltop, and Davis Falls, a unique waterfall with an underground outlet. Visitors can also explore the mysterious Gupteshwor Cave or learn about the region’s mountaineering history at the International Mountain Museum. Known for its relaxed vibe, vibrant lakeside cafes, and cultural significance, Pokhara is a must-visit destination for nature lovers and adventure seekers alike.</p>
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