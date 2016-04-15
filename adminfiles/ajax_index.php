<?php
	// ajax plik do zapisywania do bazy
	include_once("db_connect.php");

	
	
	
	if($_GET['type']==0 && $_POST['type']!=4){

		mysql_query(" UPDATE mammarosa_menu_rekord SET nazwa='".$_GET['nazwa']."', skladniki='".$_GET['skladniki']."', cena='".$_GET['cena']."' WHERE id=".$_GET['id_rekordu']." ");
	}elseif($_GET['type']==1){
		
		mysql_query(" INSERT INTO `mammarosa_menu_rekord`( `id_kategori`, `nazwa`, `skladniki`, `cena`) VALUES (".$_GET['id_kategori'].",'".$_GET['nazwa']."','".$_GET['skladniki']."','".$_GET['cena']."') ");
	}elseif($_GET['type']==2){
		
		mysql_query("DELETE FROM `mammarosa_menu_rekord` WHERE id=".$_GET['id_rekordu']);
	}elseif($_GET['type']==3){
		if($_GET['nowa_kategoria']==0){
			mysql_query("UPDATE `mammarosa_menu_kategorie` SET `nazwa`='".$_GET['nazwa_kategori']."' WHERE id=".$_GET['id_kategori']."");
		}else{

		}
		
	}
	
	
	if($_POST['type']==4){ 

		mysql_query("UPDATE `mammarosa_texty` SET `tresc`='".$_POST['text1']."' WHERE id=1");
		mysql_query("UPDATE `mammarosa_texty` SET `tresc`='".$_POST['text2']."' WHERE id=2");

		mysql_query("UPDATE `mammarosa_dane` SET `pn`='".$_POST['pn']."',`pt`='".$_POST['pt']."',`nd`='".$_POST['pt']."',`tel`='".$_POST['tel']."',`nip`='".$_POST['nip']."',`adres`='".$_POST['adres']."' WHERE id=1");
		
	}
	
?>