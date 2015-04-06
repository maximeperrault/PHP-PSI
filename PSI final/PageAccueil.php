	<!---------- INSCRIPTION --------->
					<?php 
					session_start();
					$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');
	
    include '/PHP/ip_visiteur.php';    
		
	include '/PHP/inscription.php';
	?>
	<!-----------  ------------>


				
	<!---------- CONNEXION ---------->		
<?php 

include '/PHP/connexion.php';
	?>
	<!------------  ------------>
	
	
	<!------ FERMER LA SESSION ------->
		<?php include '/PHP/deconnexion.php'; ?>
	<!---------- --------->
	

<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleAccueil.css" />
		<?php include '/PHP/javascript.php'; ?>
			
		<title> DîneChezTonVoisin.com </title>
	</head>
	
	<body>
	
		<div id="corps">

		<header>
						<ul id="menu" role="navigation" >
				<form method="post">
   				<li class=bordG ><a href="PageAccueil.php">Accueil</a></li>
  				<li class=bordG ><a href="PageHote.php">Les Hôtes</a></li>
  				<li class=bordG ><a href="PageRecette.php">Les Recettes</a></li>
  				<li class=bordD ><input type="search" placeholder="Recherche" name="the_search"></li>	
				<?php if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { ?>
  				<li class=bordD ><a href="PageProfil.php" > <?php echo "Mon profil" ?> </a>
				<ul><li id="sousMenu"><a href="PageAccueil.php?deconnexion" >Déconnexion</a></li>
					</ul></li>
				<?php } else { ?> <li class=bordD ><a href="#" data-width="400" data-rel="popup_connection" class="poplight"> <?php echo "Se connecter" ?> </a></li>
				<?php } ?>
			<img src="img/Logofin.png" alt="logo" id="logo" >
			
						<div id="popup_connection" class="popup_block">
				<table>
					<p>Préparez vous à entrer dans un monde plein de bonnes choses</p>
					<tr>
						<td><label for="Votre identifiant"></label></td>
						<td><input type="text" name="pseudo_connexion" placeholder="Votre identifiant"/></td>
					</tr>
					<tr>
						<td><label for="Votre mot de passe"></label></td>
						<td><input type="password" name="mdp_connexion" placeholder="Votre mot de passe"/></td>
					</tr>
				</table>
				 <input type="submit" name="connexion" value="Go" id="submit"/>
			</div>
			</form>
			<div id="connect">
				<p id="slogan">Découvrez de nouvelles saveurs concoctées près de chez vous à petits prix, pour des rencontres d'exceptions</p>
				<?php if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
				} else { ?>
				<a href="#" data-width="400" data-rel="popup_inscription" class="poplight" id="bouton_inscription">S'inscrire !</a>
				<?php } ?>
			</div>
			
		<div id="popup_inscription" class="popup_block">

		<form id="formulaire" method="post">
			<table>
			<caption>Inscription</caption>
						<p><?php // On affiche les erreurs :
