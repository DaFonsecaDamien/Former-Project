<?php

class appSession {

    // Creer une session
     public function create($name, $value) {
        $_SESSION[$name] = $value;
    }

    // Détruire une session
    public function destroy($name) {
        $_SESSION[$name] = null;
    }

    // Charger une session
    public function load($name) {
         return $_SESSION[$name];
    }

    /* session flash qui se détruit apres utilisation */
    public function flash($name) {
         $session = $_SESSION[$name];
         unset($_SESSION[$name]);
         return $session;
    }

    // Vérification d'une session existante ou pas
    public function isValid($name) {
        return isset($_SESSION[$name]) ? true : false;
    }
}