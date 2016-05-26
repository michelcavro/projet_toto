<?php

// Je crée PDO
require 'inc/db.php';

// Je recupere le ses_id via GET
if (!empty($_GET['ses_id'])) {
	$sessionId = intval($_GET['ses_id']); // Type? int

	if (!empty($_GET['nbPerPage'])) {
		$nbPerPage = intval($_GET['nbPerPage']);
	}

	//Nombre d'étudiants par page
	$nbPerPage = 4;
	$currentOffset = 0;
	if (array_key_exists('offset',$_GET)) {
		$currentOffset = intval($_GET['offset']);
	}
	if (array_key_exists('nbPerPage',$_GET)) {
		$nbPerPage = intval($_GET['nbPerPage']);
	}

	$sql = '
		SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
		FROM student
		LEFT OUTER JOIN country ON country.cou_id = student.cou_id
		LEFT OUTER JOIN city ON city.cit_id = student.cit_id
		LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
		WHERE ses_id = :sessionIbrahima

		LIMIT :offset,:nbPerPage
		';

	$pdoStatement = $pdo->prepare($sql);
	
	//Je donne la valeur au parametre  de requete
	$pdoStatement->bindValue(':sessionIbrahima', $sessionId, PDO::PARAM_INT);
	$pdoStatement->bindValue(':nbPerPage', $nbPerPage, PDO::PARAM_INT);
	$pdoStatement->bindValue(':offset', $currentOffset, PDO::PARAM_INT);

	// si erreur
	if ($pdoStatement -> execute() ===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$etudiantListe = $pdoStatement->fetchAll();
	}
}

//j'affiche ma page
require 'inc/header.php';
require 'inc/list_view.php';
require 'inc/footer.php';