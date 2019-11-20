<?php

// Lancement de la session
session_start();

// Constante des informations importante du site
const SITE_NAME = "FormerStudent";
const root_folder = "http://localhost/FormerProject/APP/";
const ressources_uri = root_folder."ressource";

// Constante pour les identifiants Gmail du site
const AdresseEmailSite = "former.student.project@gmail.com";
const PasswordEmailSite = "formerstudentproject";
const NameEmailSite = "FormerStudent";

// Include du model de base de données
require_once('model/connexionPDO.php');

// Include du appSession
require_once('appSession.php');

// Include des user models
require_once('model/user_model/user_management.php');
require_once('model/user_model/user.php');

// Include des event models
require_once('model/event_model/event_management.php');
require_once('model/event_model/event.php');

// Include des chat events
require_once('model/chat_model/chat_management.php');
require_once('model/chat_model/chat.php');

// Include du module pour l'envoie de mails
require_once('model/mail_model/PHPMailer.php');
require_once('model/mail_model/SMTP.php');

$session = new appSession();

// Fonction de chargement du header
function load_header() {
    include_once('view/include/header.php');
}

// Fonction du chargement du footer
function load_footer() {
    include_once('view/include/footer.php');
}

?>