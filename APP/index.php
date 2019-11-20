    <?php 
    require_once("appConfig.php"); 
    load_header();
    ?>
    <?php
    if(empty($_COOKIE['user'])) {
    ?>
    <!-- slider-start -->
    <div class="slider-area slider">
        <div class="banner-img" style="padding-top: 13vh; " style="margin-right: 8vh;">
            <img class="bounce-animate" src="<?= ressources_uri; ?>/img/slider/test2.png" height="auto" width="620px"
                alt="" />
        </div>
        <div class="slider-icon d-none d-xl-block">
            <span class="slider-dotted sd-one"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-two"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-three"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-four"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
        </div>
        <div class="slider-active">
            <div class="single-slider d-flex align-items-center">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-8">
                            <div class="slider-content">
                                <h1 data-animation="fadeInUp" data-delay=".5s"><b>Ta communauté t'attend !</b></h1>
                                <span data-animation="fadeInUp" data-delay=".3s" style="font-size:19px;">Forum d'anciens
                                    élèves du Lycée Robert Schuman</span>

                                <div class="slider-button">
                                    <a class="btn" href="<?= root_folder; ?>/view/access.php"
                                        data-animation="fadeInLeft" data-delay=".9s" style="font-size: 28px;">Connexion
                                        <i class="dripicons-arrow-thin-right"></i></a>
                                    <a class="btn btn-yellow active" href="<?= root_folder; ?>/view/access.php"
                                        data-animation="fadeInRight" data-delay="1.1s"
                                        style="font-size: 18px;">Inscription
                                        <i class="dripicons-arrow-thin-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-start -->

    <!-- counter-area-start -->
    <div class="counter-area pt-135 pb-120" style="background-image:url(<?= ressources_uri; ?>/img/bg/counter.png)">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="counter-wrapper text-center mb-30">
                        <div class="counter-text">
                            <h1 class="counter">254</h1>
                            <span><b>Anciens étudiants</b></span>
                        </div>
                        <div class="counter-img">
                            <img src="<?= ressources_uri; ?>/img/shape/border2.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="counter-wrapper text-center mb-30">
                        <div class="counter-text">
                            <h1 class="counter">250</h1>
                            <span><b>Etudiants satisfaits</b> </span>
                        </div>
                        <div class="counter-img">
                            <img src="<?= ressources_uri; ?>/img/shape/border2.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="counter-wrapper text-center mb-30">
                        <div class="counter-text">
                            <h1 class="counter">36</h1>
                            <span><b>Années d'expériences</b></span>
                        </div>
                        <div class="counter-img">
                            <img src="<?= ressources_uri; ?>/img/shape/border2.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="counter-wrapper text-center mb-30">
                        <div class="counter-text">
                            <h1 class="counter">57</h1>
                            <span><b>Professeurs conquis</b></span>
                        </div>
                        <div class="counter-img">
                            <img src="<?= ressources_uri; ?>/img/shape/border2.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter-area-end -->

    <!-- promo-area-start	 -->
    <div class="promo-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="promo-img  mb-30" style="margin-right: 9vh;">
                        <img class="bounce-animate" src="<?= ressources_uri; ?>/img/bg/test.png" height="auto"
                            width="600px" alt="" />
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <div class="promo-wrapper mb-30">
                        <div class="promo-text">
                            <h1>Rejoins Vite La <br> Communauté SCHUMAN</h1>
                            <p>Ce site est réservé aux anciens étudiants du Lycée privé professionnel Robert Schuman
                                souhaitant communiquer entre eux ainsi qu'avec tous leurs anciens professeurs et
                                formateurs.</p>
                            <ul class="promo-link">
                                <li><i class="far fa-check-circle"></i> Chat avec tes anciens camarades de classe
                                </li>
                                <li><i class="far fa-check-circle"></i> Fais de nouvelles connaissances</li>
                                <li><i class="far fa-check-circle"></i> Tous tes professeurs à ton écoute</li>
                                <li><i class="far fa-check-circle"></i> Sois au courant de tout et tout le temps
                                    <br> Rejoins nous vite
                                </li>
                            </ul>
                            <a class="btn" href="<?= root_folder; ?>/view/access.php">Inscription <i
                                    class="dripicons-arrow-thin-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- promo-area-end	 -->

    <?php
    } elseif($_COOKIE['role'] == 'ADMIN') {
    ?>

    <!-- slider-start -->
    <div class="slider-area slider">
        <div class="banner-img" style="margin-right: 8vh;">
            <img class="bounce-animate" src="<?= ressources_uri; ?>/img/slider/indexetu.png" height="auto" width="620px"
                alt="" />
        </div>
        <div class="slider-icon d-none d-xl-block">
            <span class="slider-dotted sd-one"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-two"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-three"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-four"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
        </div>
        <div class="slider-active">
            <div class="single-slider d-flex align-items-center">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-8">
                            <div class="slider-content">
                                <h1 data-animation="fadeInUp" data-delay=".5s"><b>Bienvenue sur : l'espace
                                        administrateur</b></h1>
                                <span data-animation="fadeInUp" data-delay=".3s" style="font-size:19px;">Forum d'anciens
                                    élèves du Lycée Robert Schuman</span>

                                <div class="slider-button">
                                    <a class="btn" href="<?= root_folder; ?>/view/event.php" data-animation="fadeInLeft"
                                        data-delay=".9s" style="font-size: 28px;">Agenda <i
                                            class="dripicons-arrow-thin-right"></i></a>
                                    <a class="btn btn-yellow active" href="" data-animation="fadeInRight"
                                        data-delay="1.1s" style="font-size: 18px;">Chat <i
                                            class="dripicons-arrow-thin-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-start -->

    <?php }else{ ?>

    <!-- slider-start -->
    <div class="slider-area slider">
        <div class="banner-img" style="margin-right: 8vh;">
            <img class="bounce-animate" src="<?= ressources_uri; ?>/img/slider/indexetu.png" height="auto" width="620px"
                alt="" />
        </div>
        <div class="slider-icon d-none d-xl-block">
            <span class="slider-dotted sd-one"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-two"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-three"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
            <span class="slider-dotted sd-four"><img src="<?= ressources_uri; ?>/img/slider/buble.png" alt="" /></span>
        </div>
        <div class="slider-active">
            <div class="single-slider d-flex align-items-center">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-8">
                            <div class="slider-content">
                                <h1 data-animation="fadeInUp" data-delay=".5s"><b>Bienvenue sur : l'espace étudiant</b>
                                </h1>
                                <span data-animation="fadeInUp" data-delay=".3s" style="font-size:19px;">Forum d'anciens
                                    élèves du Lycée Robert Schuman</span>

                                <div class="slider-button">
                                    <a class="btn" href="<?= root_folder; ?>/view/event.php" data-animation="fadeInLeft"
                                        data-delay=".9s" style="font-size: 28px;">Agenda <i
                                            class="dripicons-arrow-thin-right"></i></a>
                                    <a class="btn btn-yellow active" href="" data-animation="fadeInRight"
                                        data-delay="1.1s" style="font-size: 18px;">Chat <i
                                            class="dripicons-arrow-thin-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-start -->

    <?php } ?>
    <?php 
        //include("view/include/footer.php"); 
        load_footer();
        ?>