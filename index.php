<?php

// Je crée PDO
require 'inc/db.php';

// j'ecris ma requette
$sql = '
	SELECT ses_opening, ses_ending, ses_id
	FROM session
';

$pdoStatement = $pdo->query($sql);

//Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}

// Sinon
else {
	//Je recupere toutes les données
	$sessionList = $pdoStatement->fetchAll();
}

// Requette nb étudiants par ville
$sql = '
	SELECT COUNT(*) AS nb, city.cit_name
	FROM city
	INNER JOIN student ON student.cit_id = city.cit_id
	GROUP BY cit_name
';

$pdoStatement2 = $pdo->query($sql);

//Si erreur
if ($pdoStatement2 === false) {
	print_r($pdo->errorInfo());
}

// Sinon
else {
	//Je recupere toutes les données
	$stuPerCity = $pdoStatement2->fetchAll();
}

//J'affiche ma page
require 'inc/header.php';
require 'inc/index_view.php';
require 'inc/footer.php';
?>

<button>
	<a href="add.php">Ajouter un élève</a>
</button>