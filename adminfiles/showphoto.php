<?php 
header("Content-type: image/jpg;");
	include_once("db_connect.php");
	 $result = mysql_query("SELECT zdjecie FROM mammarosa_zdjecia WHERE id=".$_GET['id']);
	  if (mysql_num_rows($result) != 0)
        {
                $row = mysql_fetch_assoc($result);
                echo base64_decode($row['zdjecie']);
        }
?>
