<!-- PHP Permettant la récupération des information de la SESSION actuel et le stockage dans une variable-->
<?php

    include("../appConfig.php");

    if(empty($_COOKIE['user'])){
      $session->create('message', 'Vous n\'avez pas accès a cette page');
      $session->create('message-box-icon', 'error');
      header('location: ' . root_folder . 'index.php');
    }elseif($_COOKIE['role'] == 'GUEST'){
      $session->create('message', 'Vous n\'avez pas accès a cette page');
      $session->create('message-box-icon', 'error');
      header('location: ' . root_folder . 'index.php');
    }

    $session = new appSession();

    $profil = new user_management();
    $result_user = $profil->getAllUser();

    $chat = new chat_management();
    $result_chat = $chat->getAllChatMessage();

    $event = new event_management();
    $result_event = $event->afficherEvent();

    $profilUserCo = new user_management();
    $resultUserCo = $profilUserCo->getUserConnected();

?>

<!-- Debut du HTML-->
<!doctype html>
<html lang="FR-fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>FormerStudent</title>
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Material Design Lite">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
  <link rel="stylesheet" href="<?= ressources_uri; ?>/css/stylesAdmin.css?<?php echo rand(); ?>">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <!-- Script pour le bon fonctionnement de la page---------->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    jQuery.noConflict()
  </script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <script src="<?= ressources_uri; ?>/js/site_function/adminFunction.js"></script>

  <link rel="stylesheet" type="text/css" href="<?= ressources_uri; ?>/DataTables/datatables.min.css" />
  <script type="text/javascript" src="<?= ressources_uri; ?>/DataTables/datatables.min.js"></script>

</head>

<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Espace Administrateur</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
          <i class="material-icons">power_settings_new</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
          <a class="mdl-menu__item" href="<?= root_folder; ?>index.php">Revenir sur le site</a>
          <a class="mdl-menu__item"
            href="<?= root_folder; ?>controller/user_controller/deconnexion-traitement.php">Déconnexion</a>
        </ul>
      </div>
    </header>

    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
      <header class="demo-drawer-header">
        <img src="<?= ressources_uri; ?>/img/membres-avatars/<?php echo $resultUserCo['avatar']; ?>" class="demo-avatar">
        <div class="demo-avatar-dropdown">
          <span> <?php echo $resultUserCo['email']; ?> </span>
          <div class="mdl-layout-spacer"></div>
<!-- 
##    ##    ###    ##     ## ########     ###    ########  
###   ##   ## ##   ##     ## ##     ##   ## ##   ##     ## 
####  ##  ##   ##  ##     ## ##     ##  ##   ##  ##     ## 
## ## ## ##     ## ##     ## ########  ##     ## ########  
##  #### #########  ##   ##  ##     ## ######### ##   ##   
##   ### ##     ##   ## ##   ##     ## ##     ## ##    ##  
##    ## ##     ##    ###    ########  ##     ## ##     ##  -->
          <!-- Bar de nav sur la gauche -->
      </header>
      <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        <a class="mdl-navigation__link" onclick="homePage()"><i class="mdl-color-text--blue-grey-400 material-icons"
            role="presentation">home</i>Home</a>
        <a class="mdl-navigation__link" onclick="userPage()"><i class="mdl-color-text--blue-grey-400 material-icons"
            role="presentation">people</i>Gestion des Utilisateus</a>
        <a class="mdl-navigation__link" onclick="chatPage()"><i class="mdl-color-text--blue-grey-400 material-icons"
            role="presentation">chat</i>Gestion du chat</a>
        <a class="mdl-navigation__link" onclick="eventPage()"><i class="mdl-color-text--blue-grey-400 material-icons"
            role="presentation">event</i>Gestion des evenements</a>
        <a class="mdl-navigation__link" onclick="mailPage()"><i class="mdl-color-text--blue-grey-400 material-icons"
            role="presentation">mail_outline</i>Mail</a>
        <div class="mdl-layout-spacer"></div>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
            role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
      </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
      <!-- Fin de la bar de nav sur la gauche -->

<!--       
######## ########  ########  ######## ##     ## ########  
##       ##     ## ##     ## ##       ##     ## ##     ## 
##       ##     ## ##     ## ##       ##     ## ##     ## 
######   ########  ########  ######   ##     ## ########  
##       ##   ##   ##   ##   ##       ##     ## ##   ##   
##       ##    ##  ##    ##  ##       ##     ## ##    ##  
######## ##     ## ##     ## ########  #######  ##     ##  -->
      <!-- BOX POUR LES MESSAGES DERREUR -->
      <script>
        setTimeout(function () {
          document.getElementById("alert-message").remove();
        }, 3000);

        function alertRemove() {
          document.getElementById("alert-message").style.display = "none";
        }
      </script>

      <?php if($session->isValid('message')) { ?>
      <div id="alert-message" style="padding-top: 15px; padding-bottom: 10px;" class="col-md-4 offset-4">
        <div class="alert <?= $session->flash('message-box-color'); ?> alert-dismissible fade show" role="alert">
          <?= $session->flash('message'); ?>
          <button onclick="alertRemove()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

      <?php } ?>

