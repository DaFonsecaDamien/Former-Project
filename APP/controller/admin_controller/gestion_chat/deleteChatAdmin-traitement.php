<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de ocnfiguration
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['id'])) {
        $session->create('message', 'Erreur, Id introuvable !');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }

    // Verification de la bonne conformité des données
    $id = htmlspecialchars($_POST['id']);

    // Creation d'un nouvel objet "supp" de type "chat_management"
    $supp = new chat_management();

    // Execution de la fonction deleteChat avec l'envoie des données de ($id)
    $delete = $supp->deleteChat($id);

}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}