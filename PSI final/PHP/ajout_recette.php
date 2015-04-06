<?php

			$error=FALSE;
			$register=FALSE;
//si le bouton enregistrer est pressé
	if(isset($_POST["ajout_recette"])) {
	
	//si l'utilisateur n'a rien fait
				if($_POST['type'] == 'plat' AND $_POST['difficulte'] == 'difficulte' AND $_POST['titre'] == NULL AND $_POST['preparation'] == NULL AND $_POST['cout'] == NULL) {
				
					$error = TRUE;
					
	//si il l'a remplie au moins un peu
			} else {
				
				$sql = "INSERT INTO recette (titre_recette,type_recette,difficulte_recette,commentaire_recette,temps_recette,temps_cuisson_recette,cout_recette,date_ajoute_recette,createur_recette) VALUES (:titre_recette,:type_recette,:difficulte_recette,:commentaire_recette,:temps_recette,:temps_cuisson_recette,:cout_recette,:date_ajoute_recette,:createur_recette)";
                $sql = $bdd->prepare($sql);
				$sql->execute(array('titre_recette' => $_POST['titre'],'type_recette'=>$_POST['type'],'difficulte_recette'=> $_POST['difficulte'],'commentaire_recette'=> $_POST['commentaire'],'temps_recette' => $_POST['preparation'],'temps_cuisson_recette' => $_POST['cuisson'],'cout_recette' => $_POST['cout'], 'date_ajoute_recette' => date('Y-m-d'),'createur_recette'=>$_SESSION['pseudo']));
                           
				$register=TRUE;
				
				$sql->closeCursor();
				
				}
						

				if(isset($_POST['ing1']) AND $_POST['ing1'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing1=:ing1 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing1'=>$_POST['ing1'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing2']) AND $_POST['ing2'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing2=:ing2 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing2'=>$_POST['ing2'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing3']) AND $_POST['ing3'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing3=:ing3 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing3'=>$_POST['ing3'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing4']) AND $_POST['ing4'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing4=:ing4 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing4'=>$_POST['ing4'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing5']) AND $_POST['ing5'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing5=:ing5 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing5'=>$_POST['ing5'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing6']) AND $_POST['ing6'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing6=:ing6 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing6'=>$_POST['ing6'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing7']) AND $_POST['ing7'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing7=:ing7 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing7'=>$_POST['ing7'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}
				if(isset($_POST['ing8']) AND $_POST['ing8'] != NULL) { 
				
				$rqt = "UPDATE recette SET ing8=:ing8 WHERE titre_recette=:titre_recette";
				$rqt = $bdd->prepare($rqt);
				$rqt->execute(array('ing8'=>$_POST['ing8'],'titre_recette'=>$_POST['titre']));
				$rqt->closeCursor();
				
				}

			// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 5000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['image']['tmp_name'], 'Images_recette/' . basename($_FILES['image']['name']));
						$destination = 'Images_recette/	' .$_FILES['image']['name'];
                        
						$requete = "UPDATE recette SET photo_recette=:image WHERE titre_recette=:titre";
						$requete = $bdd->prepare($requete);
						$requete->execute(array('image'=>$destination,'titre'=>$_POST['titre']));
						$requete->closeCursor();
                }
        }
}
		
	}
?>