<!--         
##     ##  #######  ##     ## ######## 
##     ## ##     ## ###   ### ##       
##     ## ##     ## #### #### ##       
######### ##     ## ## ### ## ######   
##     ## ##     ## ##     ## ##       
##     ## ##     ## ##     ## ##       
##     ##  #######  ##     ## ######## -->
      <div id="home">
        <h1 style="text-align:center;"><strong> DashBoard</strong></h1>
        <h4 style="text-align:center;"><strong> Gestion du site FormerStudent</strong></h4>
        <div style="text-align:center;" class="row pt-1 pt-5">
          <div class="card mb-3 admincenter " style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= ressources_uri; ?>/img/icon/userCount.png" class=" imagenn" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Nombre d'utilisateurs inscrit</h5>
                  <p class="card-text number"><?= count($result_user); ?></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="text-align:center;" class="row">
          <div class="card mb-3 admincenter" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= ressources_uri; ?>/img/icon/eventCount.png" class=" imagenn" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Nombre d'évenements</h5>
                  <p class="card-text number"><?= count($result_event); ?></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="text-align:center;" class="row">
          <div class="card mb-3 admincenter" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= ressources_uri; ?>/img/icon/chatCount.png" class=" imagenn" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Nombre de message dans le chat</h5>
                  <p class="card-text number"><?= count($result_chat); ?></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- 
