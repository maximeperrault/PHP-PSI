<?php 

session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');

	include '/PHP/ip_visiteur.php';    
?>


<?php include '/PHP/connexion.php'; ?>

<?php include '/PHP/deconnexion.php'; ?>

<?php
 
 //on selectionne les menus par ordre decroissant de création
$rqt="SELECT * FROM menu ORDER BY date_ajoute_menu DESC";
$rqt=$bdd->prepare($rqt);
$rqt->execute(array());
$resultat=$rqt->fetch();

// on selectionne le dernier inscrit
$rqt1="SELECT * FROM inscription ORDER BY date_inscription DESC LIMIT 1";
$rqt1=$bdd->prepare($rqt1);
$rqt1->execute(array());

//on selectionne la ville du créateur du menu
$rqt2="SELECT ville FROM inscription WHERE pseudo=:pseudo ORDER BY date_inscription DESC LIMIT 1";
$rqt2=$bdd->prepare($rqt2);
$rqt2->execute(array('pseudo'=>$resultat['createur_menu']));
$resultat2=$rqt2->fetch();
?>



<?php include '/PHP/participation.php';	?>
<?php include '/PHP/departicipation.php';	?>





<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleHote.css" />
		<?php include '/PHP/javascript.php'; ?>
			
		<title> DîneChezTonVoisin.com </title>
	</head>
	
	<body>
	
		<div id="corps">

