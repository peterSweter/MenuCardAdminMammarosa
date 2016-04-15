<?php
	
		include_once("adminfiles/db_connect.php");
		include_once("adminfiles/html_content.php");
		include_once("adminfiles/login_func.php");
		
		echo $HTML_header;
	
		
		displayMessage( $login_func_message);
		if( $_SESSION['user'] > 0){
				echo $HTML_menu;
			
			echo "<div id=main_box>";
			
				switch($_GET['category']){
				
					case 1: 
						include_once("adminfiles/menuMaker.php");
					break;
					
					case 2:
						
						include_once("adminfiles/texty.php");
					break;
					
					case 3:
						
						include_once("adminfiles/galeria.php");
					break;
					default:
					echo $HTML_main_page;
					break;
				
				}
				
			echo"</div>";
		
				
			
		
		}else{
			echo $HTML_login_form;
		}
		
		// tutaj będzie swith z gethem wyświetlający różne opcje pod edycji
		
		
		//echo md5("rosa#2mama".$super_secret_hash_padding);

?>