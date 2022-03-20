<!DOCTYPE html>
<html lang="fr">

<!-- La "tête" sert à définir des propriétés globales de la page -->
<head>
<meta charset="UTF-8">
<title>Introduction au PHP</title>
<link rel="stylesheet" href="./Styles/php_examples.css"> <!-- on définit ici le fichier css qui va contrôler l'apparence de cette page-->
</head>

<!-- Le "corps" de la page définit le contenu affiché dans la fenêtre du navigateur -->
<body>
<div id="MainContainer">

	<div class="header">
		<hr>
		<h1>Page Web Dynamique avec PHP - Les Bases</h1>
		<hr>
	</div>

	<p>Lorsque vous tapez une adresse dans votre navigateur, il va automatiquement interroger un serveur via une <b>requête</b>. On dit qu'il est <b>client</b></p>
	<p>Le serveur vérifie alors si la requête est valide, et si oui, il répond en envoyant la page web que la requête lui demandait. Ce processus de communication client-serveur est la base du web.</p>
	<hr>

	<h2>PHP : du code côté serveur</h2>
	<p>Dans le processus décrit plus tôt, <b>PHP intervient à l'intérieur du serveur, juste avant qu'il envoie la réponse.</b></p>
	<p>Le code PHP s'éxécute et ré-écrit le html de la page en fonction du programme et des données fournies. Et c'est après cette ré-écriture que le HTML est envoyé au client. <b>Le navigateur va donc recevoir un HTML personnalisé en fonction des circonstances</b></p>

	<img class="center" src="./Images/server_client.jpg">
	<hr>
	
	<h2>Exemples simples</h2>
	<p>Le plus souvent, PHP est utilisé en combinaison avec une base de données et/ou des formulaires de saisie. Mais nous n'avons pas encore parlé de ces choses là!</p>
	<p>Il est néanmoins possible de faire quelques exemples de PHP sans avoir ces systèmes de gestion de flux de données...</p>
	<h3>Par exemple, affichons la date et l'heure dans notre page :</h3>
	
	<?php
	
		//To get the time, we have to set timezone. Otherwise we get a warning
		date_default_timezone_set("Europe/Paris");
		
		// Return current date from the remote server
		$date = date('d-m-y h:i:s');
		echo '<p class="date">'.$date.'</p>';
	?>
	<p>Vous pouvez rafraîchir la page et constater que l'heure va bien se modifier. Mais seulement à ce moment là.<br>
	<b>Car une fois le HTML arrivé et affiché dans le navigateur, il n'est pas modifié ensuite.</b> Ce que vous voyez sur l'écran d'un navigateur est la réponse reçue par le client, et elle ne peut plus être modifiée par le php dans le serveur.</p>
	<p><i>(nous verrons par la suite qu'on peut avoir du code côté client pour modifier la page après sa réception, mais chaque chose en son temps)</i></p>
	<hr>
	
	<h3>Affichons une phrase avec du contenu aléatoire :</h3>
	
	<?php
		//Get a random number between 0 and 9
		$number = rand(0,9);
		
		//Create an array with possible texts
		$colors = array("rouge","orange","jaune","vert","bleu","violet","noir","blanc","marron","cramoisi");
		
		//Echo the final sentence into the HTML
		echo '<p class="couleur">La couleur du moment est : '.$colors[$number].'</p>';
	?>
	
	<hr>
	
	<h3>On peut même modifier les styles en ré-écrivant le HTML intelligemment:</h3>
	
	<?php
		$styleColors = array("red","orange","yellow","green","blue","purple","black","white","brown","crimson");
		echo '<p class="couleur">La couleur du moment est : <span style="color:'.$styleColors[$number].'">'.$colors[$number].'</span></p>';
	?>
	
	<hr>
	
	<p>Ces fonctionnalités permettent de montrer simplement que PHP "ré-écrit" le HTML avant de l'envoyer, mais elles sont un peu gadget.</p>
	<p>Le véritable potentiel de PHP vient de la possibilité de <b>réagir spécifiquement aux données envoyées par l'utilisateur lors des requêtes</b>.</p>
	<p>PHP ne peut agir que dans la fenêtre de temps entre l'envoi des données et l'affichage de la page, mais cela suffit pour faire des consultations de la base de données, gérer les formulaires, et potentiellement ré-écrire la page entière selon la situation.</p>
	<p class="warning">Pour faire notre premier pas dans l'interaction utilisateur, nous allons créer un formulaire de saisie, puis utiliser PHP pour gérer les données.</p>
	<hr>
	<p><a class="endlink" href="./exercice2.php">Aller sur la page suivante &gt;&gt;</a></p>
	<br>
	<br>

	<div class="footer">
		<hr>
		<p>WE40 - Initiation au développement web</p>
		<hr>
	</div>
</div>
</body>


</html> 