##     ##  ######  ######## ########   ######  
##     ## ##    ## ##       ##     ## ##    ## 
##     ## ##       ##       ##     ## ##       
##     ##  ######  ######   ########   ######  
##     ##       ## ##       ##   ##         ## 
##     ## ##    ## ##       ##    ##  ##    ## 
 #######   ######  ######## ##     ##  ######   -->
      <div id="gestion_user" style="display: none">
          <h1 style="margin-top:50px;text-align:center;"><strong>Liste des utilisateurs</strong></h1></br></br></br></br>
          <table id="gestion_user_table" class="display" style="width:100%">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>email</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Date de Naissance</th>
                <th>Date de connexion</th>
                <th>Etat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
                      foreach($result_user as $user)
                      {
                        $datetime1 = new DateTime($user['dateConnexion']); // Date dans le passé
                        $datetime2 = new DateTime(date("Y-m-d"));   // Date du jour
                        $interval = $datetime1->diff($datetime2); // Interval des deux jours
                      ?>
              <tr>
                <td id="nom" data-id1="<?= $user['id']; ?>" contenteditable> <?= $user['nom']; ?> </td>
                <td id="prenom" data-id2="<?= $user['id']; ?>" contenteditable><?= $user['prenom']; ?></td>
                <td id="email" data-id3="<?= $user['id']; ?>" contenteditable><?= $user['email']; ?></td>
                <td id="adresse" data-id4="<?= $user['id']; ?>" contenteditable><?= $user['adresse']; ?></td>
                <td id="telephone" data-id5="<?= $user['id']; ?>" contenteditable><?= $user['telephone']; ?></td>
                <td id="dateNaissance" data-id6="<?= $user['id']; ?>" contenteditable><?= $user['dateNaissance']; ?>
                </td>
                <td><?= $user['dateConnexion']; ?></td>

                <?php
                          if($user['dateConnexion'] == null){
                      ?>
                <td></td>
                <?php }elseif($interval->format('%a') > '7') { ?>
                <td> Inactif depuis <?= $interval->format('%a jours'); ?></td>
                <?php }else{ ?>
                <td> actif </td>
                <?php } ?>
                <td width=300>
                  <a class="btn btn-danger" data-id7="<?= $user['id']; ?>" id="btn_delete_user"><span
                      class="glyphicon glyphicon-remove"></span> Supprimer</a>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
            <td><input 
                type="texte" id="inputNom"
                placeholder="Nom" >
            </input></td>
            <td><input 
                type="texte" id="inputPrenom"  class="form-control"
                placeholder="Prenom" >
            </input></td>
            <td><input 
                type="email" id="inputEmail"  class="form-control"
                title=" L'odre pour un email correcte est le suivant: characters@characters.domain" 
                placeholder="Email">
            </input></td>
            <td><input 
                type="texte" id="inputAdresse"
                placeholder="Adresse">
            </input></td>
            <td><input 
                type="number" id="inputTelephone"
                placeholder="Telephone">
            </input></td>
            <td><input
                type="date" id="inputDateNaissance"
                placeholder="Date de Naissance">
            </input></td>
            <td><input 
                type="texte" disabled
                placeholder="Date de connexion">
            </input></td>
            <td><input 
                type="texte" disabled
                placeholder="Etat">
            </input></td>
            <td><a class="btn btn-primary" id="btn_add_user"><span class="glyphicon glyphicon-remove"></span>Ajouter</a>
            </td>
          </table>
      </div>
<!--           
 ######  ##     ##    ###    ######## 
##    ## ##     ##   ## ##      ##    
##       ##     ##  ##   ##     ##    
##       ######### ##     ##    ##    
##       ##     ## #########    ##    
##    ## ##     ## ##     ##    ##    
 ######  ##     ## ##     ##    ##     -->
      <div id="gestion_chat" style="display: none">
          <h1 style="margin-top:50px;text-align:center;"><strong>Liste des messages du chat : </strong></h1></br></br></br></br>
          <table id="gestion_chat_table" class="display" style="width:100%">
            <thead>
              <tr>
                <th>Pseudo</th>
                <th>Objet</th>
                <th>Contenu</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
                      foreach($result_chat as $message)
                      {
                      ?>
              <tr>
                <td id="pseudo" data-id1="<?= $message['id']; ?>" contenteditable><?= $message['pseudo']; ?> </td>
                <td id="objet" data-id2="<?= $message['id']; ?>" contenteditable><?= $message['objet']; ?></td>
                <td id="contenuChat" data-id3="<?= $message['id']; ?>" contenteditable><?= $message['contenu']; ?></td>
                <td width=300>
                  <a class="btn btn-danger" data-id4="<?= $message['id']; ?>" id="btn_delete_chat"><span
                      class="glyphicon glyphicon-remove"></span> Supprimer</a>
                </td>
              </tr>

              <?php } ?>
            </tbody>
            <td><input 
                type="texte" id="inputPseudo" disabled
                placeholder="Pseudo">
            </input></td>
            <td><input 
                type="texte" id="inputObjet"
                placeholder="Objet">
            </input></td>
            <td><input 
                type="texte" id="inputContenuChat"
                placeholder="Contenu">
            </input></td>
            <td><a class="btn btn-primary" id="btn_add_chat"><span class="glyphicon glyphicon-remove"></span>Ajouter</a>
            </td>
          </table>
      </div>
<!--           
######## ##     ## ######## ##    ## ######## 
##       ##     ## ##       ###   ##    ##    
##       ##     ## ##       ####  ##    ##    
######   ##     ## ######   ## ## ##    ##    
##        ##   ##  ##       ##  ####    ##    
##         ## ##   ##       ##   ###    ##    
########    ###    ######## ##    ##    ##     -->
      <div id="gestion_event" style="display: none">
          <h1 style="margin-top:50px;text-align:center;"><strong>Liste des évenements : </strong></h1></br></br></br></br>
          <table id="gestion_event_table" class="display" style="width:100%">
            <thead>
              <tr>
                <th>Date</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
                      foreach($result_event as $event)
                      {
                      ?>
              <tr>
                <td id="date" data-id1="<?= $event['id']; ?>" contenteditable><?= $event['date']; ?></td>
                <td id="titre" data-id2="<?= $event['id']; ?>" contenteditable><?= $event['titre']; ?></td>
                <td id="contenu" data-id3="<?= $event['id']; ?>" contenteditable><?= $event['contenu']; ?></td>
                <td id="photo" data-id4="<?= $event['id']; ?>" contenteditable><?= $event['photo']; ?></td>
                <td width=300>
                  <a class="btn btn-danger" data-id5="<?= $event['id']; ?>" id="btn_delete_event"><span
                      class="glyphicon glyphicon-remove"></span> Supprimer</a>
                </td>
              </tr>
              <?php
                        }
                      ?>
            </tbody>
            <td><input 
                type="date" id="inputDate"
                placeholder="Date">
            </input></td>
            <td><input 
                type="texte" id="inputTitre"
                placeholder="Titre">
            </input></td>
            <td><input 
                type="texte" id="inputContenuEvent"
                placeholder="Evenement">
            </input></td>
            <td><input 
                type="texte" id="inputPhoto"
                placeholder="Photo avec URL">
            </input></td>
            <td><a class="btn btn-primary" id="btn_add_event"><span
                  class="glyphicon glyphicon-remove"></span>Ajouter</a></td>
          </table>
      </div>
<!-- 
##     ##    ###    #### ##       
###   ###   ## ##    ##  ##       
#### ####  ##   ##   ##  ##       
## ### ## ##     ##  ##  ##       
##     ## #########  ##  ##       
##     ## ##     ##  ##  ##       
##     ## ##     ## #### ########   -->
      <div id="gestion_mail" style="display: none;">
          <h1 style="margin-top:50px;text-align:center;"><strong>Page de mail</strong></h1>
          <!-- Form Started -->
          <div class="container form-top">
            <div class="row" >
              <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                <div class="panel panel-danger">
                  <div class="panel-body">
                    <!-- Formulaire  pour l'envoie de mail -->
                    <form id="mail_form" action="<?= root_folder; ?>/controller/mail_controller/sendMail-traitement.php"
                      method="POST">
                      <div class="form-group">
                        <label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                        <label><i class="fa fa-comment" aria-hidden="true"></i> Message</label>
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                        <textarea rows="3" name="message" class="form-control"
                          placeholder="Type Your Message"></textarea>
                      </div>

                      <div class="form-group">
                        <button type="submit" name="submitSendMailAdmin"
                          class="btn btn-raised btn-block btn-danger">Post →</button>
                      </div>
                    </form>
                    <!-- Formulaire  pour l'envoie de mail -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Form Ended -->
      </div>

    </main>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</body>

</html>