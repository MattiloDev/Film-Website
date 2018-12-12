<?
/**
 * database.php
 * 
 * Responsible for establishing and configuring the connection to the database
 * 
 * @category php file
 * @author Matthew Hutchings
 * 
 * @var $db, PDO, object to be used by other files to connect to the database and run queries on it
 */
?>

<?php

	//Creates a new PDO connection to the database using the database connection password
	$db = new PDO('mysql:host=comp2203.ecs.soton.ac.uk; dbname=comp2203-cw-1819','comp2203-cw-1819', '788FPR2R5HYm1b3Ur1737ZyfD');
	
	//Configs $db to return information from the database as an Object
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	PDO::MYSQL_ATTR_USE_BUFFERED_QUERY 
														
?>




