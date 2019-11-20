<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Inlcude du fichier de configuration du site
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['id']) || empty($_POST['text']) || empty($_POST['column_name'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }

    // Verification de la bonne conformité des données
    $chatId = $_POST['id'];
    $text = htmlspecialchars($_POST['text']);
    $columnName = $_POST['column_name'];

    // Creation d'un nouvel objet "chat" de type "chat" avec l'envoie des données
    $chat = new chat([
        'chatId' => $chatId,
        'text' => $text,
    ]);

    // Creation d'un nouvel objet "modif" de type "chat_management"
    $modif = new chat_management();

    // Execution de la fonction modifChatAsAdmin avec l'envoie des données de ($chat, $columnName)
    $updateChat = $modif->modifChatAsAdmin($chat, $columnName);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}