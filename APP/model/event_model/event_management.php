<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/FormerProject/APP/model/connexionPDO.php');

class event_management {

    public function __construct()
    {

    }

    // Afficher les evenement dans la page d'event
    public function afficherEvent(){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM event");
        $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }

    // Ajout d'un event par l'admin (panel admin)
    public function ajoutAdminEvent(event $donnees){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("INSERT INTO event (date, titre, contenu, photo) VALUES (?,?,?,?)");
        $prepare->execute([
            $donnees->getDate(),
            $donnees->getTitre(),
            $donnees->getContenu(),
            $donnees->getPhoto(), 
        ]);
        echo "Ajout effectué sans faute";
    }

    // Afficher les event dans le footer Limit a 2 et les plus recent
    public function afficherFooterEvent(){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("SELECT * FROM event WHERE date = ( SELECT MAX(date) FROM event) LIMIT 2");
        $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }

    // Suppression d'un event dans panel admin
    public function deleteEvent($id){
        $pdo=new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("DELETE FROM event WHERE id = ? ");
        $prepare->execute([
            $id,
        ]);
        echo 'Suppression effectue sans probleme';
    }

    // Modification d'un event dans panel admin
    public function modifEventAsAdmin(event $donnees, $columnName) {
        $pdo = new connexionPDO();
        $prepare = $pdo->pdo_start()->prepare("UPDATE event SET $columnName = ? WHERE id = ?");
        $prepare->execute([
            $donnees->getText(),
            $donnees->getEventId()
        ]);
        echo 'Modification effectue sans probleme';
    }
    

}