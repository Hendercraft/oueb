<?php
    //Pour qu'un code puisse réaliser une redirection, il doit se trouver avant le premier mot de HTML (à priori, "<!DOCTYPE")
    //Si on a reçu, via formulaire POST, une valeur "logout" égale à ok, alors on logge out et on redirige
    if ( isset($_POST["logout"]) && $_POST["logout"]=="ok" ){

        //Effacer les variables cookies (pas obligatoire mais évite parfois des problèmes)
        unset($_COOKIE['name']); unset($_COOKIE['password']);

        //Pour effacer les fichiers texte de cookie, on les ré-écrit avec une "date de péremption" négative
        setcookie('name', null, -1, '/'); 
        setcookie('password', null, -1, '/');

        //Effectuer redirection
        header("Location:exercice3.php");
    }

?>

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
		<h1>Une page visible seulement si loggé</h1>
		<hr>
	</div>

	<p>Voici une page qui va afficher si je suis loggé ou non, alors que le processus de login lui même a eu lieu sur une autre page.</p>
    <hr>
	
    <?php
	//Données via le cookie?
	if ( isset( $_COOKIE["name"] ) && isset( $_COOKIE["password"] ) ) {
		$name = $_COOKIE["name"];
		$password = $_COOKIE["password"];
	}
	
	//le login est considéré raté par défaut...
	$loginSuccessful = false;

	//Si on a des données, on vérifie qu'elles collent au login attendu
	if ( isset($name) && isset($password) ){
		$loginSuccessful = ($name == "UTBM") && ($password == md5("WEB"));
	}
	
	if ($loginSuccessful == false){
		echo '<h3 class="warning">Vous êtes venu sur cette page sans login!</h3>';
        echo '
        <p>Retournez à la page précédente et effectuez le logic pour voir le contenu de cette page.</p>
        <p>Ce système de vérification n\'est pas le plus optimum qui soit, mais il est simple, et si on encode les mots de passe en md5 il y a une protection (très basique) contre le piratage.</p>
        <p>Nous ne donnons pas ici un cours de cyber-sécurité, donc cette protection n\'est pas suffisante pour protéger des données financières sensibles. Mais c\'est un strict minimum que nous allons utiliser
        pour que vous intégriez l\'importance de ce problème le plus tôt possible.</p>
        <p>Allez à la page suivante pour constater que vous êtes toujours loggé, puis découvrir le bouton de déconnexion</p>
        <hr>
        <p><a class="backlink" href="./exercice3.php">&lt;&lt; Retour à la page précédente</a></p>
        <br>
        <br>
        ';
	}
    else {
        echo '<h3>Vous êtes venu sur cette page loggé, bien!</h3>';
        echo '
        <p>Pour conclure, nous allons voir comment nous pouvons nous "délogger", et aussi comment nous pouvons utiliser PHP pour rediriger "de force" l\'utilisateur sur une autre page</p>
        <p>Pour cela, nous allons créer un formulaire... qui ne contient qu\'un bouton tout seul (en apparence, car il contient aussi une propriété invisible).</p>
        <p>Les propriétés invisibles peuvent être modifiées via PHPO et peuvent donc s\'avérer utile pour communiquer des informations à l\'insu de l\'utilisateur <i>(pour la sécurité, pas pour le tromper!)</i></p>
        <p>La destination de ce formulaire est cette page. Une fois qu\'elle reçoit le formulaire, elle détruit le cookie et nous redirige sur la page "exercice3" automatiquement.</p>
        <form action="./exercice4.php" method="post">	
            <input type="hidden" id="logout" name="logout" value="ok">
            <div class="formbutton">
                <button type="submit">Cliquez ici pour vous délogger</button>
            </div>
	    </form>
        <hr>
        <p><a class="backlink" href="./exercice3.php">&lt;&lt; Retour à la page précédente</a></p>
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