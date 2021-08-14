<!-- offer -->
    <div class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>{{trans('welcome.special')}} <strong class="black"> {{trans('welcome.offers')}}</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 ">
                        <div class="offer_box">
                            <h3>40% {{trans('welcome.discount')}}</h3>
                            <figure><img src="images/servicio001.png" alt="img" /></figure>
                            <p> {{trans('welcome.offer')[0]}}</p>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin_tt">
                        <div class="offer_box">
                            <h2 style="color: gray;">{{trans('welcome.importitle')}}</h2>
                            @foreach(trans('welcome.importext') as $text)
                                <p style="color: gray;">{{$text}}</p>
                            @endforeach
                            
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin-lkk">
                        <div class="offer_box">
                            <h3>50% {{trans('welcome.discount')}}</h3>
                            <figure><img src="images/partes/sistemarefrige.jpg" alt="img" /></figure>
                            <p>{{trans('welcome.offer')[1]}}</p>
                        </div>
                    </div>
                    <!--
                    <div class="col-md-12">
                        <a class="read-more">See More</a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

    <!-- end offer -->