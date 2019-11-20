<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de configuration du site
    require_once('../../../appConfig.php');

    // Vérification du bon envoie des données
    if(empty($_POST['id']) || empty($_POST['text']) || empty($_POST['column_name'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'view/admin.php');
    }

    // Verification de la bonne conformité des données
    $eventId = $_POST['id'];
    $text = htmlspecialchars($_POST['text']);
    $columnName = $_POST['column_name'];

    // Creation d'un nouvel objet "event" de type "event" avec l'envoie des données
    $event = new event([
        'eventId' => $eventId,
        'text' => $text,
    ]);

    // Creation d'un nouvel objet "modif" de type "event_management"
    $modif = new event_management();

    // Execution de la fonction modifEventAsAdmin avec l'envoie des données de ($event, $columnName)
    $updateEvent = $modif->modifEventAsAdmin($event, $columnName);
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}