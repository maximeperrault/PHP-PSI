
<?php 

session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');

	include '/PHP/ip_visiteur.php';    
?>


<?php include '/PHP/connexion.php'; ?>

<?php include '/PHP/deconnexion.php'; ?>

		<?php 
		$sql_recette="SELECT * FROM recette ORDER BY date_ajoute_recette DESC LIMIT 1";
		$sql_recette=$bdd->prepare($sql_recette);
		$sql_recette->execute(array());

		$sql_recette2="SELECT * FROM recette ORDER BY titre_recette";
		$sql_recette2=$bdd->prepare($sql_recette2);
		$sql_recette2->execute(array());				
		
				?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleRecette2.css" />
		<?php include '/PHP/javascript.php'; ?>
			
		<title> DîneChezTonVoisin.com </title>
	</head>
	
	<body>
	
		<div id="corps">

		<?php include '/PHP/header.php'; ?>
			
			<section id="section_recherche">
			<form>
					<div id="recherche_recette">
					<h1>Retrouvez une recette</h1>
					<input type="search" placeholder="Nom, ingrédients" name="search_recette" id="search_recette">
					<input type="submit" name="find" value="Go" id="Go_recette"/>
					</div>

					<div id="recherche_generale">
					<h1>Ou découvrez en de nouvelles</h1>
					<div id="prix">
						<h2>Coût de la recette</h2>
						<span id="range">15 €</span>
						<input type="range" min="1" max="50" step="1" value="15" onchange="showValue(this.value)" name="cout">	
					</div>		
								
					<div id="choix_plat">
					<h2>Type de plats</h2>
					<legend><input type="checkbox" name="entrée" tabindex="1">Entrée</legend>
					<legend><input type="checkbox" name="plat" tabindex="1">Plat</legend>
					<legend><input type="checkbox" name="dessert" tabindex="1">Dessert</legend>
					</div>
					
					<div id="temps">
					<h2>Temps de péparation</h2>
					<legend><input type="checkbox" name="rapide" tabindex="1">Rapide</legend>
					<legend><input type="checkbox" name="moyen" tabindex="1">Moyen</legend>
					<legend><input type="checkbox" name="long" tabindex="1">Long</legend>
					</div>
				
					<div id="origine">
					<h2>Origine culinaire</h2>
					<select name="origine_culinaire" size="1" tabindex="1">
						<option value="01">Africaine</option>
						<option value="02">"Américaine"</option>
						<option value="03">Asiatique</option>
						<option value="04">Gastronomie française</option>
						<option value="05">Italienne</option>
						<option value="06">Traditionnelle</option>	
					</select>
					</div>
					
					<div id="niveau">
					<h2>Vous êtes plutôt :</h2>
					<legend><input type="checkbox" name="difficulté1" tabindex="1">Cuisinier en herbe</legend>
					<legend><input type="checkbox" name="difficulté2" tabindex="1">Expérimenté</legend>
					<legend><input type="checkbox" name="difficulté3" tabindex="1">Un vrai prodige</legend>
					</div>
					
					<input type="submit" name="find" value="Rechercher !" class="Go_buton"/>
					
					</div>

			</form>
		</section>
		
		<section id="nouveaux">
			<h1>Les dernières recettes</h1>
			
			<?php
		if($sql_recette!=NULL) {
			for($i=0;$i<$resultat_recette=$sql_recette->fetch();$i++) {?>
			<div id="slideshow">
    		<ul id="sContent"><!--
       			 --><li><img src="<?php echo $resultat_recette['photo_recette']; ?>" alt="Image bleue"/></li><!--
       			 --><li><h1>Temps: <?php echo $resultat_recette['temps_recette']; ?>	<br> Difficulté: <?php echo $resultat_recette['difficulte_recette']; ?>	<br> Prix: <?php echo $resultat_recette['cout_recette']." €"; ?> </h1></li>       			

   			 </ul>
			</div>
			<?php 
			}
				}
			?>
			<a href="#sContent" id="flecheG">&lt</a><a href="#slideshow" id="flecheD">&gt</a>
		</section>
		
		

		
		<section id="carte_recette">
				<?php for($j=0;$j<$resultat_recette2=$sql_recette2->fetch();$j++) { ?>
			<div class="une_recette">
			<div id="nom">
				<img src="<?php echo $resultat_recette2['photo_recette']; ?>" alt="photo_recette" id="photo_recette">
				<h2><?php echo $resultat_recette2['titre_recette']; ?></h2>
			</div>
			
			<div id="type">
				<h3>Type:</h3><h2><?php echo $resultat_recette2['type_recette']; ?></h2>
			</div>
				
			<div id="difficulte">
				<h3>Niveau:</h3><h2><?php echo $resultat_recette2['difficulte_recette']; ?></h2>
			</div>
			<div id="time">
				<h3>Temps:</h3><h2><?php echo $resultat_recette2['temps_recette']; ?></h2>
			</div>
			<div id="cout">
				<h3>Prix:</h3><h2><?php echo $resultat_recette2['cout_recette']." €"; ?></h2>
			</div>
			
			<a href="PageUneRecette.php?titre=<?php echo $resultat_recette2['titre_recette']; ?>&type=<?php echo $resultat_recette2['type_recette'];?>&difficulte=<?php echo $resultat_recette2['difficulte_recette'];?>&commentaire=<?php echo $resultat_recette2['commentaire_recette'];?>&photo=<?php echo $resultat_recette2['photo_recette'];?>&preparation=<?php echo $resultat_recette2['temps_recette'];?>&cuisson=<?php echo $resultat_recette2['temps_cuisson_recette']; ?>&cout=<?php echo $resultat_recette2['cout_recette'];?>&ing1=<?php echo $resultat_recette2['ing1'];?>&ing2=<?php echo $resultat_recette2['ing2'];?>&ing3=<?php echo $resultat_recette2['ing3'];?>&ing4=<?php echo $resultat_recette2['ing4'];?>&ing5=<?php echo $resultat_recette2['ing5'];?>&ing6=<?php echo $resultat_recette2['ing6'];?>&ing7=<?php echo $resultat_recette2['ing7'];?>&ing8=<?php echo $resultat_recette2['ing8'];?>"s id="suite">Voir</a>
			</div>
					<?php } ?>
		
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