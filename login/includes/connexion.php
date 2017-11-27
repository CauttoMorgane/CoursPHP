<?php

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=coursPHP', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

?>