<?php
	echo '<h1> Edycja tekstów:</h1> ';
	
	$texty_query = mysql_query("SELECT * FROM mammarosa_texty");
	$dane_query = mysql_query("SELECT * FROM mammarosa_dane");
	
	// pola do edycji tekstów
	
	while($texty_result = mysql_fetch_array($texty_query)){
		echo "<h3>".$texty_result['nazwa']."</h3>";
		echo "<textarea  style='width:540px;height:290px;font-size:18px;font-family:Calibri;' id='".$texty_result['id']."' >".$texty_result['tresc']."</textarea> <br/>";
	}
	
	$dane_result = mysql_fetch_array($dane_query);
	
	echo "<br/> <h3>edycja danych kontaktowych:</h3>";
	echo "(godziny otwarcia) pn-czw: <input type='text' id='pn' value='".$dane_result['pn']."'/><br/><br/>";
	echo "(godziny otwarcia) pt-sb: <input type='text' id='pt' value='".$dane_result['pt']."'/><br/><br/>";
	echo "(godziny otwarcia) nd: <input type='text' id='nd' value='".$dane_result['nd']."'/><br/><br/>";
	echo " tel: <input type='text' id='tel' value='".$dane_result['tel']."'/><br/><br/>";
	echo "nip: <input type='text' id='nip' value='".$dane_result['nip']."'/><br/><br/>";
	echo "adres: <input type='text' id='adres' value='".$dane_result['adres']."'/><br/><br/>";
	
	echo "<div style='width:200px;height:60px;' ><div class='save2'>zapisz</div></div>";
	
?>