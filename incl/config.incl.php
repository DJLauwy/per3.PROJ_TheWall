<?php
	
	session_start();
	
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'thewall';

	try {
	    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
	    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Verbinding is gemaakt!";
		} catch(PDOException $e) {
		    echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
		}

?>