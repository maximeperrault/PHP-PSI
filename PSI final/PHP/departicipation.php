<?php 

	if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']) AND ($_SESSION['statut']=='invite' OR $_SESSION['statut']=='hote et invite')) {
		
		if(isset($_POST['departicipation'])) {
		// on incrémente le nombre le place 
		$sql3 = "UPDATE menu SET nbplaces_menu = nbplaces_menu + 1 WHERE id_menu = :id_menu";
		$sql3 = $bdd->prepare($sql3);
		$sql3->execute(array('id_menu'=>$resultat['id_menu']));	
	
		//on prend l'id_menu
		$sql4="SELECT id_menu from menu WHERE id_menu=:id_menu";
		$sql4=$bdd->prepare($sql4);
		$sql4->execute(array('id_menu'=>$resultat['id_menu']));
		$id_menu1=$sql4->fetch();
		
		// on efface la ligne d'information correspondante
		$sql5 = "DELETE FROM participant WHERE id_repas=:id_repas AND pseudo_participant=:pseudo_participant AND mail_participant=:mail_participant";
		$sql5 = $bdd->prepare($sql5);
		$sql5->execute(array('id_repas'=>$id_menu1['id_menu'],'pseudo_participant'=>$_SESSION['pseudo'],'mail_participant'=>$_SESSION['mail']));
		
		}
	}
	?>