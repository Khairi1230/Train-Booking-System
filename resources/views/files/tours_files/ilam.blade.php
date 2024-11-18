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
                <h2>Ilam Tour</h2>
                <div class="toppart">

                    <div class="priceandtime">
                        <span>4 Night and 5days</span>
                        <span>NPR 12000</span>
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
                <p>Ilam, a scenic town in eastern Nepal, is renowned for its rolling hills covered with lush tea gardens and a cool, pleasant climate. It’s often called the "Tea Capital of Nepal," offering visitors the chance to explore beautiful tea estates and experience local tea production. Beyond tea, Ilam's natural beauty includes peaceful landscapes, dense forests, and stunning views of the Himalayas. Popular attractions like **Antu Danda** provide breathtaking sunrise views, while the area is also known for its rich cultural diversity and welcoming local communities.In addition to its tea gardens, Ilam offers serene hiking trails, making it a peaceful retreat for nature lovers. Visitors can explore sacred sites like **Mai Pokhari** and **Gajur Mukhi**, adding a spiritual dimension to their journey. With its clean air, tranquil environment, and cultural richness, Ilam is a perfect destination for those seeking relaxation and a deeper connection with nature.</p>
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
                    <img src="{{asset('ilam.jpg')}}" alt="pokhara">
                    <p>Ilam is a picturesque hill town in eastern Nepal, known for its breathtaking landscapes and vast tea plantations. Situated at an altitude of about 1,200 meters, Ilam boasts a cool, refreshing climate, making it a popular destination for those seeking to escape the heat. The town's rolling hills are adorned with lush greenery, including tea gardens, dense forests, and terraced farmlands, offering stunning panoramic views. Ilam is also a center for biodiversity, home to various species of flora and fauna.

                        The region is culturally rich, with a blend of ethnic groups, including the **Limbu**, **Rai**, and **Brahmin** communities. Visitors can immerse themselves in local traditions, explore tea estates, or visit popular spots like **Antu Danda** for sunrise views, **Mai Pokhari** for a tranquil lakeside retreat, and **Siddhi Thumka** for scenic hikes. Ilam’s peaceful atmosphere and natural beauty make it a serene getaway.</p>
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