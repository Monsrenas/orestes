 <!-- about -->
    
    <div id="about" class="about">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-3 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="images/about.png" alt="img" style="width: 300px; margin-top: -100px; margin-left: 0px" /></figure>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 co-sm-l2">
                    <div class="about_box">
                        <h2>A/C ORESTES’S<br><strong class="black">{{trans('welcome.whyus')}}</strong></h2>
                        @foreach( trans('welcome.us') as $line) 
                            <p>{{$line}}</p>
                        @endforeach
                        <!--<a href="#">Read More</a>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end about -->