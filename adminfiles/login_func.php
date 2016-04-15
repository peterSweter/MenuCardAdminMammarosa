<?php

	$login_func_message="";
	$query = mysql_query("SELECT * FROM mammarosa_login")or die ("błąd bazy danych");
	$login_data = mysql_fetch_array($query);

	function loginTest ($login, $password){
			global $super_secret_hash_padding;
			global $login_data;
		if($login == $login_data['login'] && md5($password.$super_secret_hash_padding) == $login_data['password']){
		
			$current_time = time();
			$current_ip = $_SERVER['REMOTE_ADDR'];
			$current_id = session_id();
			$_SESSION['user']=1;
			
			mysql_query("DELETE  FROM mammarosa_session WHERE user_id = 1")or die ("błąd bazy danych 2 ");
			mysql_query("INSERT INTO mammarosa_session (time, ip, id_session, user_id) VALUES ( '$current_time', '$current_ip', '$current_id', 1) ")or die("błąd bazy danych");
		
			return true;
		
		}else{
			
			return false;
				
		}
		
		
	}
	
	function loginSessionTest ($user_id){
	
		$query = mysql_query("SELECT * FROM mammarosa_session WHERE user_id = '$user_id'")or die ("błąd bazy danych 1 ");
		$session_data = mysql_fetch_array($query); time();
		$current_time = time();
	
		if(time() - $session_data['time'] > 3600/2){
			mysql_query("DELETE  FROM mammarosa_session WHERE user_id = '$user_id'")or die ("błąd bazy danych 2 ");
			$_SESSION['user']=0;
			$login_func_message .= "sesja wygasła <br/>";
			return false;
		}else{
			mysql_query("UPDATE   mammarosa_session SET time = '$current_time' WHERE user_id = '$user_id' ")or die ("błąd bazy danych 2 ");
		}
		
		if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']){
			return false;
		}
		
		return true;
	}
	
	
	
	session_start();
	
	if(!isset($_SESSION['user']))
	{
		$_SESSION['user'] = 0;
		session_regenerate_id();
		$_SESSION['inicjuj'] = true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	}

	if($_SESSION['user'] > 0){
		loginSessionTest($login_data['id']);
	}elseif(isSet($_POST['isPosted']) && $_POST['isPosted']==1){ ;
		if(loginTest($_POST['login'], $_POST['password'])){
			$login_func_message .= " zalogowano pomyślnie";
		}else{
			$login_func_message .= " błędne dane logowania";
		}
	}
		
?>