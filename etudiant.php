<?php
require_once ('./class/personne.php');

class Etudiant extends Personne {
    public $num_etudiant;
    public $cours_inscrits = [];
    public $notes = [];

    public function __construct($nom, $prenom, $age, $num_etudiant) {
        parent::__construct($nom, $prenom, $age);
        $this->num_etudiant = $num_etudiant;
    }

    public function s_inscrire($cours) {
        $this->cours_inscrits[] = $cours;
    }

    public function ajouter_note($matiere, $note) {     //ajout note
        if (isset($this->notes[$matiere->nom])) {
            $this->notes[$matiere->nom][] = $note;
        } else {
            $this->notes[$matiere->nom] = [$note];
        }
    }

    public function calculer_moyenne($matiere) {        //calcul la moy
        if (isset($this->notes[$matiere->nom])) {
            $notes_matiere = $this->notes[$matiere->nom];
            $moyenne = array_sum($notes_matiere) / count($notes_matiere);   // prend toute les note (les additionnes) et les divise par le nombre de note
            return $moyenne;
        } else {
            return null;
        }
    }
}

?>