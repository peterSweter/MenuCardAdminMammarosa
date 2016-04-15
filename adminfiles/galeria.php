<?php
	
	// galeria obsługa php
	echo "<h2>edycja galeri </h2>";

	$HTML_form_galery = <<< EOF
	<FORM ACTION="adminindex.php?category=3" METHOD="POST" ENCTYPE="multipart/form-data">
Zdjęcie: </td><td><INPUT type="file" name="zdjecie">
<input type="submit" name="ok" value="Wyślij zdjęcie do bazy"/>
EOF;


		if(isSet($_POST['is_file2'])){
			
			$fhandle = fopen($_FILES['zdjecie']['tmp_name'], "r");
			$content = base64_encode(fread($fhandle, $_FILES['zdjecie']['size']));
			fclose($fhandle);
			
			 $zapytanie = mysql_query("UPDATE `mammarosa_zdjecia` SET `zdjecie`=\"".$content."\" WHERE id=".$_POST['is_file2']);

		}
		
		echo "<div style='height:1200px;'>";
		for($i=1; $i <=14 ;$i++){
			
			echo "<div style='width:215px; height:280px;float:left;margin-right:5px;'><img style=\"width:172px;height:172px;\" src=\" adminfiles/showphoto.php?id=$i \" >";
			echo $HTML_form_galery;
			echo '<input type="hidden" name="is_file2" value="'.$i.'"/>	</FORM>';
		
			echo "</div>";
			
			
			
		}
		echo "</div>";

?>