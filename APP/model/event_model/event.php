<?php

Class event {

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

    public $_date, $_titre, $_contenu, $_photo, $_eventId, $_text;

    // Getter de toutes les varaibles
    public function getDate() { return $this->_date; }
    public function getTitre() { return $this->_titre; }
    public function getContenu() { return $this->_contenu; }
    public function getPhoto() { return $this->_photo; }
    public function getText() { return $this->_text; }
    public function getEventId() { return $this->_eventId; }

    // SETTERS de l'ensemble des variables
    public function setEventId($eventId) {
        $this->_eventId = $eventId;
    }

    public function setDate($date) {
            $this->_date = $date;
    }

    public function setTitre($titre) {
            $this->_titre = $titre;
    }

    public function setContenu($contenu) {
            $this->_contenu = $contenu;
    }

    public function setPhoto($photo) {
            $this->_photo = $photo;
    }

    public function setText($text) {
            $this->_text = $text;
    }

}
