<?php
Class connexionPDO {
    public function __construct($sql = ["localhost", "formerproject", "root", null])
    {
        try {
            $this->bdd = new PDO("mysql:host={$sql[0]};dbname={$sql[1]}", $sql[2], $sql[3]);
            $this->bdd->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Fonction pour se connecter a la base de données
    public function pdo_start() {
        return $this->bdd;
    }

    // Fonction pour la femeture de la connexion
    public function pdo_close() {
        return $this->bdd = null;
    }
}
// Utiliser : $pdo = new connexionPDO();