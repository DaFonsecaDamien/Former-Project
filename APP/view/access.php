<?php 
	include("../appConfig.php"); 
	$page_name = 'Access';

	if(isset($_COOKIE['user'])){
		$session->create('message', 'Vous n\'avez pas accès a cette page');
		$session->create('message-box-icon', 'error');
		header('location: ' . root_folder . 'index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="<?= ressources_uri; ?>/css/styleform.css?<?php echo rand(); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?= ressources_uri; ?>/img/icon/bubble.png">

	<title><?= SITE_NAME ?></title>

	<script>

	</script>

</head>
	<!-- 
#### ##    ##  ######  
 ##  ###   ## ##    ## 
 ##  ####  ## ##       
 ##  ## ## ##  ######  
 ##  ##  ####       ## 
 ##  ##   ### ##    ## 
#### ##    ##  ######   -->
<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">

			<!-- Formulaire permettant l'inscription au site -->
			<form id="form-inscription" method="POST"
				action="<?= root_folder; ?>/controller/user_controller/inscription-traitement.php">
				<h1>Inscription</h1>
				<!-- <span>ou alors utilise ton adresse mail</span> -->
				<div class="input-group">
					<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"
						pattern="^[A-Za-z0-9_]{2,15}$" title="2 lettres minimum" required />
					<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"
						pattern="^[A-Za-z0-9_]{2,15}$" title="2 lettres minimum" required />
				</div>
				<input type="email" class="form-control" id="email" name="email"
					title=" L'odre pour un email correcte est le suivant: characters@characters.domain"
					pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required />
				<div class="input-group">
					<input type="password" class="form-control" id="password1" name="password1"
						placeholder="Mot de passe"
						title=" Le mot de passe doit contenir au minimum 8 charactere, avec au moins 1 chiffre, 1 majuscule et 1 minuscule"
						pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required />
					<input type="password" class="form-control" id="password2" name="password2"
						placeholder="Confirmer mot de passe"
						title=" Le mot de passe doit contenir au minimum 8 charactere, avec au moins 1 chiffre, 1 majuscule et 1 minuscule"
						pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
				</div>
				<div class="input-group">
					<input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Téléphone"
						title=" Le numéro doir commencer par 06 ou 07 et avoir au minimum 10 chiffres"
						pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" required>
					<input type="date" class="form-control" id="dateNaissance" name="dateNaissance"
						placeholder="Date de naissance" required>
				</div>
				<input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
				<a href="#" style="font-size:0.6rem;" id='signInLink'>Déjà un compte ?</a>
				<button>M'inscrire</button>
				<button onclick="history.go(-1)">Retour</button>
			</form>
			<!-- Fin du Formulaire d'inscription au site -->

		</div>
<!-- 
 ######   #######  
##    ## ##     ## 
##       ##     ## 
##       ##     ## 
##       ##     ## 
##    ## ##     ## 
 ######   #######   -->
		<div class="form-container sign-in-container">
			<!-- Formulaire permettant la connexion au site -->
			<form id="form-connexion" method="POST"
				action="<?= root_folder; ?>/controller/user_controller/connexion-traitement.php">
				<h1>Connexion</h1>

				<input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
				<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"
					required />
				<a href="<?= root_folder; ?>view/forgotPassword.php" style="font-size:0.6rem;">Mot de passe oublié ?</a>
				<a href="#" style="font-size:0.6rem;" id='signUpLink'>Pas encore de compte ?</a>
				<button>Connexion</button>
				<button onclick="history.go(-1)">Retour</button>
			</form>
			<!-- Fin du formulaire de connexion au site -->

		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Bienvenue!</h1><br>
					<h4>Pour nous rejoindre connecte toi avec tes informations personnelles s'il te plait</h4>
					<button class="ghost" id="signInBtn">Connexion</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Inscription!</h1><br>
					<h4>Entre tes infos personnelles pour commencer une une nouvelle histoire avec nous </h4>
					<button class="ghost" id="signUpBtn">M'inscrire</button>
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<script src="<?= ressources_uri; ?>/js/styleform.js"></script>
</footer>

</html>