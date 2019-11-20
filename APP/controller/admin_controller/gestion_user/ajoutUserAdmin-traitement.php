<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    // Inlcude du fichier de configuration du site
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['telephone']) || empty($_POST['dateNaissance']) || empty($_POST['adresse'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }
    // Verification de la bonne conformité des données
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
        $adresse = htmlspecialchars($_POST['adresse']);

    // Creation d'une chaine aléatoire
        $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789';
        $nb_lettres = strlen($chaine) - 1;
        $generation = '';
        
        for($i=0; $i < 10; $i++)
        {
            $pos = mt_rand(0, $nb_lettres);
            $car = $chaine[$pos];
            $generation .= $car;
        }
        $password = $generation;

        // Creation d'un nouvel objet "user" de type "user" avec l'envoie des données
        $user = new user([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password,
            'telephone' => $telephone,
            'adresse' => $adresse,
            'dateNaissance' => $dateNaissance,
        ]);

        // Creation d'un nouvel objet "add" de type "user_management"
        $add = new user_management();
        // Execution de la fonction addUserAsAdmin avec l'envoie des données de ($user)
        $ajoutUser = $add->addUserAsAdmin($user);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}