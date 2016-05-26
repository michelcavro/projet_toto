<h3>Session à ESCH BELVAL</h3>
<!--Affichage des dates de sessions -->
<ul>
	<?php foreach ($sessionList as $key => $value) : ?>
	<li><a href="list.php?ses_id=<?= $value['ses_id'] ?>"> du <?= $value['ses_opening'] ?> au <?= $value['ses_ending'] ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>

<!--Affichage du nombre d'étudiants par ville -->
<ul>
	<?php foreach ($stuPerCity as $key => $value) : ?>
	<li><?= $value['cit_name'] ?> a <?= $value['nb'] ?> d'étudiant(s).
	</li>
	<?php endforeach; ?>
</ul>