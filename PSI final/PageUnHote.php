<?php 

session_start(); 

	$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');

	include '/PHP/ip_visiteur.php';    
?>



<?php include "/PHP/connexion.php"; ?>

<?php include "/PHP/deconnexion.php"; ?>

<?php 
		
$rqt="SELECT * FROM menu WHERE id_menu=:id_menu ORDER BY date_ajoute_menu DESC";
$rqt=$bdd->prepare($rqt);
$rqt->execute(array('id_menu'=>$_GET['id_menu']));
$resultat=$rqt->fetch();

$rqt1="SELECT * FROM inscription WHERE id_menu=:id_menu ORDER BY date_inscription DESC";
$rqt1=$bdd->prepare($rqt1);
$rqt1->execute(array('id_menu'=>$_GET['id_menu']));
$resultat1=$rqt1->fetch();

$rqt2="SELECT * FROM recette WHERE id_menu=:id_menu ORDER BY RAND()";
$rqt2=$bdd->prepare($rqt2);
$rqt2->execute(array('id_menu'=>$_GET['id_menu']));

?>
<?php 
include '/PHP/participation.php';
	?>
<?php 
include '/PHP/departicipation.php';
	?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleUnHote.css" />
		<?php include '/PHP/javascript.php'; ?>
			
		<title> DîneChezTonVoisin.com </title>
	</head>
	
	<body>
	
		<div id="corps">

		<?php include '/PHP/header.php' ?>
		
		<section id="votre_hote">
			<h3>A propos de Votre Hôte</h3>
			<div id="identite">
			<img src="img/Fond_hote.png" alt="photo_profil" id="photo_profil"> 
			<h2><?php echo $resultat1['pseudo']; ?></h2>
			</div>
			
			<div id="informations">
				<p><h4>Langues parlées :</h4> <?php echo $resultat1['langue']; ?></p>
				<p><h4>Plats préférés :</h4><?php echo $resultat1['plat_prefere']; ?></p>
				<p><h4>Centres d'intérêts :</h4> <?php echo $resultat1['loisir']; ?></p>
			</div>
			
			<div id="informations_comp">
				<p><h4>Fumeur :</h4> <?php echo $resultat1['fumeur']; ?></p>
				<p><h4>Animaux de compagnie :</h4><?php echo $resultat1['animal']; ?></p>
			</div>
		</section>
		
		<section id="photo_repas">
				<a href="#"> <h2>A la table de <?php echo $resultat['createur_menu']; ?></h2>
				<img src="<?php echo $resultat['photo_menu']; ?>" alt="photo_table" id="photo_table"> </a>
		</section>

		<section id="un_repas" >
		<form method="post">
			<div id="description">
				<div id="texte">
					<h4>Description</h4>
					<td><?php echo $resultat['description_menu']; ?></td>
				</div>
				
				<div id="menu_repas">
					<table id="menu_info">
						<tr>
							<th>Date</th>
							<td><?php echo $resultat['jour_menu']; ?></td>
						</tr>
						<tr>
							<th>Repas</th>
							<td><?php echo $resultat['spe_menu']; ?></td>
						</tr>
						<tr>
							<th>Places restantes</th>
							<td><?php echo $resultat['nbplaces_menu']; ?></td>
						</tr>
						<tr>
							<th>Prix par personne</th>
							<td> <?php echo $resultat['prix_menu']; ?><td>
						</tr>
					</table>
				</div>
			</div>
			<?php	
		if(isset($_SESSION['id']) AND isset($_SESSION['pseudo']) AND ($_SESSION['statut']=='invite' OR $_SESSION['statut']=='hote et invite')) {
		

					
			
		 $rqt0="SELECT p.id_repas, p.pseudo_participant,p.mail_participant FROM participant p
		 INNER JOIN menu m ON m.id_menu=:id_menu
		 WHERE p.id_repas=m.id_menu AND p.pseudo_participant=:pseudo_participant AND p.mail_participant=:mail_participant";
		 $rqt0=$bdd->prepare($rqt0);
		 $rqt0->execute(array('id_menu'=>$resultat['id_menu'],'pseudo_participant'=>$_SESSION['pseudo'],'mail_participant'=>$_SESSION['mail']));
		 $resultat3=$rqt0->fetch();
		 
		 		if($resultat3['id_repas']!=NULL AND $resultat3['pseudo_participant']!=NULL AND $resultat3['mail_participant']!=NULL) {

			?>
			<input id="participer" type="submit" name="departicipation" value="Je ne participe plus" class="Go_buton"/>
			
			<?php 
			
		 } else {
			
			?>
			<input id="participer" type="submit" name="participation" value="Je participe !" class="Go_buton"/>
			
			<?php
			}
			
		$rqt0->closeCursor();
		
		}
			?>
			</form>
		</section>
		
		<section id="repas_precedent">
			<h3>Pour vous mettre en appétit, quelques recettes concoctées par <?php echo $resultat1['pseudo']; ?></h3>
					<?php 
		$rqt1->closeCursor();
		
			for($i=0;$i<$resultat2=$rqt2->fetch();$i++) {
		?>
			<div id="poulet">
				<a href="PageUneRecette.php?titre=<?php echo $resultat2['titre_recette']; ?>&type=<?php echo $resultat2['type_recette'];?>&difficulte=<?php echo $resultat2['difficulte_recette'];?>&commentaire=<?php echo $resultat2['commentaire_recette'];?>&photo=<?php echo $resultat2['photo_recette'];?>&preparation=<?php echo $resultat2['temps_recette'];?>&cuisson=<?php echo $resultat2['temps_cuisson_recette']; ?>&cout=<?php echo $resultat2['cout_recette'];?>&ing1=<?php echo $resultat2['ing1'];?>&ing2=<?php echo $resultat2['ing2'];?>&ing3=<?php echo $resultat2['ing3'];?>&ing4=<?php echo $resultat2['ing4'];?>&ing5=<?php echo $resultat2['ing5'];?>&ing6=<?php echo $resultat2['ing6'];?>&ing7=<?php echo $resultat2['ing7'];?>&ing8=<?php echo $resultat2['ing8'];?>"><img src="<?php echo $resultat2['photo_recette']; ?>" alt="poulet" id="plat_poulet">
				<h2><?php echo $resultat2['titre_recette']; ?></h2> </a>
			</div>
					<?php 
					}
		$rqt2->closeCursor();
		?>

		</section>
		
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