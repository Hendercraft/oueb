<!DOCTYPE html>
<html lang="fr">

<!-- La "tête" sert à définir des propriétés globales de la page -->
<head>
<meta charset="UTF-8">
<title>Un Système de Login Simple</title>
<link rel="stylesheet" href="./Styles/php_examples.css">
<link rel="stylesheet" href="./Styles/form_style.css">
</head>

<!-- Le "corps" de la page définit le contenu affiché dans la fenêtre du navigateur -->
<body>
<div id="MainContainer">

	<div class="header">
		<hr>
		<h1>Un système (simpliste) de Login</h1>
		<hr>
	</div>

	<p>Voici un formulaire proche du précédent, qui demande un login et un mot de passe.</p>
	<p>La principale différence avec la dernière fois est que nous voulons nous SOUVENIR que nous sommes loggés. Ainsi, une fois que l'utilisateur aura saisi son login,
	il restera connecté jusqu'à nouvel ordre et/ou pendant un certain temps.</p>
	<p class="warning">Il y a plusieurs manières d'accomplir cet objectif. Celle que nous verrons aujourd'hui est le login stocké via COOKIES</p>
	<p>Les "Cookies" designent de petits fichiers textes stockés chez le client et qui peuvent renvoyer des informations au serveur. Il sont une manière de stocker de l'information
	"entre les pages". Ce qui est nécessaire ici. <i>( sinon, le login serait perdu d'une page à l'autre! )</i> </p>
	<p>Normalement, un système de login demande une base de données pour stocker les comptes et leurs mots de passe envryptés. Mais ici, nous allons créer un système qui attend spécifiquement le login "UTBM" et mot de passe "WEB" pour donner l'accès.</p>
	<hr>
	
<?php
	//Données reçues via formulaire?
	if(isset($_POST["name"]) && isset($_POST["password"])){
		$name = $_POST["name"];
		$password = md5($_POST["password"]);
		$loginAttempted = true;
	}
	//Données via le cookie?
	elseif ( isset( $_COOKIE["name"] ) && isset( $_COOKIE["password"] ) ) {
		$name = $_COOKIE["name"];
		$password = $_COOKIE["password"];
		$loginAttempted = true;
	}
	else {
		$loginAttempted = false;
	}
	
	//le login est considéré raté par défaut...
	$loginSuccessful = false;

	//Si on a des données, on vérifie qu'elles collent au login attendu
	if ( isset($name) && isset($password) ){
		$loginSuccessful = ($name == "UTBM") && ($password == md5("WEB"));
	}
	
	//En PHP, il est possible d'intercaler du HTML avec le code.
	//Si on le fait, le HTML ne sera affiché que si l'éxécution du code atteint cet endroit (équivaut à un "echo")
	if ($loginSuccessful == false){
	
	if ($loginAttempted == false){
		echo '<h3>Pas de données recues = le formulaire s\'affiche</h3>';
	}
	else {
		echo '<h3 class="warning">Login tenté, mais Incorrect!</h3>';
	}


	?>
	<form action="./exercice3.php" method="post">
	
		<div class="formbutton">Mon premier Formulaire</div>
		<div>
			<label for="name">Login :</label>
			<input autofocus type="text" id="name" name="name">
		</div>
		<div>
			<label for="mail">Password :</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="formbutton">
			<button type="submit">Envoyer le formulaire</button>
		</div>
	</form>
	<hr>
	<?php

	}
	else {

	echo '<h3>Login réussi!</h3>';

	//On rafraîchit le cookie. Cette opération n'est pas très lourde et réinitialise le "timer" d'expiration du cookie
	setcookie('name', $name, time()+3600*24, '/', '', false, true);
    setcookie('password', $password, time()+3600*24, '/', '', false, true);

	?>
	<p>Maintenant, le nom et le mot de passe ont été sauvegardés dans un cookie. Lorsque l\'on recharge la page, on vérifie si le cookie existe, et si oui, on re-vérifie le mot de passe à partir de lui.</p>
	<p>Ce système de vérification n\'est pas le plus optimum qui soit, mais il est simple, et si on encode les mots de passe en md5 il y a une protection (très basique) contre le piratage.</p>
	<p>Nous ne donnons pas ici un cours de cyber-sécurité, donc cette protection n\'est pas suffisante pour protéger des données financières sensibles. Mais c\'est un strict minimum que nous allons utiliser
	pour que vous intégriez l\'importance de ce problème le plus tôt possible.</p>
	<p>Allez à la page suivante pour constater que vous êtes toujours loggé, puis découvrir le bouton de déconnexion</p>
	<hr>
	<p><a class="endlink" href="./exercice4.php">Aller sur la page suivante &gt;&gt;</a></p>
	<br>
	<br>
	<?php

	
}	

?>

	<div class="footer">
		<hr>
		<p>WE40 - Initiation au développement web</p>
		<hr>
	</div>
</div>
</body>


</html> 
		