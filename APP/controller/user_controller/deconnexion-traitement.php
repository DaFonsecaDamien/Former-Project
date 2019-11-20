<?php

    // Include du fichier de configuration
    require_once('../../appConfig.php');

    // Verification du cookie de l'utilisateur
    if(isset($_COOKIE['user'])) {
        // Effacement du cookie
        unset($_COOKIE['user']);
        setcookie('user', '', time() - 3600, '/');
        $session->create('message', 'Vous avez été déconnecté.');
        $session->create('message-box-icon', 'info');

    } else {

        $session->create('message', 'Erreur vous n\'étiez pas connecté.');
        $session->create('message-box-icon', 'error');
        
    }
    header('location: ' . root_folder . 'index.php');
?>
