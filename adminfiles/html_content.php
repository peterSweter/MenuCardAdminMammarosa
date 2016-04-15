<?php
	
	$HTML_header = <<< EOHEADER
	<!doctype html>
	<html>
	<head>

		<meta charset="UTF-8">
		<title>mammarosa Panel administracyjny</title>
		<script src="adminfiles/jquery.js"></script>
		<script src="adminfiles/jquery-ui-1.10.4.custom.min.js"></script>
		 <link rel="stylesheet" href="adminfiles/jquery-ui-1.10.4.custom.min.css">
		<script src="adminfiles/script.js"></script>
		<style type="text/css">
			
			
			
			#title{
				height:120px;
				width:920px;
				padding:20px 20px;
				text-align: center;
				background-color:#99FF66;
				margin: 0px auto;
				margin-bottom:10px;
			}
			
			#login_form{
				height:200px;
				width:920px;
				text-align:center;
				background-color:#FF9933;
				margin: 0 auto;
				padding:20px;
				font-size:18px;
			}
			
			#main_box{
				width:920px;
				min-height:400px;
				background-color:#FFFF99;
				padding:20px;
				text-align:center;
				margin:0 auto;
			}
			#menu{
				width:940px;
				padding:10px;
				height:40px;
				margin:0 auto;
				padding-top:0px;
				font-size:16px;
				font-weight:bold;
				
			}
			 #menu ul, #menu ul li {
				display: block;
				list-style: none;
				margin: 0;
				padding: 0;
			}

			#menu ul li {
				float: left;
				background-color:#33CCFF;
				height:40px;
			
				text-align:center;
				margin-right:5px;
				
			}
			
			#menu ul li a{
				display:block;
				background-color:#33CCFF;
				height:30px;
				padding:5px;
				text-align:center;
				padding-right:15px;
				padding-left:15px;
				text-decoration:none;
			}
			
			#menu ul li a:hover{
			
				background-color:#0099CC;
				height:30px;
				padding:5px;
				text-align:center;
			padding-right:15px;
				padding-left:15px;
				text-decoration:none;
			}
			
			.category_record{
				width:880px;
				height:30px;
				padding:4px;
				background-color:#99CC33;
				margin:0 auto;
				margin-bottom:5px;
				font-size:18px;
				
			}
			.dish_record{
				width:880px;
				
				padding:4px;
				background-color:#CCFFCC;
				margin:0 auto;
				margin-bottom:5px;
				font-size:18px;
				
			}
			
			.menu_cros{
				width:30px;
				height:30px;
				background-image:url('adminfiles/img/cros.png');
				float:right;
				margin-right:5px;
			}
			.menu_edit{
				width:30px;
				height:30px;
				background-image:url('adminfiles/img/edit.png');
				float:right;
				margin-right:5px;
			}
			
			.admin_tools{
				width:300px;
				padding:10px;
				height:40px;

			}
			
			.plus{
				width:150px;
				height:30px;
				background-image:url('adminfiles/img/plus.png');
				background-repeat:no-repeat;
				float:right;
				margin-right:5px;
				text-align:right;
				background-color: #336633;
				cursor:pointer;
			}
			
			.save{
				width:90px;
				height:30px;
				background-image:url('adminfiles/img/save.png');
				background-repeat:no-repeat;
				float:right;
				margin-right:5px;
				text-align:right;
				background-color:#99CCFF;
				cursor:pointer;
			}
			
			.save2{
				width:90px;
				height:30px;
				background-image:url('adminfiles/img/save.png');
				background-repeat:no-repeat;
				float:right;
				margin-right:5px;
				text-align:right;
				background-color:#99CCFF;
				cursor:pointer;
			}
		</style>
	</head>
	<body>
		
			<div id="title">
				<h1> Panel administracyjny mammarosa.com.pl </h1>
			</div>
EOHEADER;

	$HTML_login_form = <<< EOLOGIN
		<div id="login_form">
			<form method="POST" action="adminindex.php">
				
				login: <input type="text" name="login"/> <br/> <br/>
				hasło: <input type="password" name="password"/> <br/><br/>
				<input type="hidden" name="isPosted" value="1"/>
				<input type="submit" value="login"/>
				
			</form>
		</div>
EOLOGIN;
	
	$HTML_main_page = <<< EOMPAGE
		<div style="width:600px;font-size:15px;margin:0 auto;">
			Witaj w panelu administracyjnym mammarosa.com.pl. 
			
			<h3> Instrukcja: </h3>
			
			<iframe src="//player.vimeo.com/video/93872076" width="500" height="485" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p><a href="http://vimeo.com/93872076">mammarosa.com.pl</a> from <a href="http://vimeo.com/user12915813">sponsor</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
			
		
			
			
		</div>
EOMPAGE;

	
	$HTML_menu = <<< EOMENU
		
		<div id="menu">
			
			<ul>
				<li><a href="adminindex.php"> Strona główna</a>  </li>
				<li><a href="adminindex.php?category=1"> karta dań </a></li>
				<li> <a href="adminindex.php?category=2">teksty na stronie </a></li>
				<li> <a href="adminindex.php?category=3">galeria </a></li>
			</ul>
			
		</div>
	
EOMENU;

	function displayMessage ($message){
		if($message =="" or $message = " " ) return;
		echo "<div style='width:940px; background-color:green; text-align:center; padding:20px;margin:0 auto;'>";
		echo $message;
		echo "</div>";
	}
?>