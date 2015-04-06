		 <?php 
							session_start();
		 					$bdd = new PDO('mysql:host=localhost;dbname=sitepsi', 'root', '');
							
		 include '/PHP/modification_profil.php';  ?>
		 
		 <?php include '/PHP/connexion.php'; ?>
		 
		 				<!------ FERMER LA SESSION ------->
			<?php 
			include '/PHP/deconnexion.php';
			?>
		 
		 <!---------- ---------->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="StyleProfil.css" />
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
		
			<div id="titre">
			<h2>Mes Infos Persos</h2>
			</div>
			<div id="modif_profil">
				<a href="#"  data-width="400" data-rel="popup_modification" class="poplight" id="popup_modif"><img src="img/edit26.png" alt="icone_modif" id="icone_modif">Modifier</a>
			</div>
			
			<div id="popup_modification" class="popup_block">
				<form id="formulaire" method="post">
				<caption>Modifiez vos informations personnelles</caption>
				<table>
					<tr>
					<td><label for="ville"></label></td>
					<td><input type="text" name="ville" placeholder="Résidence"/></td>
					<td><label for="Tel"></label></td>
					<td><input type="text" name="tel" placeholder="Téléphone"/></td>
					</tr>
							
					<tr>
					<td><label for="Centres_d'intérêts"></label></td>
					<td><input type="text" name="loisir" placeholder="Centres d'intérêts"/></td>
					<td><label for="Mail"></label></td>
					<td><input type="text" name="mail" placeholder="Mail"/></td>
					</tr>
					
					<tr>
					<td><label for="Langues_parlées"></label></td>
					<td><input type="text" name="langue" placeholder="Langues parlées"/></td>
					<td><label for="Plats_préférés"></label></td>
					<td><input type="text" name="plat_prefere" placeholder="Plats préférés"/></td>
					</tr>

				</table>
				
				<div id="nature du client">
					<p>Vous souhaitez être :</p>
					<select name="statut" size="1" tabindex="1">
					<option> </option>
					<option value="hote"> Hôte</option>
					<option value="invite">Invité</option>
					<option value="hote et invite"> Un peu des deux</option>
					</select>
				</div>
				
				<div id="Fumeur">
					<p>Fumeur :</p>
					<select name="fumeur" size="1" tabindex="1">
					<option> </option>
					<option value="oui">Oui</option>
					<option value="non">Non</option>
					</select>
				</div>
				
				<div id="Animal">
					<p>Animaux :</p>
					<select name="animal" size="1" tabindex="1">
					<option> </option>
					<option value="aucun">Aucun</option>
					<option value="chien">Chien</option>
					<option value="chat">Chat</option>
					<option value="autres">Autres</option>
					</select>
				</div>
				
				<input type="submit" name="modification" value="Enregistrer" id="submit"/>
				</form>
			</div>
			
		<section id="information_profil">
			
			<div id="photo_profil">
				<img src="img/Fond_hote.png" alt="hote" id="photo_hote" >
			</div>
			
<?php if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { ?>
			<div id="coordonees">
				<p> <?php echo 'Surnom : ' .$_SESSION["pseudo"]; ?> </p>
				<p><?php echo 'Statut : ' .$_SESSION["statut"]; ?></p>
				<p><?php echo 'Nom : ' .$_SESSION["nom"]; ?></p>
				<p><?php echo 'Prenom : ' .$_SESSION["prenom"]; ?></p>
				<p><?php echo 'Ville : ' .$_SESSION["ville"]; ?></p>
				<p><?php echo 'Email : ' .$_SESSION["mail"]; ?></p>
				<p><?php echo 'Numéro de téléphone : ' .$_SESSION["tel"]; ?></p>
				<?php } ?>
				<p><?php if(isset($_SESSION['langue']) AND $_SESSION['langue']!=NULL) { echo 'Langues parlees : ' .$_SESSION["langue"]; } ?></p>
				<p><?php if(isset($_SESSION['plat_prefere']) AND $_SESSION['plat_prefere']!=NULL) { echo 'Plats preferes : ' .$_SESSION["plat_prefere"]; }?></p>
				<p><?php if(isset($_SESSION['loisir']) AND $_SESSION['loisir']!=NULL) {echo 'Centres d\'intérets : ' .$_SESSION["loisir"]; }?></p>
				<p><?php if(isset($_SESSION['fumeur']) AND $_SESSION['fumeur']!=NULL) {echo 'Fumeur : ' .$_SESSION["fumeur"]; }?></p>
				<p><?php if(isset($_SESSION['animal']) AND $_SESSION['animal']!=NULL) {echo 'Animal de compagnie : ' .$_SESSION["animal"]; }?></p>
				

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