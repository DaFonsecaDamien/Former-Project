<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de configuration
    require_once('../../appConfig.php');

    /* verification que l'utilisateur n'est pas connecté */
    if(empty($_COOKIE['user'])) {
        $session->create('message', 'Vous n\'avez pas accès a cette page');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'index.php');
    }

    // Verification pour savoir d'ou proviennent les données envoyé de la modif
    if(isset($_POST['submitModifInfo'])) {
        // Vérification pour savoir si le formulaire a bien été remplit
        if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['telephone']) || empty($_POST['dateNaissance']) || empty($_POST['adresse']) ) {
            $session->create('message', 'Erreur, un des champs est manquant.');
            $session->create('message-box-icon', 'error');
            header('location: ' . root_folder . 'index.php');
        }else {
            // Verificcation du fichier envoyé
            if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
                $tailleMax = 2097152;
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                // Verification de la taille du fichier
                if ($_FILES['avatar']['size'] <= $tailleMax) {
                    $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                    // Verification de l'extension du fichier
                    if (in_array($extensionUpload, $extensionsValides)) {
                        $chemin = $_SERVER["DOCUMENT_ROOT"] . "/FormerProject/APP/ressource/img/membres-avatars/" . $_COOKIE['user'] . "." . $extensionUpload;
                        $tmp_name = $_FILES['avatar']['tmp_name'];
                        $resultat = move_uploaded_file($tmp_name, $chemin);
                        if ($resultat) {

                            $avatar = $_COOKIE['user'] . "." . $extensionUpload;
                            // Creation d'un nouvel objet "userAvatar" de type "user" avec l'envoie des données
                            $userAvatar = new user([
                                'avatar' => $avatar,
                            ]);

                            // Creation d'un nouvel objet "modifAvatar" de type "user_management"
                            $modifAvatar = new user_management();
                            // Execution de la fonction ModificationAvatar avec l'envoie des données de ($userAvatar)
                            $modifAvatar->ModificationAvatar($userAvatar);

                        } else {
                            $session->create('message', 'Erreur durant l\'importation de votre photo de profil');
                            $session->create('message-box-icon', 'error');
                            header('location: ' . root_folder . 'index.php');
                        }
                    } else {
                        $session->create('message', 'Votre photo de profil doit être au format jpg, jpeg, gif ou png');
                        $session->create('message-box-icon', 'error');
                        header('location: ' . root_folder . 'index.php');
                    }
                } else {
                    $session->create('message', 'Votre photo de profil ne doit pas dépasser 2Mo');
                    $session->create('message-box-icon', 'error');
                    header('location: ' . root_folder . 'index.php');
                }
            }

            // Vérification du bon envoie des données
            if(empty($_POST['objet']) || empty($_POST['contenuChat'])) {
                $session->create('message', 'Erreur, un des champs est manquant.');
                $session->create('message-box-icon', 'error');
                header('location: ' . root_folder . 'view/admin.php');
            }
            // Verification de la bonne conformité des données
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $email = htmlspecialchars($_POST['email']);
            $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
            $adresse = htmlspecialchars($_POST['adresse']);

            // Creation d'un nouvel objet "user" de type "user" avec l'envoie des données
            $user = new user([
                'nom' => $nom,
                'prenom' => $prenom,
                'telephone' => $telephone,
                'email' => $email,
                'adresse' => $adresse,
                'dateNaissance' => $dateNaissance,
            ]);
                    
            // Creation d'un nouvel objet "modif" de type "user_management"
            $modif = new user_management();
            // Execution de la fonction ModificationUser avec l'envoie des données de ($user)
            $modification = $modif->ModificationUser($user);
  

            // Verification de la requete avec message d'erreur
            if ($modification == 1) {
                $session->create('message', 'Modification effectué.');
                $session->create('message-box-icon', 'success');
                header('location: ' . root_folder . 'index.php');
            } else {
                $session->create('message', 'Problème lors de la modification');
                $session->create('message-box-icon', 'error');
                header('location: ' . root_folder . 'index.php');
            }
        }
    // Verification d'ou proviennent les données
    }elseif(isset($_POST['submitModifMdp'])){
        // Verification de la bonne conformité des données
        $ancienPassword = htmlspecialchars($_POST['ancienPassword']);
        $newPassword = htmlspecialchars($_POST['newPassword']);
        $confirmNewPassword = htmlspecialchars($_POST['confirmNewPassword']);

        // Verification que les deux mots de passe soit identique
        if ($_POST['newPassword'] != $_POST['confirmNewPassword']) {
            $session->create('message', 'Erreur les nouveaux mots de passe sont différents.');
            $session->create('message-box-icon', 'error');
            header('location: ' . root_folder . '/view/espace_membre.php');
        }else {

            // Creation d'un nouvel objet "passwordUser" de type "user" avec l'envoie des données
            $passwordUser = new user([
                'ancienPassword' => $ancienPassword,
                'newPassword' => $newPassword,
                'confirmNewPassword' => $confirmNewPassword,
                'userId' => $_COOKIE['user']
            ]);

            // Creation d'un nouvel objet "modifPasswordUser" de type "user_management"
            $modifPasswordUser = new user_management();
            // Execution de la fonction updatePasswordUser avec l'envoie des données de ($passwordUser)
            $newPasswordUser = $modifPasswordUser->updatePasswordUser($passwordUser);

            // Verification de la requete avec message d'erreur
            if ($newPasswordUser == 0) {
                $session->create('message', 'Erreur, ancien mot de passe ne correspont pas.');
                $session->create('message-box-icon', 'error');
                header('location: ' . root_folder . 'index.php');
            } else {
                $session->create('message', 'Modification du mot de passe reussit.');
                $session->create('message-box-icon', 'success');
                header('location: ' . root_folder . 'index.php');
            }
        }
    }
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}