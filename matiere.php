<?php

class Matiere {
    public $nom;
    public $charge_horaire;

    public function __construct($nom, $charge_horaire) {
        $this->nom = $nom;
        $this->charge_horaire = $charge_horaire;
    }
}

