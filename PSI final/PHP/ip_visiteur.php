<?php


    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif(isset($_SERVER['HTTP_CLIENT_IP'] ) )
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
	
	$ip_verif="SELECT ip_visiteur FROM visiteur WHERE ip_visiteur=:ip";
	$ip_verif=$bdd->prepare($ip_verif);
	$ip_verif->execute(array('ip' => $ip));
	$resultat_ip=$ip_verif->fetch();
	
	if($resultat_ip==NULL) {

	$sql_ip="INSERT INTO visiteur (ip_visiteur) VALUES (:ip)";
	$sql_ip=$bdd->prepare($sql_ip);
	$sql_ip->execute(array('ip' => $ip));
	$sql_ip->closeCursor();
	
	}
	
?> 