<?php

// Je crée PDO
require 'inc/db.php';

// Je recupere le ses_id via GET

if (!empty($_GET['stu_id'])) {
	$studentId = $_GET['stu_id'];

	$sql = '
		SELECT ses_id, stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
		FROM student
		LEFT OUTER JOIN country ON country.cou_id = student.cou_id
		LEFT OUTER JOIN city ON city.cit_id = student.cit_id
		LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
		WHERE stu_id = :etudiantInfo
		';

	$pdoStatement = $pdo->prepare($sql);
	//Je donne la valeur au parametre  de requete
	$pdoStatement->bindValue(':etudiantInfo', $studentId, PDO::PARAM_INT);

	// si erreur
	if ($pdoStatement -> execute() ===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement -> rowCount() > 0) {
		$etudiantInfo = $pdoStatement->fetch();
	}
}

$maDateFromDb = $etudiantInfo ['birthdate'];
$jour = intval($maDateFromDb[8].$maDateFromDb[9]);
$mois = intval($maDateFromDb[5].$maDateFromDb[6]);

// Inclut automatiquement tous les packages de Composer
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();

try {
  $zodiacSign = $calculator->calculate($jour, $mois);

} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}

$traductionFr = array(
'aries'			=> 'bélier',
'taurus' 		=> 'taureau',
'gemini' 		=> 'gemeaux',
'cancer' 		=> 'cancer',
'leo' 			=> 'lion',
'virgo' 		=> 'vierge',
'libra' 		=> 'balance',
'scorpio' 		=> 'scorpion',
'sagittarius'	=> 'sagitaire',
'capricorn' 	=> 'capricorn',
'aquarius' 		=> 'verseau',
'pisces' 		=> 'poisson',
);

require 'inc/header.php';
require 'inc/student_view.php';
require 'inc/footer.php';