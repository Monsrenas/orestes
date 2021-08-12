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


        <div class="container">
          <div class="row ">
            <div class="col-md-8 col-xs-7">
              <div class="parrafo">
              <p class="text-justify">evaluaciones_izquierda</p>
              <p class="text-justify"></p>
              </div>           
            </div>

            <div class="col-md-4 col-xs-5 parrafo">
              <div style="float: none;">
              <p class="text-justify" style="color: #GF6F6F;">evaluaciones_derecha</p> 
              </div>
              <form  style="color:black;" action="guardatestimonio.php" method="post" autocomplete="off" class=" ">
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
                <p id="bot" ><input type="submit" id="submit" name="submit" value="enviar" class="boton" style="font-size: 1.5vw; float: none;"></p>
              </form>
          
          </div>
        </div>
      </div>