<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    
    // Include fichier de configuration
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['objet']) || empty($_POST['contenuChat'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }

    // Verification de la bonne confromité des données
        $objet = htmlspecialchars($_POST['objet']);
        $contenuChat = htmlspecialchars($_POST['contenuChat']);

        //Creation d'un objet chat avec les données
        $message = new chat([
            'pseudo' => 'ADMIN',
            'objet' => $objet,
            'contenu' => $contenuChat,
            'avatarAdmin' => "admin.png"
            ]);

            // Creation d'un objet chat_management
            $ajoutMessageManag = new chat_management();
            // Execution de la fonction ajoutAdminMessageInChat avec l'envoie des données de ($chat)
            $ajoutMessage = $ajoutMessageManag->ajoutAdminMessageInChat($message);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}

?>