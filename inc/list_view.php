<form>
Affichage du nombre d'étudiants :
	<input type="hidden" name="ses_id" value="<?=$sessionId?>"></input>
	<select name="nbPerPage">
		<option value="1">1 par page</option>
		<option value="2">2 par page</option>
		<option value="3">3 par page</option>
		<option value="4">4 par page</option>
		<option value="5">5 par page</option>
		<option value="6">6 par page</option>
	</select>
	<input type="submit" value="OK"></input>
</form>

<h3>Liste des étudiants</h3>
<?php if (isset($etudiantListe) && sizeof($etudiantListe) > 0) : ?>
<table>
	<thead>
		<tr>
			<td>Nom</td>
			<td>Prénom</td>
			<td>Email</td>
			<td>Ville</td>
			<td>Nationalité</td>
			<td>Statut marital</td>
			<td>Date de naissance</td>
		</tr>
	</thead>
	<br />
	<tbody>
		<?php foreach ($etudiantListe as $currentEtudiant) : ?>
		<tr>
			<td><a href="student.php?stu_id=<?= $currentEtudiant['stu_id'] ?>"><?= $currentEtudiant['stu_name'] ?></a></td>
			<td><a href="student.php?stu_id=<?= $currentEtudiant['stu_id'] ?>"><?= $currentEtudiant['stu_firstname'] ?></a></td>
			<td><?= $currentEtudiant['stu_email'] ?></td>
			<td><?= $currentEtudiant['cit_name'] ?></td>
			<td><?= $currentEtudiant['cou_name'] ?></td>
			<td><?= $currentEtudiant['mar_name'] ?></td>
			<td><?= $currentEtudiant['birthdate'] ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
<?php if ($currentOffset > 0) :?>
<button>
	<a href="list.php?ses_id=<?= $sessionId ?>&offset=<?= ($currentOffset-$nbPerPage)?>">précédent</a>
</button>
<?php endif; ?>
<button>
	<a href="list.php?ses_id=<?= $sessionId ?>&offset=<?= ($currentOffset+$nbPerPage)?>">suivant</a>
</button>
<br />
<?php else :?>
	aucun étudiant
<?php endif; ?>
<br />
<button>
	<a href="index.php">Retour à la liste des sessions</a>
</button>