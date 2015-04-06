<?php 

session_start(); 


	$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');
	include ('/PHP/ajout_recette.php');
	
	include '/PHP/ip_visiteur.php';    
?>

<?php include "/PHP/connexion.php"; ?>

<?php include "/PHP/deconnexion.php"; ?>

<?php 

if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {

$sql="SELECT * FROM recette WHERE createur_recette=:pseudo ORDER BY date_ajoute_recette";
$sql=$bdd->prepare($sql);
$sql->execute(array('pseudo'=>$_SESSION['pseudo']));
}
?>
<!----------- ----------->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleMesRecettes.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="js/jquery.jrumble.1.3.min.js"></script>
		<script>
				jQuery(function($){
			$('#entree, #plat, #dessert, #star1, #star2, #star3').jrumble({
    			x: 1,
				y: -1,
   			 	rangeRot: 3,
   			 	speed: 50
				});
				
				$('#entree, #plat, #dessert, #star1, #star2, #star3').hover(function(){
				$(this).trigger('startRumble');
				}, function(){
				$(this).trigger('stopRumble');
				});
			
			
			$('input[type="range"]').change(function () {
   			 var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));
    
    			$(this).css('background-image',
                '-webkit-gradient(linear, left top, right top, '
                + 'color-stop(' + val + ', rgb(208, 87, 0)), '
                + 'color-stop(' + val + ', #fff)'
                + ')'
                );
		});
		
			//Lorsque vous cliquez sur un lien de la classe poplight
	$('a.poplight').on('click', function() {
		var popID = $(this).data('rel'); //Trouver la pop-up correspondante
		var popWidth = $(this).data('width'); //Trouver la largeur

		//Faire apparaitre la pop-up et ajouter le bouton de fermeture
		$('#' + popID).fadeIn().css({ 'width': popWidth}).prepend('<a href="#" class="close"><img src="img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
		
		//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
		var popMargTop = ($('#' + popID).height() + 80) / 2;
		var popMargLeft = ($('#' + popID).width() + 80) / 2;
		
		//Apply Margin to Popup
		$('#' + popID).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues d'anciennes versions de IE
		$('body').append('<div id="fade"></div>');
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();
		
		return false;
	});
	
	
	//Close Popups and Fade Layer
	$('body').on('click', 'a.close, #fade', function() { //Au clic sur le body...
		$('#fade , .popup_block').fadeOut(function() {
			$('#fade, a.close').remove();  
	}); //...ils disparaissent ensemble
		
		return false;
	});
			
			
			});
    	</script>
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
		
		
		<section id="liste_recette">
			<h1>Mes Recettes</h1>
				<section id="bloc1">
				
				<div id="ajouter_recette">
					<a href="#" data-width="400" data-rel="popup_ajouter" class="poplight" id="popup_ajout">
					<div id="bouton_ajouter">
					<img src="img/plus.png" alt="plus" id="plus" >	
					<h2>Ajouter une recette</h2>
					</div>
					</a>
				</div>
				
			<div id="popup_ajouter" class="popup_block">
				<form id="ajout_recette" method="post" enctype="multipart/form-data">
				<?php if($error == TRUE) { ?>
				 <?php  echo "<p>Veuillez remplir tout les champs</p>"; } ?> 
					<p>Choisissez une image</p>
					<input type="file" name="image" id="ajout_image"/>
					<table>
						<caption>Ajoutez votre recette</caption>
					<tr>
					<td><label for="Type"><select name="type">
					<option value="plat">Plat</option>
					<option value="entree">Entrée</option>
					<option value="dessert">Dessert</option>
					</select></label></td>
					<td><label for="Difficulte"><select name="difficulte">
					<option value="difficulte">Difficulté</option>
					<option value="chef cuistot">Chef cuistot</option>
					<option value="cuisinier ordinaire">Cuisinier ordinaire</option>
					<option value="cuisinier en herbe">Cuisinier en herbe</option>
					</select></label></td>
					</tr>
					</table>
					
					<table>
					<p>Indications</p>
					<tr>
					<td><label for="Titre"></label></td>
					<td><input type="text" name="titre" placeholder="Titre"/></td>
					<td><label for="Preparation"></label></td>
					<td><input type="text" name="preparation" placeholder="Temps de preparation"/></td>
					</tr>
			
					<tr>
					<td><label for="Cuisson"></label></td>
					<td><input type="text" name="cuisson" placeholder="Temps de cuisson"/></td>
					<td><label for="Cout"></label></td>
					<td><input type="text" name="cout" placeholder="Cout moyen"/></td>
					</tr>
					</table>
					
					<table>
					<p>Ingrédients (1 par champs)</p>
					<tr>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing1" placeholder=" "/></td>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing2" placeholder=" "/></td>
					</tr>
					<tr>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing3" placeholder=" "/></td>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing4" placeholder=" "/></td>
					</tr>
					<tr>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing5" placeholder=" "/></td>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing6" placeholder=" "/></td>
					</tr>
					<tr>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing7" placeholder=" "/></td>
					<td><label for="ing"></label></td>
					<td><input type="text" name="ing8" placeholder=" "/></td>
					</tr>
					<tr>						
					</table>
		
					<textarea name="commentaire" rows="6" col="150" placeholder="Votre preparation :)"></textarea>
		
					<input type="submit" name="ajout_recette" value="Enregistrer" id="submit"/>
				</form>
				</div>
				<?php if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { ?>
				<?php
				for($i=0;$i<$resultat=$sql->fetch();$i++) { ?>
				<div id="plat">
				<a href="PageUneRecette.php?titre=<?php echo $resultat['titre_recette']; ?>&type=<?php echo $resultat['type_recette'];?>&difficulte=<?php echo $resultat['difficulte_recette'];?>&commentaire=<?php echo $resultat['commentaire_recette'];?>&photo=<?php echo $resultat['photo_recette'];?>&preparation=<?php echo $resultat['temps_recette'];?>&cuisson=<?php echo $resultat['temps_cuisson_recette']; ?>&cout=<?php echo $resultat['cout_recette'];?>&ing1=<?php echo $resultat['ing1'];?>&ing2=<?php echo $resultat['ing2'];?>&ing3=<?php echo $resultat['ing3'];?>&ing4=<?php echo $resultat['ing4'];?>&ing5=<?php echo $resultat['ing5'];?>&ing6=<?php echo $resultat['ing6'];?>&ing7=<?php echo $resultat['ing7'];?>&ing8=<?php echo $resultat['ing8'];?>">  <img src="<?php echo $resultat['photo_recette']; ?>" alt='plat' id='food_plat' >
					<h2> <?php echo $resultat['titre_recette']; ?></h2> </a>
					
				</div>
				<?php 
				} ?>

				</section>
				<?php 	
				} ?>
				
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
		