<?php

	$db = new PDO('mysql:host=comp2203.ecs.soton.ac.uk; dbname=comp2203-cw-1819','comp2203-cw-1819', '788FPR2R5HYm1b3Ur1737ZyfD');
	
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
														
?>




