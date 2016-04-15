<?php

	// plik z danymi do łączenia się z bazą danych #jolo

   $db_user = '*classiefied*';
    $db_host = '*classiefied*';
    $db_password = '*classiefied*';
    $db_base = '*classiefied*';

    if(!mysql_connect($db_host,$db_user,$db_password)){
       echo "Błąd bazy danych1 ";
    }

    if(!mysql_select_db($db_base)){
        echo "Błąd bazy danych 2";
    }
   mysql_set_charset("utf8");
	mysql_query('SET NAMES \'utf8\'');
     $super_secret_hash_padding = '*classiefied*';



?>
