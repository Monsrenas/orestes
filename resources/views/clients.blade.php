<?php 
    $ciclo=(count($lista)<11)?count($lista):10;
    $ctv=($ciclo>1)?1:0; 
?>
@if($ciclo>0)
    <!-- clients -->
       <div id="testimonial" class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2> {{trans('welcome.testimonial')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clients_red">
        <div class="container">
            <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
    
                    @for ($i = 0; $i < $ciclo; $i++)
                        <li data-target="#testimonial_slider" data-slide-to="{{$i}}" class="<?php echo (($i==$ctv)?"active":"") ?>"></li>
                     @endfor
                    
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner ">

                    @for ($i = 0; $i < $ciclo; $i++)
                        <div class="carousel-item <?php echo (($i==$ctv)?"active":"") ?>">
                            <div class="testomonial_section">
                            
                                <div class="full testimonial_cont text_align_center cross_layout">
                                    <div class="row justify-content-center">
                                         
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                            <div class="cross_inner">
                                                <h3>{{$lista[$i]['nombre']}}<br><strong class="ornage_color">{{$lista[$i]['localidad']}}</strong></h3>
                                                <p style="text-align: center;"><img src="icon/1.png" alt="#" /> {{$lista[$i]['mensaje']}}
                                                    <img src="icon/2.png" alt="#" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor


                </div>
            </div>
        </div>

    </div>
    <div class="about container">
    <div class="about_box"><a href="#evalua">{{trans("welcome.readmore")}}</a></div>
    </div>
    <!-- end clients -->
 @endif   