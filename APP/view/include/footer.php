<?php
    $evenement = new event_management();
    $result = $evenement-> afficherFooterEvent();
?>

<!-- footer-area-start -->
<footer>
	<div class="footer-area pt-90 pb-60">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-6">
					<div class="footer-wrapper mb-30">
						<div class="footer-logo">
							<a href="index.html"><img src="<?= ressources_uri; ?>/img/logo/former.png" height="49px"
									width="auto" alt=""></a>
						</div>
						<div class="footer-text">
							<p>
								Ce site est réservé aux anciens étudiants du Lycée privé professionnel Robert Schuman
								souhaitant communiquer entre eux ainsi qu'avec tous leurs anciens professeurs et
								formateurs.
							</p>
						</div>
						<div class="footer-icon">
							<a href="https://www.facebook.com/robertschumandugny"><i class="fab fa-facebook-f"></i></a>

						</div>
					</div>
				</div>
								<!-- 					
 ######  ######## ########  ##     ## ####  ######  ########  ######  
##    ## ##       ##     ## ##     ##  ##  ##    ## ##       ##    ## 
##       ##       ##     ## ##     ##  ##  ##       ##       ##       
 ######  ######   ########  ##     ##  ##  ##       ######    ######  
      ## ##       ##   ##    ##   ##   ##  ##       ##             ## 
##    ## ##       ##    ##    ## ##    ##  ##    ## ##       ##    ## 
 ######  ######## ##     ##    ###    ####  ######  ########  ######  					 -->
				<div class="col-xl-3 col-lg-3 col-md-6">
					<div class="footer-wrapper pl-30 mb-30" style="margin-left: 90px;">
						<h3 class="footer-title">Services</h3>
						<ul class="footer-menu">
							<li><a href="http://www.lyceerobertschuman.com/">Site web du Lycée</a></li>
							<li><a href="https://0931573e.index-education.net/pronote/eleve.html">Pronote Élève</a></li>
							<li><a href="https://0931573e.index-education.net/pronote/profeseur.html">Pronote
									Professeur</a></li>
							<li><a href="https://0931573e.index-education.net/pronote/parent.html">Pronote Parents</a>
							</li>
							<li><a href="https://youtube.com/watch?v=5fQu2KygRL0&feature=youtu.be">Vidéo</li>

						</ul>
					</div>
				</div>
				<!-- 					
######## ##     ## ######## ##    ## ######## 
##       ##     ## ##       ###   ##    ##    
##       ##     ## ##       ####  ##    ##    
######   ##     ## ######   ## ## ##    ##    
##        ##   ##  ##       ##  ####    ##    
##         ## ##   ##       ##   ###    ##    
########    ###    ######## ##    ##    ##     -->
				<div class="col-xl-3 col-lg-3 col-md-6">
					<div class="footer-wrapper mb-30">
						<h3 class="footer-title">Derniers évenements</h3>
						<ul class="footer-list">

							<?php foreach($result as $event) {
						
						//add condition vérification id (prendre les deux derniers)
						?>

							<li>
								<div class="footer-info">
									<h5><a href="<?= root_folder; ?>view/event.php"><?php echo $event['contenu']; ?></a>
									</h5>
									<div class="footer-meta">
										<span> <i class="fas fa-calendar-alt"></i><?php echo $event['titre']; ?></span>
										<span> <i class="fas fa-calendar-alt"></i><?php echo $event['date']; ?></span>
									</div>
								</div>
							</li>
							<?php } ?>

						</ul>
					</div>
				</div>
								<!-- 					
 ######   #######  ##    ## ########    ###     ######  ######## 
##    ## ##     ## ###   ##    ##      ## ##   ##    ##    ##    
##       ##     ## ####  ##    ##     ##   ##  ##          ##    
##       ##     ## ## ## ##    ##    ##     ## ##          ##    
##       ##     ## ##  ####    ##    ######### ##          ##    
##    ## ##     ## ##   ###    ##    ##     ## ##    ##    ##    
 ######   #######  ##    ##    ##    ##     ##  ######     ##    					 -->
				<div class="col-xl-3 col-lg-3 col-md-6">
					<div class="footer-wrapper pl-40 mb-30">
						<h3 class="footer-title">Nous contacter</h3>
						<ul class="contact-link">
							<li>
								<div class="contact-address-icon">
									<i class="fas fa-home"></i>
								</div>
								<div class="contact-address-text">
									<h4>Notre établissement</h4>
									<p>5 av du Général de Gaulle<br> 93440 Dugny</p>
								</div>
							</li>
							<li>
								<div class="contact-address-icon">
									<i class="far fa-envelope-open"></i>
								</div>
								<div class="contact-address-text">
									<h4>E-mail</h4>
									<p>jm.fizaine@lyceerobertschuman.com</p>
								</div>
							</li>
							<li>
								<div class="contact-address-icon">
									<i class="fas fa-headphones"></i>
								</div>
								<div class="contact-address-text">
									<h4>Nous appeller</h4>
									<p>0148377426</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom pb-20">
		<div class="container">
			<div class="footer-border">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12">
						<div class="copyright" style="position: absolute;">
							<p><i class="far fa-copyright"></i> 2019 FORMER. All Rights Reserved. Coding by Damien and
								Mabiance</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- footer-area-end -->

	<!-- Modal Search -->
	<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form>
					<input type="text" placeholder="Search here...">
					<button>
						<i class="fa fa-search"></i>
					</button>
				</form>
			</div>
		</div>
	</div>

	<!-- JS here -->
	<script src="<?= ressources_uri; ?>/js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/waypoints.min.js"></script>


	<script src="<?= ressources_uri; ?>/js/popper.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/jquery.counterup.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/jquery.countdown.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/bootstrap.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/owl.carousel.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/isotope.pkgd.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/jquery.meanmenu.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/slick.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/ajax-form.js"></script>
	<script src="<?= ressources_uri; ?>/js/wow.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/jquery.scrollUp.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= ressources_uri; ?>/js/plugins.js"></script>
	<script src="<?= ressources_uri; ?>/js/main.js?<?php echo rand(); ?>">
		">
	</script>
</footer>

</html>