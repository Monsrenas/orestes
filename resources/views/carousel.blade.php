    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="images/banner/banner1.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>{{trans('welcome.bnnrL1')[0]}}</h1>
                            <span>{{trans('welcome.bnnrL2')[0]}}</span>

                            <p>{{trans('welcome.bnnrL3')[0]}}</p>
    
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="images/banner/banner2.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>{{trans('welcome.bnnrL1')[1]}}</h1>
                            <span>{{trans('welcome.bnnrL2')[1]}}</span>
<!--
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                            <a class="buynow" href="#about">About us</a><a class="buynow ggg" href="#">Get a quote</a>-->

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="images/banner/banner3.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>{{trans('welcome.bnnrL1')[2]}}</h1>
                            <span>{{trans('welcome.bnnrL2')[2]}}</span>

                            <p>{{trans('welcome.bnnrL3')[2]}}</p>

                            <!--
                            <a class="buynow" href="#about">About us</a><a class="buynow ggg" href="#">Get a quote</a>  -->

                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>