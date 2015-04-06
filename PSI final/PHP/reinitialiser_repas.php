<?php

 if(isset($_GET['reinitialiser'])) {
 
 $sql_recup="SELECT id_menu FROM menu WHERE ";
		// on remet le nombre de places au nombre initial
		$sql_reini="UPDATE menu SET nbplaces_menu = nbplaces_initial_menu WHERE id_menu=:id_menu_reinitialise";
		$sql_reini=$bdd->prepare($sql_reini);
		$sql_reini->execute(array('id_menu_reinitialise' => $_GET['id_menu']));
		$sql_reini->closeCursor();
		
		// on supprime tout les participants correspondant à l'id
		$sql_particip = "DELETE FROM participant WHERE id_repas=:id_repas";
		$sql_particip = $bdd->prepare($sql_particip);
		$sql_particip->execute(array('id_repas'=>$_GET['id_menu']));
		$sql_particip->closeCursor();
		
 }
		
 ?>