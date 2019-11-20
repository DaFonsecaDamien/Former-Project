<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de configuration
    require_once('../../appConfig.php');

    /* verification que l'utilisateur n'est pas connecté */
    if(isset($_COOKIE['user'])) {
        $session->create('message', 'Vous etiez déjà connecté.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'index.php');
    }
    // Vérification pour savoir si le formulaire a bien été remplit
    elseif(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['telephone']) || empty($_POST['dateNaissance']) || empty($_POST['adresse']) ) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'index.php');
    }else {

        // Verification de la bonne conformité des données
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password1 = htmlspecialchars($_POST['password1']);
        $password2 = htmlspecialchars($_POST['password2']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
        $adresse = htmlspecialchars($_POST['adresse']);

        // Verification pour savoir si les deux mdp sont identique
        if ($_POST['password1'] != $_POST['password2']) {
            $session->create('message', 'Erreur les mots de passe sont différents.');
            $session->create('message-box-icon', 'error');
            header('location: ' . root_folder . 'index.php');
        }else {

            // Creation d'un nouvel objet "user" de type "user" avec l'envoie des données
            $user = new user([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $password1,
                'telephone' => $telephone,
                'adresse' => $adresse,
                'dateNaissance' => $dateNaissance,
            ]);

            // Creation d'un nouvel objet "add" de type "user_management"
            $add = new user_management();
            // Execution de la fonction addUser avec l'envoie des données de ($user)
            $inscription = $add->addUser($user);

            // Si la connexion fonctionne redirection sinon erreur
            if ($inscription == 0) {
                $session->create('message', 'Erreur, cette email est déja utilisé.');
                $session->create('message-box-icon', 'error');
                header('location: ' . root_folder . 'index.php');
            } else {
                $session->create('message', 'Inscription réussi.');
                $session->create('message-box-icon', 'success');
                header('location: ' . root_folder . 'index.php');
            }
        }
    }
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}