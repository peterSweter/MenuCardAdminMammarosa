<?php

	if(isSet($_GET['delete'])){
	
		mysql_query("DELETE FROM `mammarosa_menu_kategorie` WHERE `id` = ".$_GET['delete']);
		mysql_query("DELETE FROM `mammarosa_menu_rekord` WHERE `id_kategori`= ".$_GET['delete']);
		echo "<script type='text/javascript'> window.location.href = 'http://mammarosa.com.pl/adminindex.php?category=1&deleted=1' </script>";
		
	}
	if(isSet($_GET['deleted'])){
	echo "<script type='text/javascript'> alert('usunięto pomyślnie'); </script>";
	}
	echo "menu maker  <span style=\"color:red;\"> Zapisuj wszystkie zmiany ! </span> <br/>";
	echo '<div id="dialog-confirm" style="display:none;" title="Czy chcesz usunąć kategorię ?"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Usunięcie kategori spowoduje usunięcie wszystkich zawartych w niej dań, tej operacji nie da się cofnąć!</p></div>';
	$query = mysql_query("SELECT * FROM mammarosa_menu_kategorie");
	

	
	if(!isSet($_GET['menu_category']) || $_GET['menu_category'] == 0){
		
		$last_kategory_id =1;
		echo "Kliknij na ikonę ołówka aby edytować kategorię i dodawać nowe pozycję</br> lub krzyżyk aby usunąć kategorię wraz z zawartymi w niej pozycjami <br/> <br/>";
		
		while($result_mammarosa_menu_kategorie = mysql_fetch_array($query)){
			echo "<div class='category_record'>";
			
			echo $result_mammarosa_menu_kategorie['nazwa'];
			echo "<div style='float:right'  class=".$result_mammarosa_menu_kategorie['id']." >  <a class='menu_cros'></a><a href=adminindex.php?category=1&menu_category=".$result_mammarosa_menu_kategorie['id']." class='menu_edit' ></a></div>";
			echo "</div>";
			$last_kategory_id =$result_mammarosa_menu_kategorie['id'];
		}
		
		echo '<a href="adminindex.php?category=1&new=1&menu_category='.($last_kategory_id+1).'" style="display:block;width:150px;height;60px;background-color:#00CCFF">Dodaj nową kategorię</a>';
			
	}else{
		
		if(isSet($_GET['new']) && $_GET['new']==1){
					mysql_query("INSERT INTO `mammarosa_menu_kategorie`(`id`, `nazwa`, `kolejnosc`) VALUES (".$_GET['menu_category'].",'nowa kategoria',1)");
		}
		
		$id_kategori =  $_GET['menu_category'];
		$kategoria_result = mysql_query("SELECT * FROM mammarosa_menu_kategorie WHERE id='$id_kategori'");
		$kategoria = mysql_fetch_array($kategoria_result);
		$rekord_restult = mysql_query("SELECT * FROM mammarosa_menu_rekord WHERE id_kategori = '$id_kategori'");
		
		echo "<h3> Edycja kategori : ". $kategoria['nazwa']." <br/>";
			
			
			
			echo "<div class='category_record'>";
			echo"<input id='category_name' type='text' value='". $kategoria['nazwa']."' >";
			echo "<div style='float:right' class='".$id_kategori."'>  <a class='menu_cros'></a></div>";
			echo "</div>";
			
			$last_rekord_id=0;
			$menu_licznik=0;
			echo "<div id='dania'>";
			
			while($rekord = mysql_fetch_array($rekord_restult)){
				$menu_licznik++;
				echo "<div class='dish_record' id='".$rekord['id']."'>";
					
					echo "<a class='menu_cros'></a>";
					echo "nazwa :<input class='nazwa' value='".$rekord['nazwa']."' style='width:400px;'> <br/>";	
					echo "składniki (opcjonalne) :<input class='skladniki' value='".$rekord['skladniki']."' style='width:400px;'> <br/>";	
					echo "cena :<input class='cena' value='".$rekord['cena']."' style='width:400px;'> ";	
				
				echo "</div>";
				
				$last_rekord_id= $rekord['id'];
				
			}
			echo "</div>";
			
			
			echo "<script type='text/javascript'> last_id =$last_rekord_id; menu_l_rekordow = $menu_licznik; menu_id_kategori = $id_kategori; </script>";
			echo "<div class='admin_tools'>";
			echo "<div class='plus'>dodaj nowe danie</div>";
			echo "<div class='save'>zapisz</div>";
			echo "</div>";
		
	}
?>