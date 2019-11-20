<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Inlcude du fichier de ocnfiguration du site
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['id'])) {
        $session->create('message', 'Erreur, Id introuvable !');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }
    
    //Verification de la bonne conformité des données
    $id = htmlspecialchars($_POST['id']);

    // Creation d'un nouvel objet "supp" de type "event_management"
    $supp = new event_management();
    // Execution de la fonction deleteEvent avec l'envoie des données de ($id)
    $deleteEvent = $supp->deleteEvent($id);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}

?>