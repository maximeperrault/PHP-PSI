
<?php
 
	if(isset($_POST['modification'])) {
	

		$sql1 = "SELECT * FROM inscription WHERE pseudo=:pseudo";
		$sql1 = $bdd->prepare($sql1);
		$sql1 -> execute(array('pseudo'=>$_SESSION['pseudo']));
		$resultat = $sql1->fetch();
		
		if($resultat['langue']==NULL AND $resultat['plat_prefere']==NULL AND $resultat['fumeur']==NULL AND $resultat['animal']==NULL AND $resultat['loisir']==NULL ) {

             $rqt = "UPDATE inscription SET langue = :langue, plat_prefere = :plat_prefere, fumeur=:fumeur,animal = :animal, loisir=:loisir WHERE pseudo = :pseudo";
             $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('langue' => $_POST['langue'],'plat_prefere' => $_POST['plat_prefere'],'fumeur'=> $_POST['fumeur'],'animal' => $_POST['animal'],'loisir' => $_POST['loisir'],'pseudo'=>$resultat['pseudo']));
			 $rqt->closeCursor();
		 }
		 
		
		if($_POST['langue']!=NULL OR $_POST['plat_prefere']!=NULL OR $_POST['tel']!=NULL OR $_POST['ville']!=NULL OR $_POST['mail']!=NULL OR $_POST['statut']!=NULL OR $_POST['fumeur']!=NULL OR $_POST['animal']!=NULL OR $_POST['loisir']!=NULL) {

		
		if(isset($_POST['langue']) AND $_POST['langue']!=NULL){
			 $rqt = "UPDATE inscription SET langue = :langue WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('langue'=>$_POST['langue'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }

		if(isset($_POST['plat_prefere']) AND $_POST['plat_prefere']!=NULL){
			 $rqt = "UPDATE inscription SET plat_prefere = :plat_prefere WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('plat_prefere'=>$_POST['plat_prefere'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }

		if(isset($_POST['tel']) AND $_POST['tel']!=NULL){
			 $rqt = "UPDATE inscription SET tel = :tel WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('tel'=>$_POST['tel'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }
		if(isset($_POST['statut']) AND $_POST['statut']!=NULL){
			 $rqt = "UPDATE inscription SET statut = :statut WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('statut'=>$_POST['statut'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }

		if(isset($_POST['ville']) AND $_POST['ville']!=NULL){
			 $rqt = "UPDATE inscription SET ville = :ville WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('ville'=>$_POST['ville'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }

		if(isset($_POST['mail']) AND $_POST['mail']!=NULL){
			 $rqt = "UPDATE inscription SET mail = :mail WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('mail'=>$_POST['mail'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }

		if(isset($_POST['fumeur']) AND $_POST['fumeur']!=NULL){
			 $rqt = "UPDATE inscription SET fumeur = :fumeur WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('fumeur'=>$_POST['fumeur'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }			 

		if(isset($_POST['animal']) AND $_POST['animal']!=NULL){
			 $rqt = "UPDATE inscription SET animal = :animal WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('animal'=>$_POST['animal'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			 }

		if(isset($_POST['loisir']) AND $_POST['loisir']!=NULL){
			 $rqt = "UPDATE inscription SET loisir = :loisir WHERE pseudo = :pseudo";
			 $rqt = $bdd->prepare($rqt);
			 $rqt->execute(array('loisir'=>$_POST['loisir'],'pseudo'=>$_SESSION['pseudo']));
			 $rqt->closeCursor();
			}
									   
		}
			 		 $sql1->closeCursor();
			 }
		 if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { 
		$sql2 = "SELECT * FROM inscription WHERE pseudo=:pseudo";
		$sql2 = $bdd->prepare($sql2);
		$sql2 -> execute(array('pseudo'=>$_SESSION['pseudo']));
		$resultat2 = $sql2->fetch();
		 
		

				$_SESSION['ville'] = $resultat2['ville'];
				$_SESSION["tel"] = $resultat2["tel"];
                $_SESSION["mail"] = $resultat2["mail"];
				$_SESSION["statut"] = $resultat2["statut"];
				
				if(isset($resultat2['langue'])) {
				$_SESSION['langue'] = $resultat2['langue']; }
				if(isset($resultat2['fumeur'])) {
                $_SESSION["fumeur"] = $resultat2["fumeur"]; }
				if(isset($resultat2['animal'])){
				$_SESSION["animal"] = $resultat2["animal"]; }
				if(isset($resultat2['loisir'])) {
				$_SESSION["loisir"] = $resultat2["loisir"]; }
				if(isset($resultat2['plat_prefere'])) {
				$_SESSION["plat_prefere"] = $resultat2["plat_prefere"]; }
				
		 $sql2->closeCursor();

				
}
				
				
		 ?>
		 