<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Inlcude du fichier de configuration
    require_once('../../appConfig.php');


    // Vérification du COOKIE de l'utilisateur avec initialisation d"un message d'erreur si déja connecté
    if(isset($_COOKIE['user'])) {
        $session->create('message', 'Vous etes déjà connecté.');
        $session->create('message-box-icon', 'warning');
        header('location: ' . root_folder . 'index.php');
    }

    // Vérification du bon envoie des données
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'index.php');
    }

    //Definition des variables avec une fonction anti injection SQL
    $email = $_POST['email'];
    $password = htmlspecialchars($_POST['password']);


    // Creation d'un nouvel objet "user" de type "user" avec l'envoie des données
    $user = new user([
        'email' => $email,
        'password' => $password
    ]);

    // Creation d'un nouvel objet "login" de type "user_management"
    $login = new user_management();
    // Execution de la fonction login avec l'envoie des données de ($user)
    $result = $login->login($user);

    if($result) {
        // Vérification du role de l'utilisateur
        if($result['role'] == 'GUEST') {
            // Ajout date de connexion
            $login->AddDateConnect($result['id']);
            $session->create('message', 'Connexion réussie.');
            $session->create('message-box-icon', 'success');
            //Ajout cookie
            setcookie('user', $result['id'], time() + 86400, '/');
            setcookie('role', $result['role'], time() + 86400, '/');
            header('location: ' . root_folder . 'index.php');
        }elseif($result['role'] == 'ADMIN') {
            //Ajout date de connexion
            $login->AddDateConnect($result['id']);
            $session->create('message', 'Connexion en tant que Admin, DashBoard dans votre profil !');
            $session->create('message-box-icon', 'success');
            //Ajout cookie
            setcookie('user', $result['id'], time() + 86400, '/');
            setcookie('role', $result['role'], time() + 86400, '/');
            header('location: ' . root_folder . 'index.php');
        }
    } else {
        $session->create('message', 'Erreur lors de la connexion, merci de ré-essayer.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'index.php');
    }
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}