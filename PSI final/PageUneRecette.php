<?php 

session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');

	include '/PHP/ip_visiteur.php';    
?>


<?php include '/PHP/connexion.php'; ?>

<?php include '/PHP/deconnexion.php'; ?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleUneRecette.css" />
		<?php include '/PHP/javascript.php'; ?>
    	<script type="text/javascript">
			function showValue(newValue)
			{
			document.getElementById("range").innerHTML=newValue+'€';
			}
			</script>
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
						<option>Africaine</option>
						<option>"Américaine"</option>
						<option>Asiatique</option>
						<option>Gastronomie française</option>
						<option>Italienne</option>
						<option>Traditionnelle</option>	
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
		
			<section id="une_recette">				
				<div id="photo_recette">
					<h2><?php if(isset($_GET['titre'])) echo $_GET['titre']; ?> </h2>
					<h4><?php if(isset($_GET['type'])) echo $_GET['type']; ?></h4>
					<img src="<?php if(isset($_GET['photo'])) echo $_GET['photo'] ?>" alt="plat" id="plat"/>
				</div>
				
				<div id="description">
					<h5>Indications :</h5>
					<p>Temps de préparation : <?php if(isset($_GET['preparation'])) echo $_GET['preparation']; ?></p>
					<?php if(isset($_GET['cuisson']) AND $_GET['cuisson']!=NULL) { ?><p>Temps de cuisson : <?php echo $_GET['cuisson']; ?></p> <?php } ?>
					<p>Coût moyen : <?php if(isset($_GET['cout'])) echo $_GET['cout']; ?>€</p>
					<p>Pour: <?php if(isset($_GET['difficulte'])) echo $_GET['difficulte']; ?></p>
				</div>
				
				<div id="ingredients">
					<ul id="liste">
					<h5>Ingrédients : </h5><li> <p><?php if(isset($_GET['ing1'])) echo $_GET['ing1']; ?></p></li> <li><p><?php if(isset($_GET['ing2'])) echo $_GET['ing2']; ?></li></p> </p>
					<li><p><?php if(isset($_GET['ing3'])) echo $_GET['ing3']; ?></p></li> <li><p><?php if(isset($_GET['ing4'])) echo $_GET['ing4']; ?></p></li> 
					</ul> 
				</div>
				
				<div id="preparation">
					<h5>Préparation de la recette:</h5>
					<p><?php if(isset($_GET['commentaire'])) echo $_GET['commentaire']; ?></p>
				</div>
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
	