	<?php
	
$query_search=""
$query_search=$bdd->prepare($query_search);
$query_search->execute(array('recherche'=>$_POST['recherche']));
					
					?>