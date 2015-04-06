<?php 

	if(isset($_SESSION['pseudo']) AND isset($_SESSION['id']) AND ($_SESSION['statut']=='invite' OR $_SESSION['statut']=='hote et invite')) {
		
		if(isset($_POST['participation'])) {
		
		$sql = "UPDATE menu SET nbplaces_menu = CASE WHEN nbplaces_menu != 0 THEN nbplaces_menu - 1 ELSE nbplaces_menu END WHERE id_menu = :id_menu";
		$sql = $bdd->prepare($sql);
		$sql->execute(array('id_menu'=>$resultat['id_menu']));	
	
		$sql2="SELECT id_menu from menu WHERE id_menu=:id_menu";
		$sql2=$bdd->prepare($sql2);
		$sql2->execute(array('id_menu'=>$resultat['id_menu']));
		$id_menu=$sql2->fetch();
		
		
		$sql1 = "INSERT INTO participant (id_repas,pseudo_participant,mail_participant) VALUES (:id_repas,:pseudo_participant,:mail_participant)";
		$sql1 = $bdd->prepare($sql1);
		$sql1->execute(array('id_repas'=>$id_menu['id_menu'],'pseudo_participant'=>$_SESSION['pseudo'],'mail_participant'=>$_SESSION['mail']));
		
		}
	}
	?>