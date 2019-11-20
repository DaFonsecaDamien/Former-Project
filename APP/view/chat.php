<?php
    include("../appConfig.php"); 
	load_header();
	
	if(isset($_COOKIE['user'])) {
		$profil = new user_management();
		$result = $profil->getUserConnected();
	}
?>

<main id="swup" class="transition-fade">
	<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex, nofollow">

		<title>Former-Chat</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="<?= ressources_uri; ?>/css/bootstrapChat.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="<?= ressources_uri; ?>/css/all.css?<?php echo rand(); ?>"
			integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="<?= ressources_uri; ?>/css/custom.css?<?php echo rand(); ?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css"
			href="<?= ressources_uri; ?>/js/jquery.mCustomScrollbar.min.css?<?php echo rand(); ?>">
		<link rel="stylesheet" type="text/css"
			src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>

	<body>

		<title>Chat</title>
		<!--Coded With Love By Mutiullah Samim-->

		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-8 col-xl- chat">
					<div class="card">
						<div class="card-header msg_head">

							<div class="d-flex bd-highlight">
								<div class="user_info">
									<img src="<?= ressources_uri; ?>/img/icon/white.png" alt="" height="50px;"
										width="auto;">
								</div>

							</div>

						</div>
						<div class="card-body msg_card_body">

							<?php
				$chatMessages = new chat_management();
				$resultChatMessages = $chatMessages->getAllChatMessage();
				?>

							<?php foreach($resultChatMessages as $Message): ?>
							<div class="msg_cotainer_send mb-3">
								<div class="row" style="padding-left:15px;">
									<div class="img_cont_msg">
										<img src="<?= ressources_uri; ?>/img/membres-avatars/<?php echo $Message['avatarUser']; ?>"
											class="rounded-circle user_img_msg">
									</div>
									<h4><span><?php echo $Message['pseudo']; ?></span></h4>
								</div>

								<p>
									<h5 style="color: grey;"><span>Objet : </span><?php echo $Message['objet']; ?></h5>
								</p>

								<h4><?php echo $Message['contenu']; ?></h4>
							</div>

							<?php endforeach; ?>

						</div>
						<div class="row"></div>
						<div class="card-footer">

							<form class=""
								action="<?= root_folder; ?>/controller/chat_controller/ajoutChat-traitement.php"
								method="post">

								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Pseudo:</span>
									</div>
									<?php if(isset($result)) { ?>
									<input type="text" class="form-control" id="pseudo" name="pseudo"
										value="<?= $result['nom'] ?>" readonly>
									<?php }else { ?>
									<input type="text" class="form-control" id="pseudo" name="pseudo" value=""
										placeholder="Entrez votre pseudo" required>
									<?php } ?>
									<div class="input-group-prepend">
										<span class="input-group-text">Objet:</span>
									</div>
									<input type="text" class="form-control" id="objet" name="objet" value=""
										placeholder="Objet de votre message" required>
								</div>
								<!-- <div class="input-group mb-3">
									
								</div> -->
								<div class="form-group">
									<!-- <label for="exampleFormControlTextarea1" style="color:#fff; font-size:16px;">Message:</label> -->
									<textarea class="form-control" placeholder="Votre message" id="contenu" rows="3"
										name="contenu"></textarea>
								</div>
								<a><button type="submit" id="submit" name="submit"
										class="btn btn-purple">Envoyer</button></a>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function () {
				$('#action_menu_btn').click(function () {
					$('.action_menu').toggle();
				});
			});
		</script>

		<script type="text/javascript" src="<?= ressources_uri; ?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?= ressources_uri; ?>/js/jquery.mCustomScrollbar.min.js.téléchargement">
		</script>
		<script type="text/javascript" src="<?= ressources_uri; ?>/js/ga.js"></script>
		<script type="text/javascript" src="<?= ressources_uri; ?>/js/bootstrapChat.min.js"></script>
		<script type="text/javascript" src="<?= ressources_uri; ?>/js/jquery.mousewheel.min.js"></script>



	</body>

	</html>
</main>