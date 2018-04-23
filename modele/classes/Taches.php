<?php
/*
    Auteur : Gabriel Braun - Grenier
    Date : 3/04/2018
*/
class  Taches{
    private $id, $titre, $dateDebut, $dateFin, $numProjet, $statut, $userAssigned, $description;

    public function getId() {
        return $this->id;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function getDateDebut() {
        return $this->dateDebut;
    }
    public function getDateFin() {
        return $this->dateFin;
    }
    public function getNumProjet(){
        return $this->numProjet;
    }
    public function getStatut(){
        return $this->statut;
    }
    public function getUserAssigned(){
        return $this->userAssigned;
    }
    public function getDescription(){
        return $this->description;
    }
    
    public function setId($value) {
        $this->id = $value;
    }
    public function setTitre($value) {
        $this->titre = $value;
    }
    public function setDateDebut($value) {
        $this->dateDebut = $value;
    }
    public function setDateFin($value) {
        $this->dateFin = $value;
    }
    public function setNumProjet($value){
        $this->numProjet = $value;
    }
    public function setStatut($value){
        $this->statut = $value;
    }
    public function setUserAssigned($value){
        $this->userAssigned = $value;
    }
    public function setDescription($value){
        $this->description = $value;
    }
    
    public function loadFromArray($t) {
        $this->id = $t['ID'];
        $this->titre = $t['TITRE'];
        $this->dateDebut = $t['DATEDEBUT'];
        $this->titreProjet = $t['NUMPROJET'];
        $this->description = $t['DESCRIPTION'];
        $this->dateFin = $t['DATEFIN'];
        $this->userAssigned = $t['userAssigned'];
        $this->statut = $t['STATUT'];
        
    }
    
    public function loadFromObject($x) {
        $this->id = $x->id;
        $this->dateDebut = $x->dateDebut;
        $this->numProjet = $x->numProjet;
        $this->dateFin = $x->dateFin;
        $this->userAssigned = $x->userAssigned;
        $this->statut = $x->statut;
        $this->description = $x->description;
        $this->titre = $x->titre;
    }
    
}
