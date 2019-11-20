<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de configuration du site
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['date']) || empty($_POST['titre']) || empty($_POST['contenuEvent']) || empty($_POST['photo'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }

    // Verification de la bonne conformité des données
        $date = htmlspecialchars($_POST['date']);
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = htmlspecialchars($_POST['contenuEvent']);
        $photo = htmlspecialchars($_POST['photo']);

        // Creation d'un nouvel objet "event" de type "event" avec l'envoie des données
        $event = new event([
            'date' => $date,
            'titre' => $titre,
            'contenu' => $contenu,
            'photo' => $photo
            ]);

            // Creation d'un nouvel objet "ajoutEventManag" de type "event_management"
            $ajoutEventManag = new event_management();
            // Execution de la fonction ajoutAdminEvent avec l'envoie des données de ($event)
            $ajoutEvent = $ajoutEventManag->ajoutAdminEvent($event);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}
?>