if($error == TRUE){ echo $errorMSG; }
?>
<?php // Si l'inscription s'est bien déroulée on affiche le succès :
if($registerOK == TRUE){ echo $registerMSG; } ?> </p>
			<tr>

				<td><label for="Nom"></label></td>
				<td><input type="text" name="nom" placeholder="Nom"/></td>
				<td><label for="Prénom"></label></td>
				<td><input type="text" name="prenom" placeholder="Prénom"/></td>
			</tr>
			
			<tr>
				<td><label for="Pseudo"></label></td>
				<td><input type="text" name="pseudo" placeholder="Pseudo"/></td>
				<td><label for="Ville"></label></td>
				<td><input type="text" name="ville" placeholder="Ville"/></td>
			</tr>
			
			<tr>
				<td><label for="Tel"></label></td>
				<td><input type="text" name="tel" placeholder="Tel" maxlength=10/></td>
				<td><label for="Email"></label></td>
				<td><input type="text" name="mail" placeholder="Email"/></td>
			</tr>
				
			<tr>
				<td><label for="pass"></label></td>
				<td><input type="password" name="mdp" placeholder="Mot de passe"/></td>
				<td><label for="pass2"></label></td>
				<td><input type="password" name="mdp2" placeholder="Confirmez le mot de passe"/></td>
			</tr>
		</table>
	
		<div id="nature du client" >
			<p>Vous souhaitez être ? </p>
			<select name="statut" size="1" tabindex="1">
					<option value="hote"> Hôte</option>
					<option value="invite">Invité</option>
					<option value="hote et invite"> Un peu des deux</option>
			</select>
		</div>
		
	 <input type="submit" name="inscription" value="S'inscrire" id="submit"/>
       
        </form>
        </div>
		</header>
		
		<section id="section_recherche">
			<h1>Trouve un voisin</h1>
			<form>
				<div id="departement">
				<h2>Choisis ton département :</h2>
					<select name="departement" size="1" tabindex="1">
					<option>Tous</option>
					<option>01	Ain</option>
					<option>02	Aisne</option>
					<option>03	Allier</option>
					<option>04	Alpes de Hautes-Provence</option>
					<option>05	Hautes-Alpes</option>
					<option>06	Alpes-Maritimes</option>
					<option>07	Ardèche</option>
					<option>08	Ardennes</option>
					<option>09	Ariège</option>
					<option>10	Aube</option>
					<option>11	Aude</option>
					<option>12	Aveyron</option>
					<option>13	Bouches-du-Rhône</option>
					<option>14	Calvados</option>
					<option>15	Cantal</option>
					<option>16	Charente</option>
					<option>17	Charente-Maritime</option>
					<option>18	Cher</option>
					<option>19	Corrèze</option>
					<option>2A	Corse-du-Sud</option>
					<option>2B	Haute-Corse</option>
					<option>21	Côte-d'Or</option>
					<option>22	Côtes d'Armor</option>
					<option>23	Creuse</option>
					<option>24	Dordogne</option>
					<option>25	Doubs</option>
					<option>26	Drôme</option>
					<option>27	Eure</option>
					<option>28	Eure-et-Loir</option>
					<option>29	Finistère</option>
					<option>30	Gard</option>
					<option>31	Haute-Garonne</option>
					<option>32	Gers</option>
					<option>33	Gironde</option>
					<option>34	Hérault</option>
					<option>35	Ille-et-Vilaine</option>
					<option>36	Indre</option>
					<option>37	Indre-et-Loire</option>
					<option>38	Isère</option>
					<option>39	Jura</option>
					<option>40	Landes</option>
					<option>41	Loir-et-Cher</option>
					<option>42	Loire</option>
					<option>43	Haute-Loire</option>
					<option>44	Loire-Atlantique</option>
					<option>45	Loiret</option>
					<option>46	Lot</option>
					<option>47	Lot-et-Garonne</option>
					<option>48	Lozère</option>
					<option>49	Maine-et-Loire</option>
					<option>50	Manche</option>
					<option>51	Marne</option>
					<option>52	Haute-Marne</option>
					<option>53	Mayenne</option>
					<option>54	Meurthe-et-Moselle</option>
					<option>55	Meuse</option>
					<option>56	Morbihan</option>
					<option>57	Moselle</option>
					<option>58	Nièvre</option>
					<option>59	Nord</option>
					<option>60	Oise</option>
					<option>61	Orne</option>
					<option>62	Pas-de-Calais</option>
					<option>63	Puy-de-Dôme</option>
					<option>64	Pyrénées-Atlantiques</option>
					<option>65	Hautes-Pyrénées</option>
					<option>66	Pyrénées-Orientales</option>
					<option>67	Bas-Rhin</option>
					<option>68	Haut-Rhin</option>
					<option>69	Rhône</option>
					<option>70	Haute-Saône</option>
					<option>71	Saône-et-Loire</option>
					<option>72	Sarthe</option>
					<option>73	Savoie</option>
					<option>74	Haute-Savoie</option>
					<option>75	Paris</option>
					<option>76	Seine-Maritime</option>
					<option>77	Seine-et-Marne</option>
					<option>78	Yvelines</option>
					<option>79	Deux-Sèvres</option>
					<option>80	Somme</option>
					<option>81	Tarn</option>
					<option>82	Tarn-et-Garonne</option>
					<option>83	Var</option>
					<option>84	Vaucluse</option>
					<option>85	Vendée</option>
					<option>86	Vienne</option>
					<option>87	Haute-Vienne</option>
					<option>88	Vosges</option>
					<option>89	Yonne</option>
					<option>90	Territoire-de-Belfort</option>
					<option>91	Essonne</option>
					<option>92	Hauts-de-Seine</option>
					<option>93	Seine-Saint-Denis</option>
					<option>94	Val-de-Marne</option>
					<option>95	Val-d'Oise</option>
					</select>
				</div>
				<div id="cuisine">
				<h2>Choisis la spécialité culinaire :</h2>
					<select name="cuisine" size="1" tabindex="2">
					<option>Toutes</option>
					<option>Africaine</option>
					<option>Anglaise</option>
					<option>Antillaise</option>
					<option>Chinoise</option>
					<option>Coréenne</option>
					<option>Espagnole</option>
					<option>Grecque</option>
					<option>Italienne</option>
					<option>Japonaise</option>
					<option>Française</option>
					<option>Nord Africaine</option>
					<option>Autre</option>
					</select>
				</div>
					
				<div id="place">
				<h2>Combien d'amis souhaites-tu inviter :</h2>
					<select name="place" size="1" tabindex="3">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
					</select>
				</div>
				
				<div id="prix">
				<h2>Ton budget (par personne) :</h2>
					<span id="range">15 €</span>
					<input type="range" min="1" max="50" step="1" value="15" onchange="showValue(this.value)" name="prix">	
				</div>
				
				<div id="repas">
				<h2>Choisis ton moment de la journée :</h2>
				<legend><input type="checkbox" name="brunch" tabindex="1">Brunch</legend>
				<legend><input type="checkbox" name="dejeuner" tabindex="1">Déjeuner</legend>
				<legend><input type="checkbox" name="diner" tabindex="1">Dîner</legend>
				</div>
				
				<input type="submit" name="find" value="A table !" class="Go_buton"/>
			</form>
		</section>
		<?php 
		$sql_recette="SELECT * FROM recette ORDER BY date_ajoute_recette DESC LIMIT 3";
		$sql_recette=$bdd->prepare($sql_recette);
		$sql_recette->execute(array());

						
				?>

		<section id="section_milieu">
				<h1>Sélection du Jour</h1>
				 <?php for($i=0;$i<$resultat=$sql_recette->fetch();$i++) { ?>
				<div id="plat">
				<a href="PageUneRecette.php?titre=<?php echo $resultat['titre_recette']; ?>&type=<?php echo $resultat['type_recette'];?>&difficulte=<?php echo $resultat['difficulte_recette'];?>&commentaire=<?php echo $resultat['commentaire_recette'];?>&photo=<?php echo $resultat['photo_recette'];?>&preparation=<?php echo $resultat['temps_recette'];?>&cuisson=<?php echo $resultat['temps_cuisson_recette']; ?>&cout=<?php echo $resultat['cout_recette'];?>&ing1=<?php echo $resultat['ing1'];?>&ing2=<?php echo $resultat['ing2'];?>&ing3=<?php echo $resultat['ing3'];?>&ing4=<?php echo $resultat['ing4'];?>&ing5=<?php echo $resultat['ing5'];?>&ing6=<?php echo $resultat['ing6'];?>&ing7=<?php echo $resultat['ing7'];?>&ing8=<?php echo $resultat['ing8'];?>">  <img src="<?php echo $resultat['photo_recette']; ?>" alt='plat' id='food_plat' >
					<h2> <?php echo $resultat['titre_recette']; ?></h2> </a>
				</div>
				<?php } ?>
		</section>
		
		<section id="stars_du_moment">
				<h1>Les Stars du Moment</h1>
				<div id="star1">
						<a href="#"><img src="img/Fond_hote.png" alt="star1" id="photo_star1" >
						<h2>Cyril T.</h2></a>
					</div>
					<div id="star2">
						<a href="#"><img src="img/Fond_hote.png" alt="star2" id="photo_star2" >
						<h2>Sylvie Z.</h2></a>
					</div>
					<div id="star3">
						<a href="#"><img src="img/Fond_hote.png" alt="star3" id="photo_star3" >
						<h2>Dalila K.</h2></a>
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