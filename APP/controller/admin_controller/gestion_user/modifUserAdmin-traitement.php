<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de ocnfiguration
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['id']) || empty($_POST['text']) || empty($_POST['column_name'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }

    // Verification de la conformité des données
    $userId = $_POST['id'];
    $text = htmlspecialchars($_POST['text']);
    $columnName = $_POST['column_name'];

    // Creation d'un nouvel objet "user" de type "user" avec l'envoie des données
    $user = new user([
        'userId' => $userId,
        'text' => $text,
    ]);

    // Creation d'un nouvel objet "modif" de type "user_management"
    $modif = new user_management();
    // Execution de la fonction modifUserAsAdmin avec l'envoie des données de ($user, $columnName)
    $updateUser = $modif->modifUserAsAdmin($user, $columnName);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}