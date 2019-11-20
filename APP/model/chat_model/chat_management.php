<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/FormerProject/APP/model/connexionPDO.php');

class chat_management {

    public function __construct()
    {

    }

    // Recuperation des messages du chat
    public function getAllChatMessage(){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM chat ORDER BY id DESC");
        $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }

    // Ajout message dans le chat par les utilisateurs
    public function sendMessageInChat(chat $donnees){
        $pdo=new connexionPDO();
        if(isset($_COOKIE['user'])){
            $query = $pdo->pdo_start()->prepare("SELECT avatar, nom, prenom FROM utilisateurs WHERE id = ?");
            $query->execute([
                $donnees->getIdUserIsConnect(),
            ]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $resultAvatar = $result['avatar'];
            $resultName = $result['nom'].' '.$result['prenom'];
        }else { 
            $resultAvatar = "default.png" ;
            $resultName = $donnees->getPseudo();
        }
            $prepare = $pdo->pdo_start()->prepare("INSERT INTO chat (pseudo, objet, contenu, avatarUser) VALUES (?,?,?,?)");
            $prepare->execute([
                $resultName,
                $donnees->getObjet(),
                $donnees->getContenu(),
                $resultAvatar,
            ]);
    }

    // Ajout d'un message dans le chat panel admin
    public function ajoutAdminMessageInChat(chat $donnees){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("INSERT INTO chat (pseudo, objet, contenu, avatarUser) VALUES (?,?,?,?)");
        $prepare->execute([
            $donnees->getPseudo(),
            $donnees->getObjet(),
            $donnees->getContenu(),
            $donnees->getAvatarAdmin(), 
        ]);
        echo "Ajout effectué sans faute";
    }

    // Modification d'un message sur le chat panel admin
    public function modifChatAsAdmin(chat $donnees, $columnName) {
        $pdo = new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("UPDATE chat SET $columnName = ? WHERE id = ?");
        $prepare->execute([
            $donnees->getText(),
            $donnees->getChatId(),
        ]);
            echo "Modification effectué";
    }

    // Suppression d'un chat sur le panel
    public function deleteChat($id){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("DELETE FROM chat WHERE id = ? ");
        $prepare->execute([
            $id,
        ]);
        echo 'Suppression effectue sans probleme';
    }
}