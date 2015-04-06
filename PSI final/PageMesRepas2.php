<?php 

session_start();

// on se connecte à la base
	$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');
	
	include '/PHP/ajout_repas.php';

	include '/PHP/ip_visiteur.php';    
	
?>

<?php include '/PHP/connexion.php'; ?>

<?php include '/PHP/deconnexion.php'; ?>



<?php
// Si on est connecté
if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
// on selectionne tout les menus que j'ai créé
$rqt="SELECT * FROM menu WHERE createur_menu=:pseudo ";
$rqt=$bdd->prepare($rqt);
$rqt->execute(array('pseudo'=>$_SESSION['pseudo']));
 
}
// si on est connecté et invité 
		if(isset($_SESSION['id']) AND isset($_SESSION['pseudo']) AND ($_SESSION['statut']=='invite' OR $_SESSION['statut']=='hote et invite')) {
		
		 $rqt2="SELECT m.prix_menu,m.spe_menu,m.jour_menu,m.createur_menu FROM menu m
		 INNER JOIN participant p ON (p.pseudo_participant=:pseudo_participant AND p.mail_participant=:mail_participant)
		 WHERE m.id_menu=p.id_repas";
		 $rqt2=$bdd->prepare($rqt2);
		 $rqt2->execute(array('pseudo_participant'=>$_SESSION['pseudo'],'mail_participant'=>$_SESSION['mail']));
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleMesRepas.css" />
		<?php include '/PHP/javascript.php'; ?>
		<title> DîneChezTonVoisin.com </title>
	</head>
	
	<body>
	
		<div id="corps">

<?php include '/PHP/header.php'; ?>
		
		<section id="profil">
		<ul id="navigationMenu">
    <li>
	    <a class="home" href="PageProfil.php">
            <span>Mon Profil</span>
        </a>
    </li>
    
    <li>
    	<a class="about" href="PageMesRecettes.php">
            <span>Mes Recettes</span>
        </a>
    </li>
    
    <li>
	     <a class="services" href="PageMesRepas2.php">
            <span>Mes repas</span>
         </a>
    </li>
	</ul>

	</section>
	
	<?php //si on est connecté et hote
		if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
			if($_SESSION['statut']=='hote' OR $_SESSION['statut']=='hote et invite') { ?>	
	
	<section id="RepasHote">
		
		<div id="titre">
			<h1>Mes repas en tant qu'hôte</h1>
		</div>
		<div id="ajout_repas">
			<a href="#" data-width="400" data-rel="popup_repas" class="poplight" id="ajouter_repas">Ajouter un repas</a>
		</div>
		
			<div id="popup_repas" class="popup_block">
				<form id="repas"  method="post" enctype="multipart/form-data">
				<table>
				<?php if($error == TRUE) { ?>
				 <?php  echo "<p>Veuillez remplir tout les champs</p>"; } ?>
				<p>choisissez une photo</p>
				<input type="file" name="image" id="ajout_image"/>
					<tr>
					<td><label for="Date"></label></td>
					<td><img src="img/month1.png" alt="icone_date" id="icone_date"><input type="text" name="date" placeholder="AAAA-MM-JJ"/></td>
					
					<td><label for="Type"><select name="genre">
					<option value="brunch">Brunch</option>
					<option value="dejeuner">Déjeuner</option>
					<option value="diner">Dîner</option>
					</select></label></td></td>
					</tr>
				
					<tr>
					<td><label for="Convives"></label></td>
					<td><img src="img/user14.png" alt="icone_place" id="icone_place"><input type="text" name="nbpersonne" placeholder="Nombre de convives"/></td>
					
					<td><label for="Prix"></label></td>
					<td><img src="img/euro37.png" alt="icone_prix" id="icone_place"><input type="text" name="prix" placeholder="Prix"/></td>
					</tr>
				</table>
				
				<textarea name="description" rows="6" col="300" placeholder="Description du repas :"></textarea>
				
				<input type="submit" name="ajout_repas" value="Enregistrer" id="submit"/>
				</form>	
			</div>

		<div id="ficheMesRepas">

		<div id="carte_repas">
				<?php for($i=0;$i<$resultat=$rqt->fetch();$i++) { 
				
				?>
			<div class="repas">
			<div id="participant">
				<h2>Participants</h2>
				<?php 
				
				if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {

// On choisit tout les participants du repas
$rqt3="SELECT * FROM participant p
INNER JOIN menu m ON m.id_menu=:id_menu
WHERE p.id_repas=m.id_menu";
$rqt3=$bdd->prepare($rqt3);
$rqt3->execute(array('id_menu'=>$resultat['id_menu']));
}
// et on affiche le pseudo et le mail de chaque participant
				for($k=0;$k<$resultat3=$rqt3->fetch();$k++) { ?>
				<p><?php echo $resultat3['pseudo_participant']; ?></p>
				<p><?php echo $resultat3['mail_participant']; ?></p></a>
				<?php } ?>
			</div>
			<div id="profil">
			<?php

	include '/PHP/reinitialiser_repas.php'; 
 ?>

				<img src="img/Fond_hote.png" alt="photo_profil" id="photo_profil"> 
				<h2><?php echo $resultat['createur_menu']; ?></h2>
			</div>
				<img src="<?php echo $resultat['photo_menu']; ?>" alt="photo_table" id="photo_table">
			<div id="date">
				<img src="img/month1.png" alt="icone_date" id="icone_date">
				<h2><?php echo $resultat['jour_menu']; ?></h2>
			</div>
			<div id="lieu">
				<img src="img/home1.png" alt="icone_lieu" id="icone_lieu">
				<h2><?php echo $_SESSION['ville']; ?></h2>
			</div>
			<div id="nb_place">
				<img src="img/user14.png" alt="icone_place" id="icone_place">
				<h2><?php echo $resultat['nbplaces_menu']; ?> personnes restantes</h2>
			</div>
			<div id="prix_repas">
				<h2><?php echo $resultat['prix_menu']; ?>€/personne</h2>
			</div>
			<div id="modif_repas_bouton">
			<form method="post">			
			<a href="#" data-rel="modif_repas" class="poplight" id="modif">Modifier</a></div>
			</form>
			<a href="PageMesRepas2.php?reinitialiser&id_menu=<?php echo $resultat['id_menu'] ?>" id="reinitialiser">Réinitialiser les places</a>
			
			</div>
			<?php	} ?>
		</div>
		</div>
		
		<!--<div id="modif_repas" class="popup_block">
				<form id="repas" >
				<table>
				<caption>Remplissez les champs</caption>
				<p>choisissez une photo</p>
				<input type="file" name="image" id="ajout_image"/>
					<tr>
					<td><label for="Date"></label></td>
					<td><img src="img/month1.png" alt="icone_date" id="icone_date"><input type="text" name="date" placeholder="AAAA-MM-JJ"/></td>
					<td><label for="Lieu"></label></td>
					
					<td><label for="Type"><select name="type">
					<option value="plat">Plat</option>
					<option value="entree">Entrée</option>
					<option value="dessert">Dessert</option>
					</select></label></td></td>
					</tr>
				
					<tr>
					<td><label for="Convives"></label></td>
					<td><img src="img/user14.png" alt="icone_place" id="icone_place"><input type="text" name="nbpersonne" placeholder="Nombre de convives"/></td>
					<td><label for="Prix"></label></td>
					<td><input type="text" name="prix" placeholder="Prix"/></td>
					</tr>
				</table>
				
				<textarea name="description" rows="6" col="300" placeholder="Description du repas :"></textarea>
				
				<input type="submit" name="ajout_repas" value="Enregistrer" id="submit"/>
				</form>	
			</div>-->
		
	</section>
	<?php 
		}
	
	} ?>
	
		<?php 
		if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
			if($_SESSION['statut']=='invite' OR $_SESSION['statut']=='hote et invite') { 
				
			?>	
			

	<section id="RepasInvite">	
		<h1>Les repas auxquels je participe</h1>

		<?php
		// on affiche les repas auquels on participe
			for($j=0;$j<$resultat2=$rqt2->fetch();$j++) {
		?>
		
		
		<div><a href="#">
		<p><strong>La table de <?php echo $resultat2['createur_menu']; ?></strong></p>
		<p><?php echo $resultat2['jour_menu']." - ".$resultat2['spe_menu']." - ".$resultat2['prix_menu']." €"; ?><p/>
		</a></div>
		
		<?php } ?>
	</section>
	<?php 
			// }
		}
	} 
	?>
</div>
	</body>
	
	<footer>
		<ul id="pied_de_page" role="navigation" >
				<li id="pied_page_haut" ><a href="#">FAQ</a></li>
				<li ><a href="#">Qui sommes nous ?</a></li>
				<li ><a href="#">A propos</a></li>
		</ul>
	</footer>
</html>	
	
	
	
	
	