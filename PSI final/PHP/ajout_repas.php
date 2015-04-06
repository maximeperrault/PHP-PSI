<?php


			$error=FALSE;
			$register=FALSE;
//si le bouton enregistrer est pressé
	if(isset($_POST["ajout_repas"])) {
	
	//si l'utilisateur n'a rien fait
				if($_POST['genre'] == 'brunch' AND $_POST['date'] == NULL AND $_POST['nbpersonne'] == NULL AND $_POST['prix'] == NULL ) {
				
					$error = TRUE;
					
	//si il l'a remplie au moins un peu
			} 
			
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
                        move_uploaded_file($_FILES['image']['tmp_name'], 'Images_menu/' . basename($_FILES['image']['name']));
						$destination = 'Images_menu/	' .$_FILES['image']['name'];
                        
		// on insere les informations du menu dans la table menu
				$sql = "INSERT INTO menu (photo_menu,prix_menu,spe_menu,nbplaces_menu,nbplaces_initial_menu,description_menu,jour_menu,date_ajoute_menu,createur_menu) VALUES (:photo_menu,:prix_menu,:spe_menu,:nbplaces_menu,:nbplaces_initial_menu,:description_menu,:jour_menu,:date_ajoute_menu,:createur_menu)";
                $sql = $bdd->prepare($sql);
				$sql->execute(array('photo_menu'=>$destination,'prix_menu' => $_POST['prix'],'spe_menu'=>$_POST['genre'],'nbplaces_menu'=> $_POST['nbpersonne'],'nbplaces_initial_menu'=> $_POST['nbpersonne'],'description_menu'=>$_POST['description'],'jour_menu'=> $_POST['date'],'date_ajoute_menu' => date('Y-m-d'),'createur_menu'=>$_SESSION['pseudo']));
                           
				$register=TRUE;
				
				$sql->closeCursor();
				
				}
						
        }
}
		
	}
?>