<?php include '/PHP/header.php'; ?>
		
		<section id="section_recherche">
			<form method="post">
				<div id="recherche_nom">
				<h1>Retrouve le nom de ton hôte préféré</h1>
				<input type="search" placeholder="Recherche" name="recherche_hote" id="search_hote"/>
				<input type="submit" name="find" value="Rechercher" id="Go_hote"/>
				</div>
				
				<div id="recherche_generale">
				<h1>Fait de nouvelles rencontres</h1>
				<div id="departement">
				<h2>Choisis ton département :</h2>
					<select name="departement" size="1" tabindex="1">
					<option value="00">Tous</option>
					<option value="01">01	Ain</option>
					<option value="02">02	Aisne</option>
					<option value="03">03	Allier</option>
					<option value="04">04	Alpes de Hautes-Provence</option>
					<option value="05">05	Hautes-Alpes</option>
					<option value="06">06	Alpes-Maritimes</option>
					<option value="07">07	Ardèche</option>
					<option value="08">08	Ardennes</option>
					<option value="09">09	Ariège</option>
					<option value="10">10	Aube</option>
					<option value="11">11	Aude</option>
					<option value="12">12	Aveyron</option>
					<option value="13">13	Bouches-du-Rhône</option>
					<option value="14">14	Calvados</option>
					<option value="15">15	Cantal</option>
					<option value="16">16	Charente</option>
					<option value="17">17	Charente-Maritime</option>
					<option value="18">18	Cher</option>
					<option value="19">19	Corrèze</option>
					<option value="2A">2A	Corse-du-Sud</option>
					<option value="2B">2B	Haute-Corse</option>
					<option value="21">21	Côte-d'Or</option>
					<option value="22">22	Côtes d'Armor</option>
					<option value="23">23	Creuse</option>
					<option value="24">24	Dordogne</option>
					<option value="25">25	Doubs</option>
					<option value="26">26	Drôme</option>
					<option value="27">27	Eure</option>
					<option value="28">28	Eure-et-Loir</option>
					<option value="29">29	Finistère</option>
					<option value="30">30	Gard</option>
					<option value="31">31	Haute-Garonne</option>
					<option value="32">32	Gers</option>
					<option value="33">33	Gironde</option>
					<option value="34">34	Hérault</option>
					<option value="35">35	Ille-et-Vilaine</option>
					<option value="36">36	Indre</option>
					<option value="37">37	Indre-et-Loire</option>
					<option value="38">38	Isère</option>
					<option value="39">39	Jura</option>
					<option value="40">40	Landes</option>
					<option value="41">41	Loir-et-Cher</option>
					<option value="42">42	Loire</option>
					<option value="43">43	Haute-Loire</option>
					<option value="44">44	Loire-Atlantique</option>
					<option value="45">45	Loiret</option>
					<option value="46">46	Lot</option>
					<option value="47">47	Lot-et-Garonne</option>
					<option value="48">48	Lozère</option>
					<option value="49">49	Maine-et-Loire</option>
					<option value="50">50	Manche</option>
					<option value="51">51	Marne</option>
					<option value="52">52	Haute-Marne</option>
					<option value="53">53	Mayenne</option>
					<option value="54">54	Meurthe-et-Moselle</option>
					<option value="55">55	Meuse</option>
					<option value="56">56	Morbihan</option>
					<option value="57">57	Moselle</option>
					<option value="58">58	Nièvre</option>
					<option value="59">59	Nord</option>
					<option value="60">60	Oise</option>
					<option value="61">61	Orne</option>
					<option value="62">62	Pas-de-Calais</option>
					<option value="63">63	Puy-de-Dôme</option>
					<option value="64">64	Pyrénées-Atlantiques</option>
					<option value="65">65	Hautes-Pyrénées</option>
					<option value="66">66	Pyrénées-Orientales</option>
					<option value="67">67	Bas-Rhin</option>
					<option value="68">68	Haut-Rhin</option>
					<option value="69">69	Rhône</option>
					<option value="70">70	Haute-Saône</option>
					<option value="71">71	Saône-et-Loire</option>
					<option value="72">72	Sarthe</option>
					<option value="73">73	Savoie</option>
					<option value="74">74	Haute-Savoie</option>
					<option value="75">75	Paris</option>
					<option value="76">76	Seine-Maritime</option>
					<option value="77">77	Seine-et-Marne</option>
					<option value="78">78	Yvelines</option>
					<option value="79">79	Deux-Sèvres</option>
					<option value="80">80	Somme</option>
					<option value="81">81	Tarn</option>
					<option value="82">82	Tarn-et-Garonne</option>
					<option value="83">83	Var</option>
					<option value="84">84	Vaucluse</option>
					<option value="85">85	Vendée</option>
					<option value="86">86	Vienne</option>
					<option value="87">87	Haute-Vienne</option>
					<option value="88">88	Vosges</option>
					<option value="89">89	Yonne</option>
					<option value="90">90	Territoire-de-Belfort</option>
					<option value="91">91	Essonne</option>
					<option value="92">92	Hauts-de-Seine</option>
					<option value="93">93	Seine-Saint-Denis</option>
					<option value="94">94	Val-de-Marne</option>
					<option value="95">95	Val-d'Oise</option>
					</select>
				</div>
				<div id="cuisine">
				<h2>Choisis la spécialité culinaire :</h2>
					<select name="cuisine" size="1" tabindex="2">
					<option value="01">Toutes</option>
					<option value="02">Africaine</option>
					<option value="03">Anglaise</option>
					<option value="04">Antillaise</option>
					<option value="05">Chinoise</option>
					<option value="06">Coréenne</option>
					<option value="07">Espagnole</option>
					<option value="08">Grecque</option>
					<option value="09">Italienne</option>
					<option value="10">Japonaise</option>
					<option value="11">Française</option>
					<option value="12">Nord Africaine</option>
					<option value="13">Autre</option>
					</select>
				</div>
					
				<div id="place">
				<h2>Combien d'amis souhaites-tu inviter :</h2>
					<select name="place" size="1" tabindex="3">
					<option  value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					</select>
				</div>
				
				<div id="prix">
				<h2>Ton prix (par personne) :</h2>
					<span id="range">15 €</span>
					<input type="range" min="1" max="50" step="1" value="15" onchange="showValue(this.value)" name="prix">	
				</div>
				
				<div id="repas">
				<h2>Choisis ton repas de la journée :</h2>
				<legend><input type="checkbox" name="brunch" tabindex="1">Brunch</legend>
				<legend><input type="checkbox" name="dejeuner" tabindex="1">Déjeuner</legend>
				<legend><input type="checkbox" name="diner" tabindex="1">Dîner</legend>
				</div>
				
				<input id="Atable" type="submit" name="find" value="A table !" class="Go_buton"/>
				
				</div>
			</form>
		</section>
		
		
		<section id="nouveaux">
			<h1>Les petits nouveaux !</h1>
						<?php
		// on affiche les informations du dernier inscrit
		 for($i=0;$i<$resultat1=$rqt1->fetch();$i++) { 
		
		?>
			<div id="slideshow">
			
    		<ul id="sContent">

       			 <li><img src="img/Fond_hote.png" alt="Image bleue"/></li>
       			 <li><h1> <?php if(isset($resultat1['pseudo'])) echo "Voici ".$resultat1['pseudo']; ?><br/>
				 <?php if(isset($resultat1['statut'])) echo "c'est un ".$resultat1['statut']; ?><br/>
				   <?php if(isset($resultat1['plat_prefere'])) echo "son plat préféré est ".$resultat1['plat_prefere']; ?><br/>
				  <?phpif(isset($resultat1['loisir']))  echo "et il aime ".$resultat1['loisir']; ?></h1></li>


   			 </ul>

			</div>

			
			<a href="#sContent" id="flecheG">&lt</a><a href="#slideshow" id="flecheD">&gt</a>
		</section>
		<?php
				 }
					$rqt1->closeCursor();
					
					if($rqt!=NULL) { ?>
		<section id="carte_repas">
		<form method="post" >
			<div id="profil">
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
				<h2><?php echo $resultat2['ville']; ?></h2>
			</div>
			<div id="nb_place">
				<img src="img/user14.png" alt="icone_place" id="icone_place">
				<h2><?php echo $resultat['nbplaces_menu']; ?> personnes restantes</h2>
			</div>
			<div id="prix_repas">
				<h2><?php echo $resultat['prix_menu']; ?>€/personne</h2>
			</div>
			
						<?php }
						
		 
		 
		 
	
		if(isset($_SESSION['id']) AND isset($_SESSION['pseudo']) AND ($_SESSION['statut']=='invite' OR $_SESSION['statut']=='hote et invite')) {

		// on selectionne tout les menus auquels je participe pour vérifier si je suis déjà inscrit au repas ou pas
		 $rqt0="SELECT p.id_repas, p.pseudo_participant,p.mail_participant FROM participant p
		 INNER JOIN menu m ON m.id_menu=:id_menu
		 WHERE p.id_repas=m.id_menu AND p.pseudo_participant=:pseudo_participant AND p.mail_participant=:mail_participant";
		 $rqt0=$bdd->prepare($rqt0);
		 $rqt0->execute(array('id_menu'=>$resultat['id_menu'],'pseudo_participant'=>$_SESSION['pseudo'],'mail_participant'=>$_SESSION['mail']));
		 $resultat3=$rqt0->fetch();
	
	
		 
		 		if($resultat3['id_repas']!=NULL AND $resultat3['pseudo_participant']!=NULL AND $resultat3['mail_participant']!=NULL) {

		?>
		
		<input id="participer" type="submit" name="departicipation" value="Je ne participe plus" class="Go_buton"/><a href="PageUnHote.php?id_menu=<?php echo $resultat['id_menu']; ?>" id="details">Plus de détails</a>
		
			<?php
			
			} else { 
			
			?> 
			
			<input id="participer" type="submit" name="participation" value="Je participe !" class="Go_buton"/><a href="PageUnHote.php?id_menu=<?php echo $resultat['id_menu']; ?>" id="details">Plus de détails</a>
			
			<?php
			}
				// }
					}
		 $rqt->closeCursor();
		 $rqt2->closeCursor();
			?>
			
			</form>
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