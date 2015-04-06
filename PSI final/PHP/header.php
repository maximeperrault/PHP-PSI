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
		</header>