@if($lng=="es")
    <a href="{{ url('lang', ['en']) }}">
        <img src="images/en.png" alt="Idioma" style="width: 25px;">  
    </a>
@else
    <a href="{{ url('lang', ['es']) }}">
        <img src="images/es.png" alt="Idioma" width="25px">  
    </a>
@endif