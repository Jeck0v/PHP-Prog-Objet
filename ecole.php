<?php
require_once ('./class/etudiant.php');
require_once ('./class/enseignant.php');
require_once ('./class/matiere.php');
require_once ('./class/cours.php');

class Ecole {
    public $nom;
    public $adresse;
    public $etudiants_inscrits = [];
    public $enseignants = [];
    public $matieres_proposees = [];
    public $cours_dispenses = [];

    public function __construct($nom, $adresse) {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function ajouter_etudiant($etudiant) {
        // Vérifier si le numéro d'étudiant est unique
        if (!$this->existe_etudiant($etudiant->num_etudiant)) {
            $this->etudiants_inscrits[] = $etudiant;
        } else {
            echo "Erreur: Numéro d'étudiant déjà existant.";
        }
    }

    public function ajouter_enseignant($enseignant) {
        // Vérifier si le numéro d'enseignant est unique
        if (!$this->existe_enseignant($enseignant->num_enseignant)) {
            $this->enseignants[] = $enseignant;
        } else {
            echo "Erreur: Numéro d'enseignant déjà existant.";
        }
    }

    public function ajouter_matiere($matiere) {
        $this->matieres_proposees[] = $matiere;
    }

    public function creer_cours($matiere, $enseignant) {
        $cours = new Cours($matiere, $enseignant);
        $this->cours_dispenses[] = $cours;
        return $cours;
    }

    private function existe_etudiant($num_etudiant) {
        foreach ($this->etudiants_inscrits as $etudiant) {
            if ($etudiant->num_etudiant == $num_etudiant) {
                return true;
            }
        }
        return false;
    }

    private function existe_enseignant($num_enseignant) {
        foreach ($this->enseignants as $enseignant) {
            if ($enseignant->num_enseignant == $num_enseignant) {
                return true;
            }
        }
        return false;
    }
}

?>
