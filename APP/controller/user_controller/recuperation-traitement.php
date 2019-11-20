<?php

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
   // Inlcude du fichier de configuration
   require_once('../../appConfig.php');

   // Verification d'ou proviennet les données et qi la données existe
   if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
      if(!empty($_POST['recup_mail'])) {
         // Verification de la bonne conformioté des données
         $recup_mail = htmlspecialchars($_POST['recup_mail']);
         // verification de l'adresse mail avec un bon pattern
         if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {

         // Creation d'un nouvel objet "infoUser" de type "user"
         $infoUser = new user([
               'recupMail' => $recup_mail,
         ]);

         // Creation d'un nouvel objet "demandeInfo" de type "user_management"
         $demandeInfo = new user_management();
         // Execution de la fonction getUserByMail avec l'envoie des données de ($infoUser)
         $recupInfoUser = $demandeInfo->getUserByMail($infoUser);

         // Verification pour savoir si le mail de l'utilisateur correspond dans la base
            if($recupInfoUser) {
               $nom = $recupInfoUser['nom'];
               $_SESSION['recup_mail'] = $recup_mail;
               $recup_code = "";
               for($i=0; $i < 8; $i++) { 
                  $recup_code .= mt_rand(0,9);
               }
               
               // Creation d'un nouvel objet "recup" de type "user"
               $recup = new user([
                  'recupCode' => $recup_code,
                  'recupMail' => $recup_mail,
               ]);

               // Creation d'un nouvel objet "demandeRecupPassword" de type "user_management"
               $demandeRecupPassword = new user_management();
               // Execution de la fonction demandeRecup avec l'envoie des données de ($recup)
               $ajoutDemandeRecup = $demandeRecupPassword->demandeRecup($recup);

               // Preparation de l'Envoie du mail a l'utilisateur
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
               $mail->Subject = "Récupération de mot de passe - FormerStudent" ;
               $mail->Body =  '
               <html>
               <head>
               <title>Récupération de mot de passe - FormerStudent.com</title>
               <meta charset="utf-8" />
               </head>
               <body>
               <font color="#303030";>
                  <div align="center">
                     <table width="600px">
                     <tr>
                        <td>
                           
                           <div align="center">Bonjour <b>'.$nom.'</b>,</div>
                           Voici votre code de récupération: <b>'.$recup_code.'</b>
                           A bientôt sur <a href="http://127.0.0.1/FormerProject/APP/">FormerStudent.com</a> !
                           
                        </td>
                     </tr>
                     <tr>
                        <td align="center">
                           <font size="2">
                           Ceci est un email automatique, merci de ne pas y répondre
                           </font>
                        </td>
                     </tr>
                     </table>
                  </div>
               </font>
               </body>
               </html>
               ';
               $mail->IsHTML(true);
               $mail->AddAddress($recup_mail);
               // Envoie du mail a l'utilisateur
               $mail->Send();
               unset($mail);
               header('location: ' . root_folder . 'view/forgotPassword.php?section=code');

            } else {
               $error = "Cette adresse mail n'est pas enregistrée";
            }
         } else {
            $error = "Adresse mail invalide";
         }
      } else {
         $error = "Veuillez entrer votre adresse mail";
      }
   }
   if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
      if(!empty($_POST['verif_code'])) {
         $verif_code = htmlspecialchars($_POST['verif_code']);

         // Creation d'un nouvel objet "verif" de type "user_management"
         $verif = new user_management();
         // Execution de la fonction verifCodeRecup avec l'envoie des données de ($_SESSION['recup_mail'],$verif_code)
         $verifCode = $verif->verifCodeRecup($_SESSION['recup_mail'],$verif_code);

         if($verifCode) {

         // Creation d'un nouvel objet "updateRecup" de type "user_management"
         $updateRecup = new user_management();
         // Execution de la fonction updateRecup avec l'envoie des données de ($_SESSION['recup_mail'])
         $updateAfterVerif = $updateRecup->updateRecup($_SESSION['recup_mail']);
         header('location: ' . root_folder . 'view/forgotPassword.php?section=changemdp');

         } else {
            $error = "Code invalide";
         }
      } else {
         $error = "Veuillez entrer votre code de confirmation";
      }
   }
   if(isset($_POST['change_submit'])) {
      if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {

         // Creation d'un nouvel objet "verifRecupConfirm" de type "user_management"
         $verifRecupConfirm = new user_management();
         // Execution de la fonction verifConfirm avec l'envoie des données de ($_SESSION['recup_mail'])
         $verifConfirm = $verifRecupConfirm->verifConfirm($_SESSION['recup_mail']);

         $verifConfirm = $verifConfirm['confirm'];

         // Verification de la confirmation dans la base de données
         if($verifConfirm == 1) {
            $mdp = htmlspecialchars($_POST['change_mdp']);
            $mdpc= htmlspecialchars($_POST['change_mdpc']);
            if(!empty($mdp) AND !empty($mdpc)) {
               if($mdp == $mdpc) {
                  $mdp = md5($mdp);

                  // Creation d'un nouvel objet "mdpFunction" de type "user_management"
                  $mdpFunction = new user_management();
                  // Execution de la fonction changeRecupMdp avec l'envoie des données de ($mdp,$_SESSION['recup_mail'])
                  $changeRecupMdp = $mdpFunction->changeRecupMdp($mdp,$_SESSION['recup_mail']);

                  $deleteRequestRecup = $mdpFunction->deleteRecupRequest($_SESSION['recup_mail']);

                  header('location: ' . root_folder . 'view/access.php');
               } else {
                  $error = "Vos mots de passes ne correspondent pas";
               }
            } else {
               $error = "Veuillez remplir tous les champs";
            }
         } else {
            $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
         }
      } else {
         $error = "Veuillez remplir tous les champs";
      }
   }
}else{
   $session->create('message', 'Oupss une erreur est survenu !');
   $session->create('message-box-icon', 'error');
}
?>