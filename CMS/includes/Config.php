<?php

	ob_start();
	session_start();

	//database credentials
	define( 'DBHOST', 'localhost' );
	define( 'DBUSER', 's1909319_pcms' );
	define( 'DBPASS', '5uYhw01_' );
	define( 'DBNAME', 's1909319_pcms' );
    
    //create a PDO mysql
	$db = new PDO( "mysql:host=" . DBHOST . ";port=8889;dbname=" . DBNAME, DBUSER, DBPASS);
	
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	//set timezone
	date_default_timezone_set('Europe/London');

?>