 <style type="text/css">
   input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: #CCFF2F;
}

input[type="radio"]:checked ~ label {
  color: #CCFF2F;
}

 </style>

  <div class="offer" id="evalua">
        <div class="container">
          <div class="row ">
            <div class="col-md-12">
                <div class="title">
                        <h2>{{trans('welcome.evalTitle')}} <strong class="black">{{trans('welcome.testiTitle')}}</strong></h2>
                </div>
            </div>
            <div class="col-md-8 col-xs-7">
              <div class="parrafo">
                <p class="text-justify">{{trans('welcome.evalIntro')}}</p>
              </div>
             
                 @include('List_testimonios')
                        
            </div>

            <div class="col-md-4 col-xs-5 parrafo">
              <div style="float: none;">
              <h3>{{trans('welcome.comoevalua')}}</h3> 
              </div>
              <form method="post" style="color:black;" action="{{url('/RegistraTestimonio')}}" autocomplete="off" id="SendEval">
                @csrf 
                <p class="clasificacion" style=" font-size: 2vw;">
                    <input id="radio1" name="estrellas" value="5" type="radio"><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" name="estrellas" value="4" type="radio"><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" name="estrellas" value="3" type="radio"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" name="estrellas" value="2" type="radio" required=""><!--
                --><label for="radio4">★</label><!--
                --><input id="radio5" name="estrellas" value="1" type="radio" required=""><!--
                --><label for="radio5">★</label>
                </p>
                
                <input name="nombre" type="text" id="usuario" placeholder="nombre" required="" class="form-control">
                
                <input name="localidad" type="text" id="lugar" placeholder="localidad" required="" class="form-control">
                 
                <textarea style="overflow: hidden;" rows="4" cols="30" name="mensaje" placeholder="testimonio" class="textarea"></textarea>
                <p id="" ><input type="submit" id="submit" name="submit" value="{{trans('welcome.send')}}" class="boton" style="font-size: 1.5vw; float: none;"></p>
                    </div>

              </form>
          
          </div>
        </div>
      </div>
</div>

 