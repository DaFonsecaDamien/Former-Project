<?php

Class chat {

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    // Hydratation des données
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public $_pseudo, $_objet, $_contenu, $_idUserIsConnect, $_chatId, $_text, $_avatarAdmin;

    // Getter des variables
    public function getPseudo() { return $this->_pseudo; }
    public function getObjet() { return $this->_objet; }
    public function getContenu() { return $this->_contenu; }
    public function getChatId() { return $this->_chatId; }
    public function getAvatarAdmin() { return $this->_avatarAdmin; }
    public function getIdUserIsConnect() { return $this->_idUserIsConnect; }
    public function getText() { return $this->_text; }


    // Ensembles des SETTERS
    public function setIdUserIsConnect($idUserIsConnect) {
            $this->_idUserIsConnect = $idUserIsConnect;
    }

    public function setChatId($chatId) {
        $this->_chatId = $chatId;
    }

    public function setPseudo($pseudo) {
            $this->_pseudo = $pseudo;
    }

    public function setAvatarAdmin($avatarAdmin) {
            $this->_avatarAdmin = $avatarAdmin;
    }

    public function setObjet($objet) {
            $this->_objet = $objet;
    }

    public function setContenu($contenu) {
            $this->_contenu = $contenu;
    }

    public function setText($text) {
            $this->_text = $text;
    }

}
