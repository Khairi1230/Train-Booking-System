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
                <h2>Chitwan Tour</h2>
                <div class="toppart">

                    <div class="priceandtime">
                        <span>2 Night and 3days</span>
                        <span>NPR 6500</span>
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
                <p>Chitwan, a beautiful destination in Nepal, is ideal for group tours, offering a blend of nature, wildlife, and culture. Famous for Chitwan National Park, it allows visitors to experience jungle safaris, spotting wildlife like rhinos, tigers, and elephants. Group tours can enjoy activities such as canoe rides, bird watching, and visiting Tharu villages to learn about local traditions. The scenic landscapes, serene rivers, and lush forests make it a perfect place for adventure and bonding with nature, providing an unforgettable group experience.</p>
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
                    <img src="{{asset('chitwan.jpg')}}" alt="pokhara">
                    <p>Chitwan, located in the southern part of Nepal, is renowned for its rich biodiversity and cultural heritage. It is home to **Chitwan National Park**, a UNESCO World Heritage site, famous for its dense jungles and diverse wildlife, including Bengal tigers, one-horned rhinoceroses, and various bird species. Visitors can enjoy jungle safaris, elephant rides, canoeing, and bird-watching tours, immersing themselves in nature.

                        Chitwan is also culturally significant, offering a glimpse into the traditions of the **Tharu** community, known for their unique lifestyle and vibrant dances. The peaceful environment and adventure opportunities make Chitwan a must-visit destination for nature lovers.</p>
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