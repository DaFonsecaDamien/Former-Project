<?php

Class user {

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    // Hydratation des variables
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public $_nom, $_prenom, $_email, $_password, $_telephone, $_adresse, $_dateNaissance, $_avatar, $_userId, $_text, $_column_name, $_recupCode, $_recupMail, $_ancienPassword,
    $_newPassword, $_confirmNewPassword ;

    // GETTERS de l'ensemble des variables
    public function getNom() { return $this->_nom; }
    public function getPrenom() { return $this->_prenom; }
    public function getEmail() { return $this->_email; }
    public function getPassword() { return $this->_password; }
    public function getTelephone() { return $this->_telephone; }
    public function getAdresse() { return $this->_adresse; }
    public function getDateNaissance() { return $this->_dateNaissance; }
    public function getAvatar() { return $this->_avatar; }
    public function getUserId() { return $this->_userId; }
    public function getText() { return $this->_text; }
    public function getRecupCode() { return $this->_recupCode; }
    public function getRecupMail() { return $this->_recupMail; }

    public function getAncienPassword() { return $this->_ancienPassword; }
    public function getNewPassword() { return $this->_newPassword; }
    public function getConfirmNewPassword() { return $this->_confirmNewPassword; }

    
    // SETTER de l'ensemble des variables
    public function setUserId($userId) {
            $this->_userId = $userId;
    }
    
    public function setNom($nom) {
            $this->_nom = $nom;
    }

    public function setPrenom($prenom) {
            $this->_prenom = $prenom;
    }

    public function setEmail($email) {
            $this->_email = $email;
    }

    public function setPassword($password) {
            $this->_password = $password;
    }

    public function setTelephone($telephone) {
            $this->_telephone = $telephone;
    }

    public function setAdresse($adresse) {
            $this->_adresse = $adresse;
    }

    public function setDateNaissance($dateNaissance) {
            $this->_dateNaissance = $dateNaissance;
    }

    public function setAvatar($avatar) {
            $this->_avatar = $avatar;
    }

    public function setText($text) {
            $this->_text = $text;
    }

    public function setRecupCode($recupCode) {
            $this->_recupCode = $recupCode;
    }

    public function setRecupMail($recupMail) {
            $this->_recupMail = $recupMail;
    }

    public function setAncienPassword($ancienPassword) {
            $this->_ancienPassword = $ancienPassword;
    }

    public function setNewPassword($newPassword) {
            $this->_newPassword = $newPassword;
    }

    public function setConfirmNewPassword($confirmNewPassword) {
            $this->_confirmNewPassword = $confirmNewPassword;
    }
}

