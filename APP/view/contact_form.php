<?php 
    require_once("../appConfig.php"); 
    load_header();
    ?>

<!-- contact-form-area start -->
<div class="contact-form-area gray-bg pt-100 pb-100">
	<div class="container">
		<div class="form-wrapper">
			<div class="row align-items-center">
				<div class="col-xl-8 col-lg-8">
					<div class="section-title mb-55">

						<h1>Contactez nous</h1>
					</div>
				</div>
				<div class="col-xl-4 col-lg-3 d-none d-xl-block ">
					<div class="section-link mb-80 text-right">
						<a class="btn theme-btn" href="espace_membre.php">Mon profil</a>
					</div>
				</div>
			</div>
			<div class="contact-form">
				<form method="POST" action="<?= root_folder; ?>controller/mail_controller/sendMail-traitement.php">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-box user-icon mb-30">
								<input type="text" name="nom" placeholder="Votre nom complet">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-box email-icon mb-30">
								<input type="text" name="email" placeholder="Votre adresse e-mail">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-box email-icon mb-30">
								<input type="text" name="objet" placeholder="Objet du message">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-box message-icon mb-30">
							<textarea name="message" id="message" cols="30" rows="10"
								placeholder="Votre message"></textarea>
						</div>

					</div>

					<div class="center" style="font-size:30px;">
						<button type="submit" style="background-color: rgba(127, 217, 89, 0.83)"
							name="submitSendMailContact" class="btn theme-btn"></button>
					</div>
			</div>
			</form>
		</div>
		<div class="col-sm-6 col-md-6">

			<!-- Google Map -->
			<div class="map">
				<div class="api">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2620.2217469163493!2d2.4135205150536847!3d48.949263379296504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66b9c6b0800f7%3A0xa35833adc1739e08!2sLyc%C3%A9e%20Robert%20Schuman!5e0!3m2!1sfr!2sfr!4v1572355543911!5m2!1sfr!2sfr"
						width="1140px" height="300px" frameborder="0" style="border:0;"
						allowfullscreen=""></iframe></iframe> </div>
			</div>
			<!-- End of Google Map -->

		</div>

	</div>
</div>
</div>
<!-- contact-form-area end -->

<?php 
load_footer();
?>