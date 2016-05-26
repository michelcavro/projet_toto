<?php
// Je me connect à ma DB

		// Se connecter à la DB
		$dsn = 'mysql:host=localhost;dbname=formation;charset=utf8';
		$pdo = new PDO($dsn, 'root', 'images');