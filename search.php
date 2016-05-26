<?php
// Je crée PDO
require 'inc/db.php';

$currentOffset = 0;

if (!empty($_GET['search'])) {
	$searchRes = $_GET['search'];

	$sql = '
		SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
		FROM student
		LEFT OUTER JOIN country ON country.cou_id = student.cou_id
		LEFT OUTER JOIN city ON city.cit_id = student.cit_id
		LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id

		WHERE stu_name LIKE :nom
		OR stu_firstname LIKE :nom
		OR cou_name LIKE :nom
		OR cit_name LIKE :nom
		OR stu_email LIKE :nom
	';

	$pdoStatement = $pdo->prepare($sql);
	//Je donne la valeur au parametre  de requete
	$pdoStatement->bindValue(':nom', '%'.$searchRes.'%');

	// si erreur
	if ($pdoStatement->execute() ===false) {
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