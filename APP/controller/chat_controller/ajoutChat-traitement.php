<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de configuration du site
    require_once('../../appConfig.php');

    // Verifiaction pour savoir si les données son bien envoyé
    if(empty($_POST['pseudo']) || empty($_POST['objet']) || empty($_POST['contenu'])) {
        $session->create('message', 'Erreur, un des champs est manquant.');
        $session->create('message-box-icon', 'error');
        header('location: ' . root_folder . 'index.php');
    }else{

        // Verification d ela bonne conformité des données
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $objet = htmlspecialchars($_POST['objet']);
        $contenu = htmlspecialchars($_POST['contenu']);

        // Vérification pour savoir si l'utilisateur est connécté ou non
        if(isset($_COOKIE['user'])){
        // Creation d'un nouvel objet "message" de type "chat" avec l'envoie des données
        $message = new chat([
            'pseudo' => $pseudo,
            'objet' => $objet,
            'contenu' => $contenu,
            'idUserIsConnect' => $_COOKIE['user']
            ]);
        }else {
        // Creation d'un nouvel objet "message" de type "chat" avec l'envoie des données
        $message = new chat([
            'pseudo' => $pseudo,
            'objet' => $objet,
            'contenu' => $contenu,
            'idUserIsConnect' => "default.png"
            ]);
        }
            // Creation d'un nouvel objet "ajoutMessageManag" de type "chat_management"
            $ajoutMessageManag = new chat_management();
            // Execution de la fonction sendMessageInChat avec l'envoie des données de ($message)
            $ajoutMessage = $ajoutMessageManag->sendMessageInChat($message);
            // Redirection
            header('location: ' . root_folder . 'view/chat.php');
        }
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}
?>