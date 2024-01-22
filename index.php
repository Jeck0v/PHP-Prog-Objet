<?php
require_once ('./class/ecole.php');
//ARNAUD FSICHER WEB1 gr1
// 1) Créer une instance de l'école
$ecole = new Ecole("Simulation d'école", "Hetic");

// 2) Ajouter des étudiants, enseignants et matières à l'école
$etudiant1 = new Etudiant("Bidan", "Maxime", 26, "E1");
$etudiant2 = new Etudiant("Gontier", "Alexis", 20, "E2");
$etudiant3 = new Etudiant("Dondey", "Louis", 21, "E3");
$etudiant4 = new Etudiant("Chen", "Jacque", 27, "E4");
$etudiant5 = new Etudiant("Fischer", "Arnaud", 18, "E5");

$ecole->ajouter_etudiant($etudiant1);
$ecole->ajouter_etudiant($etudiant2);
$ecole->ajouter_etudiant($etudiant3);
$ecole->ajouter_etudiant($etudiant4);
$ecole->ajouter_etudiant($etudiant5);

$enseignant1 = new Enseignant("Seneina", "Ahmed", 32, "T1");
$enseignant2 = new Enseignant("Rangon", "JC", 35, "T2");

$ecole->ajouter_enseignant($enseignant1);
$ecole->ajouter_enseignant($enseignant2);

$matiere1 = new Matiere("SQL", 4);
$matiere2 = new Matiere("Programmation objet", 3);

$ecole->ajouter_matiere($matiere1);
$ecole->ajouter_matiere($matiere2);

// 3) Créer des cours en associant une matière et un enseignant
$cours1 = $ecole->creer_cours($matiere1, $enseignant1);
$cours2 = $ecole->creer_cours($matiere2, $enseignant2);

// 4) Inscrire des étudiants à des cours
$cours1->inscrire_etudiant($etudiant1);
$cours1->inscrire_etudiant($etudiant2);
$cours1->inscrire_etudiant($etudiant3);
$cours2->inscrire_etudiant($etudiant3);
$cours2->inscrire_etudiant($etudiant4);
$cours2->inscrire_etudiant($etudiant5);

// 5) Permettre aux enseignants de noter les étudiants dans chaque matière
$enseignant1->noter_etudiant($etudiant1, $matiere1, 18);
$enseignant1->noter_etudiant($etudiant2, $matiere1, 15);
$enseignant1->noter_etudiant($etudiant3, $matiere1, 20);

$enseignant2->noter_etudiant($etudiant3, $matiere2, 14);
$enseignant2->noter_etudiant($etudiant4, $matiere2, 16);
$enseignant2->noter_etudiant($etudiant5, $matiere2, 19);

// 6/7) Afficher les moyennes des étudiants pour chaque matière
foreach ($ecole->etudiants_inscrits as $etudiant) {
    echo "Moyennes de {$etudiant->nom} {$etudiant->prenom}:"."<br>";
    foreach ($ecole->matieres_proposees as $matiere) {
        $moyenne = $etudiant->calculer_moyenne($matiere);       //regarder etudiant.php
        if ($moyenne !== null) {
            echo " - {$matiere->nom}: $moyenne"."<br>";
        } else {
            echo " - {$matiere->nom}: Aucune note disponible"."<br>";
        }
    }
    echo "<br>";
}
?>