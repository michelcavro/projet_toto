<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>New students</title>
	</head>
	<body>
		<pre>
			<?php
			require 'students_session2.php';
			require '../inc/db.php';

			//écrire la requête préparée "INSERT INTO" qui va insérer le premier étudiant du tableau $studentsList[0], dans la base de données.

			$newStudent = $pdo->prepare("INSERT INTO student (ses_id, stu_name, stu_firstname, stu_email, stu_birthdate, stu_sex, stu_with_experience, stu_is_leader) VALUES (:session, :name, :firstname, :email, :birthdate, :sex, :with_experience, :is_leader)");

			// écrire la requête préparée "SELECT" qui va chercher toutes les lignes de la table "student" dont l'email est celui du premier du tableau $studentsList[0]

			$mailStudent = $pdo->prepare("SELECT stu_email FROM student");
			$mailStudent->execute();
			$existStudent = $mailStudent->fetchAll();
			//print_r($existStudent);


			$finalStudent = array();
			for ($i=0; $i < sizeof($existStudent); $i++) { 
				$finalStudent[$i] = $existStudent[$i][0];
			}
			//print_r($finalStudent);

			for ($j=0; $j < sizeof($studentsList); $j++) {

				//Boucle FOR pour renseigner le nom des variables
				$name = $studentsList[$j]['name'];
				$firstname = $studentsList[$j]['firstname'];
				$email = $studentsList[$j]['email'];
				$birthdate = $studentsList[$j]['birthdate'];
				$sex = $studentsList[$j]['sex'];
				$with_experience = $studentsList[$j]['with_experience'];
				$is_leader = $studentsList[$j]['is_leader'];

				//j'initialise une variable $emailExist à TRUE
				$emailExist = false;

				if(in_array($studentsList[$j]['email'], $finalStudent)){
					//si on trouve un email semblable notre variable devient true, donc on insert pas cette requête dans la BD
					echo "etudiant existant: pas d'insertion!<br />";
				}
				else{
					$emailExist = true;
				}
				// si l'email n'existe pas on insere les données dans la boucle
				if($emailExist == true){

				$newStudent->bindValue(':name',$name);
				$newStudent->bindValue(':firstname',$firstname);
				$newStudent->bindValue(':email',$email);
				$newStudent->bindValue(':birthdate',$birthdate);
				$newStudent->bindValue(':sex',$sex);
				$newStudent->bindValue(':with_experience',$with_experience, PDO::PARAM_INT);
				$newStudent->bindValue(':is_leader',$is_leader, PDO::PARAM_INT);
				$newStudent->bindValue(':session',2, PDO::PARAM_INT);
				
				$newStudent->execute();
				echo "nouvel etudiant inséré<br />";
				}
			}
			?>
		</pre>
	</body>
</html>