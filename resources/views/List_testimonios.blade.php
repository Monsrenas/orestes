<div style="max-height: 24em; overflow: scroll;">
	<?php
	$star= "\u{272F}"; 
	 foreach ($lista as $data) { 
		 echo "<div class='eval'>";	
			echo "<span class='nombre'>".$data['nombre']."</span>";
			echo "<span class='fecha'>".$data['created_at']."</span>";
			echo "<span class='desde'>, ".$data['localidad']."</span>";
			echo "<span class='strella'>".str_pad("",$data['estrellas']*3,$star)."</span>";
			echo "<span class='coment'>".$data['mensaje']."</span>";
	   	 echo "</div>";
		}
	?>
</div>