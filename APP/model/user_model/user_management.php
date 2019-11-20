<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/FormerProject/APP/model/connexionPDO.php');

class user_management
{
    public function __construct()
    {

    }

    // Fonction permettant l'inscritpion d'un utilisateur
    public function addUser(user $donnees) {
        $pdo = new connexionPDO();
        $query = $pdo->pdo_start()->prepare("SELECT email FROM utilisateurs WHERE email = ? ");
        $query->execute([
            $donnees->getEmail(),
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($query->rowCount()) {
            return 0;
        } else {
        $prepare = $pdo->pdo_start()->prepare("INSERT INTO utilisateurs (nom, prenom, email, adresse, telephone, dateNaissance, password) VALUES (?,?,?,?,?,?,?)");
        $prepare->execute([
          $donnees->getNom(),
          $donnees->getPrenom(),
          $donnees->getEmail(),
          $donnees->getAdresse(),
          $donnees->getTelephone(),
          $donnees->getDateNaissance(),
          md5($donnees->getPassword())
        ]);
            return 1;
        }
    }

    // Fonction permettant la connexion d'un utilisateur
    public function login(user $donnees) {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM utilisateurs WHERE email = ? AND password = ?");
        $prepare->execute([
            $donnees->getEmail(),
            md5($donnees->getPassword())
        ]);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Ajout de la date de connection de l'utilisateur qui se connecte
    public function AddDateConnect($idUser){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("UPDATE utilisateurs SET dateConnexion = date(now()) WHERE id = $idUser");
        $prepare->execute([

        ]);
    }

    // Recuperation des informations de l'utilisateur actuellement connecté
    public function getUserConnected(){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $prepare->execute([
            $_COOKIE['user']
        ]);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Recuperation des information de l'utilisateur par l'id
    public function getUserById(user $donnees) {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $prepare->execute([
            $donnees->getUserId(),
        ]);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Modification des informations de l'utilisateurs
    public function ModificationUser(user $donnees) {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, adresse = ?, telephone = ?, dateNaissance = ?, email = ? WHERE id=?");
        $prepare->execute([
            $donnees->getNom(),
            $donnees->getPrenom(),
            $donnees->getAdresse(),
            $donnees->getTelephone(),
            $donnees->getDateNaissance(),
            $donnees->getEmail(),
            $_COOKIE['user']
        ]);
        return 1;
    }

    // Modification de l'avatar de l'utilisateur
    public function ModificationAvatar(user $donnees) {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("UPDATE utilisateurs SET avatar = ? WHERE id=?");
            $prepare->execute([
                $donnees->getAvatar(),
                $_COOKIE['user']
            ]);
    }

    // Recuperation de l'ensemble des utilisateurs
    public function getAllUser() {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM utilisateurs");
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Supression d'un utilisateur dans le panel Admin
    public function deleteUser($idUser) {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("DELETE FROM utilisateurs WHERE id = ? ");
        $prepare->execute([
            $idUser,
        ]);
        echo 'Suppression effectue sans probleme';
    }
    
    // Ajout Utilisateur par l'administrateur (panelAdmin)
    public function addUserAsAdmin(user $donnees) {
        $pdo = new connexionPDO();
        $query = $pdo->pdo_start()->prepare("SELECT email FROM utilisateurs WHERE email = ? ");
        $query->execute([
            $donnees->getEmail(),
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($query->rowCount()) {
            echo "Email déja utilisé !";
        } else {
        $prepare = $pdo->pdo_start()->prepare("INSERT INTO utilisateurs (nom, prenom, email, adresse, telephone, dateNaissance, password) VALUES (?,?,?,?,?,?,?)");
        $prepare->execute([
          $donnees->getNom(),
          $donnees->getPrenom(),
          $donnees->getEmail(),
          $donnees->getAdresse(),
          $donnees->getTelephone(),
          $donnees->getDateNaissance(),
          md5($donnees->getPassword())
        ]);
            echo "Ajout de l'utilisateur effectué sans erreur ! mdp par défault : ", $donnees->getPassword();
        }
    }

    // Modification de l'utilisateur par l'admin (AdminPanel)
    public function modifUserAsAdmin(user $donnees, $columnName) {
        $pdo = new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("UPDATE utilisateurs SET $columnName = ? WHERE id = ?");
        $prepare->execute([
            $donnees->getText(),
            $donnees->getUserId(),
        ]);
            echo "Modification effectué";
    }

    // Creation d'une demande de recuperation 
    public function demandeRecup(user $donnees){
        $pdo = new connexionPDO();
        $mail_recup_exist = $pdo->pdo_start()->prepare('SELECT id FROM recuperation WHERE emailUser = ?');
        $mail_recup_exist->execute([
            $donnees->getRecupMail(),
        ]);
        $mail_recup_exist = $mail_recup_exist->rowCount();
        if($mail_recup_exist == 1) {
           $recup_insert = $pdo->pdo_start()->prepare('UPDATE recuperation SET code = ? WHERE emailUser = ?');
           $recup_insert->execute([
               $donnees->getRecupCode(),
               $donnees->getRecupMail()
            ]);
        } else {
           $recup_insert = $pdo->pdo_start()->prepare('INSERT INTO recuperation (emailUser,code) VALUES (?, ?)');
           $recup_insert->execute([
               $donnees->getRecupMail(),
               $donnees->getRecupCode()
            ]);
        }
    }

    // Recuperation des infos de l'utilisateur par son email
    public function getUserByMail(user $donnees) {
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT id,nom FROM utilisateurs WHERE email = ?");
        $prepare->execute([
            $donnees->getRecupMail(),
        ]);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Verification du code de reucperation 
    public function verifCodeRecup($recup_mail,$verif_code) {
        $pdo=new connexionPDO();
        $verif_req = $pdo->pdo_start()->prepare('SELECT id FROM recuperation WHERE emailUser = ? AND code = ?');
        $verif_req->execute([
            $recup_mail,
            $verif_code
            ]);
        $verif_req = $verif_req->fetch(PDO::FETCH_ASSOC);
        return $verif_req;
    }

    // Modification de la requete de recuperation set le confirm a 1
    public function updateRecup($recup_mail) {
        $pdo=new connexionPDO();
        $up_req = $pdo->pdo_start()->prepare('UPDATE recuperation SET confirm = 1 WHERE emailUser = ?');
        $up_req->execute([
            $recup_mail
        ]);
    }

    // Verification du confirm dans la base de données pour savoir si une requete a deja eté envoyé
    public function verifConfirm($recup_mail) {
        $pdo=new connexionPDO();
        $verif_confirm = $pdo->pdo_start()->prepare('SELECT confirm FROM recuperation WHERE emailUser = ?');
        $verif_confirm->execute([
            $recup_mail
        ]);
        $verifConfirm = $verif_confirm->fetch(PDO::FETCH_ASSOC);
        return $verifConfirm;
    }

    // Changement du mot de passe par l'utilisateur apres demande de recuperation
    public function changeRecupMdp($mdp,$recup_mail) {
        $pdo=new connexionPDO();
        $updateMdp = $pdo->pdo_start()->prepare('UPDATE utilisateurs SET password = ? WHERE email = ?');
        $updateMdp->execute([
            $mdp,
            $recup_mail
        ]);
    }

    // Supression de la requete de recuperation de l'utilisateur apres utilisation
    public function deleteRecupRequest($recup_mail) {
        $pdo=new connexionPDO();

        $delRequest = $pdo->pdo_start()->prepare('DELETE FROM recuperation WHERE emailUser = ?');
        $delRequest->execute([
            $recup_mail
        ]);
    }

    // Modification du mot de passe de l'utilisateur espace-membre
    public function updatePasswordUser(user $donnees) {
        $pdo = new connexionPDO();
        $query = $pdo->pdo_start()->prepare("SELECT password FROM utilisateurs WHERE id = ? ");
        $query->execute([
            $donnees->getUserId(),
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result = md5($donnees->getAncienPassword())) {
            $prepare = $pdo->pdo_start()->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
            $prepare->execute([
              md5($donnees->getNewPassword()),
              $donnees->getUserId(),
            ]);
            return 1;
        } else {
            return 0;
        }
    }

}
