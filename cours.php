<?php
require_once ('./class/matiere.php');
require_once ('./class/enseignant.php');

class Cours {
    public $matiere;
    public $enseignant;
    public $etudiants_inscrits = [];

    public function __construct($matiere, $enseignant) {
        $this->matiere = $matiere;
        $this->enseignant = $enseignant;
    }

    public function inscrire_etudiant($etudiant) {
        $this->etudiants_inscrits[] = $etudiant;
    }
}

?>