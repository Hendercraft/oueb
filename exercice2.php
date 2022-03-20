<!DOCTYPE html>
<html lang="fr">

<!-- La "tête" sert à définir des propriétés globales de la page -->
<head>
<meta charset="UTF-8">
<title>Un Formulaire Simple</title>
<link rel="stylesheet" href="./Styles/php_examples.css">
<link rel="stylesheet" href="./Styles/form_style.css">
</head>

<!-- Le "corps" de la page définit le contenu affiché dans la fenêtre du navigateur -->
<body>
<div id="MainContainer">

	<div class="header">
		<hr>
		<h1>Un formulaire simple</h1>
		<hr>
	</div>

	<p>Voici un formulaire très simple : nom et e-mail.</p>
	<p>La "destination" du formulaire est aussi cette page, mais comme la première fois, il n'y a pas de données, on peut le détecter et afficher le formulaire.</p>
	<p>Dit autrement, nous avons combiné la page d'envoi et de réception des données en une seule, ce qui ne pose pas de problème si on code correctement. <i>(il y a des cas où il est plus intéressant de les séparer)</i></p>
	<hr>
	
<?php
	//Vérifier si on a reçu des données
	$displayResults = false;
	
	if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["msg"]) ){
		$displayResults = true;
	}
	
	if ($displayResults == false){
	
		//En php, on se retrouve régulièrement à devoir faire de longs "echo". Il existe des techniques pour rendre ça plus lisible en séparant dans un
		//autre fichier, par exemple. Mais pour le moment, faisons tout ici. Conseil : écrivez d'abord le HTML, puis insérez-le dans un echo
		echo'
		<h3>Pas de données recues = le formulaire s\'affiche</h3>
		<form action="./exercice2.php" method="post">
		
			<div class="formbutton">Mon premier Formulaire</div>
			<div>
				<label for="name">Nom :</label>
				<input autofocus type="text" id="name" name="name">
			</div>
			<div>
				<label for="mail">E-mail :</label>
				<input type="email" id="mail" name="mail">
			</div>
			<div>
				<label for="msg">Message :</label>
				<textarea type="msg" id="msg" name="msg">Saisir ici votre message...</textarea>
			</div>
			<div class="formbutton">
				<button type="submit">Envoyer le formulaire</button>
			</div>
		</form>
		<hr>
		';

	}
	else {

		echo '
		<h3>Données reçues! Donc on ne raffiche pas le formulaire</h3>
		<div class="msg">
		<p><b>Affichage du message envoyé par '.$_POST["name"].' <i>( '.$_POST["mail"].' )</i> :</b></p>
		<p>'.$_POST["msg"].'</p>
		<hr>
		</div>
		<p>Bien sûr, juste ré-afficher des données que l\'on vient de saisir n\'est pas très intéressant. Mais cela nous permet de constater que PHP a accès à ces données.
		C\'est le point de départ de choses beaucoup plus intéressantes comme inscrire ces informations dans une base de données ou un mail automatique.</p>
		<p class="warning">ATTENTION : ce formulaire minimaliste est super vulnérable aux attaques! (spam, injections SQL...)</p>
		<p>Au fur et à mesure de votre parcours de conception de sites, vous découvrirez des techniques de cyber-sécurité de plus en plus avancées pour éviter ça. Mais chaque chose en son temps.</p>
		<p>Pour le moment, nous ne pouvons pas encore faire de stockage long terme de ces informations. Nous allons voir comment résoudre ce problème...</p>
		<hr>
		<p><a class="endlink" href="./exercice3.php">Aller sur la page suivante &gt;&gt;</a></p>
		<br>
		<br>
		';
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