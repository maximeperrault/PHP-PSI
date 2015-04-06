<?php 

	if(isset($_POST['connexion'])) {

	// $connexionOK = FALSE;
	// $error = FALSE;
	
	if($_POST['pseudo_connexion'] == NULL OR $_POST['mdp_connexion'] == NULL) {
	
	$error = TRUE;
	$errorMSG = "Veuillez remplir tout les champs s'il vous plaît.";
	}
		elseif(isset($_POST['pseudo_connexion']) AND isset($_POST['mdp_connexion'])) {
	
	$mdp_hachee= sha1($_POST['mdp_connexion']);
	
	$connexion = "SELECT * from inscription WHERE pseudo =:pseudo_connexion AND mdp=:mdp_connexion";
	$requete = $bdd->prepare($connexion);
	$requete->execute(array('pseudo_connexion'=>$_POST['pseudo_connexion'], 'mdp_connexion'=>$mdp_hachee));
	$result = $requete ->fetch();
	
			if(!$result) {
			
			// $error = TRUE;
			// $errorMSG="Le pseudo et le mot de passe ne correspondent pas.";
			$requete->closeCursor();
			}
				else {
				

					
				// $connexionOK=TRUE;
				// $connexionMSG="Connexion accomplie";
				
				$_SESSION['id']=$result['id'];
				$_SESSION['pseudo']=$_POST['pseudo_connexion'];
				$_SESSION["nom"] = $result["nom"];
                $_SESSION["prenom"] = $result["prenom"];
				$_SESSION["mail"] = $result["mail"];
				$_SESSION["ville"] = $result["ville"];
				$_SESSION["tel"] = $result["tel"];
				$_SESSION["mdp"] = $result["mdp"];
				$_SESSION["statut"] = $result["statut"];
				$requete->closeCursor();
						}
				}
	}
	
	?>