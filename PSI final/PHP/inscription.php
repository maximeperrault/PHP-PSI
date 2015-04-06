<?php


// On met les variables utilisé dans le code PHP à FALSE (C'est-à-dire les désactiver pour le moment).
$error = FALSE;
$registerOK = FALSE;

    // On regarde si l'utilisateur est bien passé par le module d'inscription
    if(isset($_POST["submit"])){
	

        // On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
        if($_POST["nom"] == NULL OR $_POST["prenom"] == NULL OR $_POST["pseudo"] == NULL OR $_POST["ville"] == NULL OR $_POST["tel"] == NULL OR $_POST["mail"] == NULL OR $_POST["mdp"] == NULL OR $_POST["mdp2"] == NULL){
            
            // On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
            $error = TRUE;
            
            // On écrit le message à afficher :
            $errorMSG = "Tout les champs doivent être remplis !";
                
        }
		// on verifie la validité de l'adresse mail
		if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
			
        // Sinon, si les deux mots de passes correspondent :
        if($_POST["mdp"] == $_POST["mdp2"]){
            
            // On regarde si le mot de passe et le pseudo ne sont pas les mêmes
            if($_POST["pseudo"] != $_POST["mdp"]){
                
                // Si c'est bon on regarde dans la base de donnée si le pseudo est déjà utilisé :
                $sql = "SELECT pseudo, mail FROM inscription WHERE pseudo = :pseudo OR mail = :mail";
                $sql = $bdd->prepare($sql);
				$sql->execute(array('pseudo' => $_POST["pseudo"],'mail' => $_POST["mail"]));
				
				
            // On regarde combien de fois le pseudo a été utilisé
            $reponse = $sql->fetch();
			

               // Si $sql est égal à 0 (c'est-à-dire qu'il n'y a pas de pseudo ni de adresse mail avec la valeur tapé par l'utilisateur) donc ok
               if($reponse == 0){
			   
			  
               
                  // Si tout va bien on regarde si le mot de passe et le pseudo n'excède pas 30 caractères.
                  if(strlen($_POST["mdp"] < 30)){
                  
                     if(strlen($_POST["pseudo"] <  30)){
					 
						  // Hachage du mot de passe 
					
                        $mdp_hache=sha1($_POST['mdp']);
							
                           // Si tout ce passe correctement, on peut maintenant l'inscrire dans la base de données :
                           $sql1 = "INSERT INTO inscription (nom,prenom,pseudo,ville,tel,mail,mdp,statut,date_inscription,IP) VALUES (:nom,:prenom,:pseudo,:ville,:tel,:mail,:mdp,:statut,:date_inscription,:ip_inscription)";
                           $sql1 = $bdd->prepare($sql1);
						   $sql1->execute(array('nom' => $_POST["nom"],'prenom' => $_POST['prenom'],'pseudo'=> $_POST['pseudo'],'ville' => $_POST['ville'],'tel' => $_POST['tel'],'mail' => $_POST['mail'], 'mdp' => $mdp_hache,'statut' => $_POST['statut'],'date_inscription' => date('Y-m-d'),'ip_inscription' => $ip));

                           
                           // Si la requête s'est bien effectué :
                           if($sql1){
                           
                              // On met la variable $registerOK à TRUE pour que l'inscription soit finalisé
                              $registerOK = TRUE;
                              // On l'affiche un message pour le dire que l'inscription c'est bien déroulé :
                              $registerMSG = "inscription réussie";
                              
		$sql2 = "SELECT * FROM inscription WHERE pseudo=:pseudo";
		$sql2 = $bdd->prepare($sql2);
		$sql2 -> execute(array('pseudo'=>$_POST['pseudo']));
		$resultat2 = $sql2->fetch();
                              // On met des variables de session pour stocker le pseudo et le mot de passe etc...:
							  
							  $_SESSION["id"] = $resultat2["id"];
                              $_SESSION["nom"] = $_POST["nom"];
                              $_SESSION["prenom"] = $_POST["prenom"];
							  $_SESSION["pseudo"] = $_POST["pseudo"];
							  $_SESSION["mail"] = $_POST["mail"];
							  $_SESSION["ville"] = $_POST["ville"];
							  $_SESSION["tel"] = $_POST["tel"];
							  $_SESSION["mdp"] = $_POST["mdp"];
							  $_SESSION["statut"] = $_POST["statut"];
                              
                              // maintenant on peut utiliser les variables de session comme ceci echo 'Bonjour'.$_SESSION["pseudo"];
						   $sql2->closeCursor();
                           $sql1->closeCursor();
						   $sql->closeCursor();
                           }
                           
                           // Sinon on l'affiche un message d'erreur (généralement pour vous quand vous testez vos scripts PHP)
                           else{
                           
                              $error = TRUE;
                              
                              $errorMSG = "Erreur dans l'inscription, veuillez réessayer...<br/>".$sql."<br/>";
                           
                           }
                        
                        
                        }
                        // Si le pseudo est trop long
                        else{
                        
                           $error = TRUE;
                           
                           $errorMSG = "Votre surnom ne doit pas dépasser30 caractères !";
                           
                        }

						
                     
                     
                  
                  }
                  
                  // Si le mot de passe est trop long
                  else{
                  
                     $error = TRUE;
                     
                     $errorMSG = "Votre mot de passe ne doit pas dépasser 30 caractères !";

                  }               		   
			   
               }
               
               // le pseudo est déjà utilisé
               else{
               
                  $error = TRUE;
                  
                  $errorMSG = "le pseudo et/ou l'adresse mail est déja utilisé !";
		
               }
            }
            
            // Sinon on fait savoir à l'utilisateur qu'il doit changer le mot de passe ou le pseudo
            else{
                
                $error = TRUE;
                
                $errorMSG = "le pseudo et le mot de passe doivent êtres différents !";
                
            }
            
        }
      
      // Sinon si les deux mots de passes sont différents :      
      elseif($_POST["mdp"] != $_POST["mdp2"]){
      
         $error = TRUE;
         
         $errorMSG = "Les deux mots de passes sont différents !";

      }
      
	  // si l'adresse mail n'est pas valide
        } else {

			$error = TRUE;
			
			$errorMSG = "l'adresse mail n'est pas valide";
        }
    }

?>
