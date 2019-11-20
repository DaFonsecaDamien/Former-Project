<?php 
	$session = new appSession();
?>

<!doctype html>
<html lang="fr-FR">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= SITE_NAME ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="<?= ressources_uri; ?>/img/icon/bubble.png">
  <!-- Place favicon.ico in the root directory -->
  <!--         
 ######   ######   ######  
##    ## ##    ## ##    ## 
##       ##       ##       
##        ######   ######  
##             ##       ## 
##    ## ##    ## ##    ## 
 ######   ######   ######   -->
  <!-- Debut importation CSS -->
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/bootstrap.min.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/owl.carousel.min.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/animate.min.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/magnific-popup.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/meanmenu.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/fontawesome-all.min.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/slick.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/dripicons.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/themify-icons.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/default.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/style.css?<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/responsive.css?<?php echo rand(); ?>">
  <!-- Fin d'importation du CSS -->
  <!--     
      ##  ######  
      ## ##    ## 
      ## ##       
      ##  ######  
##    ##       ## 
##    ## ##    ## 
 ######   ######       -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<!-- 
##    ##    ###    ##     ## ########     ###    ########  
###   ##   ## ##   ##     ## ##     ##   ## ##   ##     ## 
####  ##  ##   ##  ##     ## ##     ##  ##   ##  ##     ## 
## ## ## ##     ## ##     ## ########  ##     ## ########  
##  #### #########  ##   ##  ##     ## ######### ##   ##   
##   ### ##     ##   ## ##   ##     ## ##     ## ##    ##  
##    ## ##     ##    ###    ########  ##     ## ##     ##     -->
</head>
<!-- header-start -->
<header class="header-transparent">
  <div id="sticky-header" class="main-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-3 d-flex align-items-center">
          <div class="logo">
            <a href="<?= root_folder; ?>index.php"><img src="<?= ressources_uri; ?>/img/logo/greylogo.png" alt=""
                height="35px;" width="auto;" " /></a>
							</div>
						</div>
						
                        <div class=" main-menu text-right">
              <nav class="navbar navbar-expand-lg navbar-light bg-faded"
                style="font-family: 'Nunito Sans', sans-serif;">
                <!-- Vérification du cookie de l'utilisateur -->
                <!--     
##    ##  #######      ######   #######  
###   ## ##     ##    ##    ## ##     ## 
####  ## ##     ##    ##       ##     ## 
## ## ## ##     ##    ##       ##     ## 
##  #### ##     ##    ##       ##     ## 
##   ### ##     ##    ##    ## ##     ## 
##    ##  #######      ######   #######   -->
                <?php
      if(empty($_COOKIE['user'])) {
          ?>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?= root_folder; ?>index.php">Accueil <span
                          class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= root_folder; ?>view/event.php">Évenements</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= root_folder; ?>view/contact_form.php">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= root_folder; ?>/view/chat.php">Chat</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= root_folder; ?>view/access.php">Connexion/Inscription</a>
                    </li>

                  </ul>

                  <?php
                  
	} elseif($_COOKIE['role'] == 'ADMIN') {
    
	?>

                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="<?= root_folder; ?>index.php">Accueil <span
                            class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= root_folder; ?>view/event.php">Évenements </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= root_folder; ?>/view/chat.php">Chat</a>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Mon profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="<?= root_folder; ?>view/espace_membre.php">Modifier mon
                            profil</a>
                          <a class="dropdown-item" href="<?= root_folder; ?>view/admin.php">Panel admin</a>

                          <div class="dropdown-divider "></div>
                          <a class="dropdown-item"
                            href="<?= root_folder; ?>controller/user_controller/deconnexion-traitement.php"><span
                              style="color: red;">Deconnexion<span></a>
                        </div>
                      </li>



                      <li class="nav-item">
                        <a class="nav-link" href="<?= root_folder; ?>view/contact_form.php">Contact</a>
                      </li>


                    </ul>
                    <?php }else { ?>
  <!--  
 ######   #######  
##    ## ##     ## 
##       ##     ## 
##       ##     ## 
##       ##     ## 
##    ## ##     ## 
 ######   #######   -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                      aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="<?= root_folder; ?>index.php">Accueil <span
                              class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= root_folder; ?>view/event.php">Évenements </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= root_folder; ?>/view/chat.php">Chat</a>
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon profil
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= root_folder; ?>view/espace_membre.php">Modifier mon
                              profil</a>

                            <div class="dropdown-divider "></div>
                            <a class="dropdown-item"
                              href="<?= root_folder; ?>controller/user_controller/deconnexion-traitement.php"><span
                                style="color: red;">Deconnexion<span></a>
                          </div>
                        </li>



                        <li class="nav-item">
                          <a class="nav-link" href="<?= root_folder; ?>view/contact_form.php">Contact</a>
                        </li>


                      </ul>
                      <?php } ?>
                    </div>
              </nav>
          </div>

          <div class="mobile-menu"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    setTimeout(function () {
      document.getElementById("alert-message").remove();
    }, 3000);

    function alertRemove() {
      document.getElementById("alert-message").style.display = "none";
    }
  </script>

  <?php if($session->isValid('message')) { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: '<?php echo $session->flash('message-box-icon') ?>',
      title: '<?php echo $session->flash('message') ?>',
    })
  </script>

  <?php } ?>

</header>

<!-- header-end -->