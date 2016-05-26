<h3>Info de l'étudiants</h3>
		
<ul>
	<li>NOM : <?= $etudiantInfo ['stu_name'] ?></li>
	<li>PRENOM : <?= $etudiantInfo ['stu_firstname'] ?></li>
	<li>Email : <?= $etudiantInfo ['stu_email'] ?></li>
	<li>VILLE : <?= $etudiantInfo ['cit_name'] ?></li>
	<li>PAYS : <?= $etudiantInfo ['cou_name'] ?></li>
	<li>STATUT FAMILIAL : <?= $etudiantInfo ['mar_name'] ?></li>
	<li>NE LE : <?= $etudiantInfo ['birthdate'] ?></li>
	<li>ASTRO SIGNE : <?= $traductionFr[$zodiacSign] ?></li>
</ul>
<br />

<button>
	<a href="list.php?ses_id=<?= $etudiantInfo['ses_id'] ?>">Retour à la liste des élèves</a>
</button>