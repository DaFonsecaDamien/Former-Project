<?php 
    include("../appConfig.php"); 
    load_header();
   
    $evenement = new event_management();
    $result = $evenement-> afficherEvent();
?>


<!-- team-area start -->
<div class="team-area team-2 ">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
				<div class="section-title text-center mb-75">
					<span>Lycée Robert Schuman</span>
					<h1>Évenements</h1>
					<div class="section-img">
						<img src="<?= ressources_uri ?>/img/shape/section.png" alt="" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($result as $event) { ?>
			<div class="col-lg-3 col-md-6">
				<div class="team-item mb-40">
					<div class="team-item-image">
						<img src="<?php echo $event['photo']; ?>" alt="team member">
					</div>
					<div class="team-item-detail">
						<h4 class="team-item-name"><?php echo $event['titre']; ?></h4>
						<span class="team-item-role"><?php echo $event['contenu']; ?></span>
						<div class="team-social-icon">
							<a href="#"><i class="fa fa-calendar"></i> <?php echo $event['date']; ?></a>

						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

	</div>
</div>
<!-- team-area end -->

<?php 
    load_footer();
?>