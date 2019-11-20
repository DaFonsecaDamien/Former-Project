<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Include du fichier de configuration
    require_once('../../appConfig.php');

    // Verification pour savoir d'ou proviennent les données
    if(isset($_POST['submitSendMailAdmin'])){
        //Vérification pour savoir si les données existe
        if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
            $session->create('message', 'Erreur, un des champs est manquant.');
            $session->create('message-box-icon', 'error');
            header('location: ' . root_folder . 'index.php');
        }else{
        //Verification de la conformité des données
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // Préparation de l'envoie de mail
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';
            $mail->Username = AdresseEmailSite;
            $mail->Password = PasswordEmailSite;
            
            $mail->setFrom(AdresseEmailSite, NameEmailSite); // Personnaliser l'envoyeur
            $mail->Subject =  $subject;
            $mail->Body =  $message;
            $mail->IsHTML(true);
            $mail->AddAddress($email);
            
            //Envoie du mail a l'utilisateur
            if ( !$mail->Send() ) {
                $session->create('message', 'Erreur, Votre mail n\'a pas été envoyé');
                $session->create('message-box-icon', 'error');
                header('location: ' . root_folder . '/view/admin.php');
            } else {
                $session->create('message', 'Mail envoyé.');
                $session->create('message-box-icon', 'success');
                header('location: ' . root_folder . '/view/admin.php');
            }
            unset($mail);

        }
    }elseif(isset($_POST['submitSendMailContact'])){

        // Verification pour savoir si les données existent
        if(empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['objet']) || empty($_POST['message'])) {
            $session->create('message', 'Erreur, un des champs est manquant.');
            $session->create('message-box-icon', 'error');
            header('location: ' . root_folder . 'index.php');
        }else{
        // Verification de la bonne conformité des données
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $objet = htmlspecialchars($_POST['objet']);

        // Préparation de l'envoie de mail
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';
            $mail->Username = AdresseEmailSite;
            $mail->Password = PasswordEmailSite;
            
            $mail->setFrom($email, $nom); // Personnaliser l'envoyeur
            $mail->Subject =  $objet;
            $mail->Body =  $message;
            $mail->IsHTML(true);
            $mail->AddAddress(AdresseEmailSite);
            
            // Envoie du mail 
            if ( !$mail->Send() ) {
                $session->create('message', 'Erreur, Votre mail n\'a pas été envoyé');
                $session->create('message-box-icon', 'error');
                header('location: ' . root_folder . 'index.php');
            } else {
                $session->create('message', 'Mail envoyé.');
                $session->create('message-box-icon', 'success');
                header('location: ' . root_folder . 'index.php');
            }
            unset($mail);

        }

        
    }
}else{
    $session->create('message', 'Oupss une erreur est survenu !');
    $session->create('message-box-icon', 'error');
}
?>