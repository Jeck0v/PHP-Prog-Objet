<?php
require_once ('./class/personne.php');

class Enseignant extends Personne {
    public $num_enseignant;
    public $matieres_enseignees = [];

    public function __construct($nom, $prenom, $age, $num_enseignant) {
        parent::__construct($nom, $prenom, $age);
        $this->num_enseignant = $num_enseignant;
    }

    public function enseigner($matiere) {
        $this->matieres_enseignees[$matiere->nom] = $matiere;
    }

    public function noter_etudiant($etudiant, $matiere, $note) {
        $etudiant->ajouter_note($matiere, $note);
    }
}

?>