<?php
/*
    Auteur : Gabriel Braun - Grenier
    Date : 23/04/2018
*/
class Projets {
    private $numProjet, $email, $roleUser, $nomProjet;
    
    public function getNumProjet(){
        return $this->numProjet;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){
        return $this->roleUser;
    }
    public function getNomProjet(){
        return $this->nomProjet;
    }
    
    public function setNumProjet($value){
        $this->numProjet = $value;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function setRole($value){
        $this->roleUser = $value;
    }
    public function setNomProjet($value){
        $this->nomProjet = $value;
    }
    
    public function loadFromArray($t) {
        $this->numProjet = $t['NUMPROJET'];
        $this->email = $t['EMAIL'];
        $this->roleUser = $t['ROLEUSER'];
        $this->nomProjet = $t['NOMPROJET'];
    }
    
    public function loadFromObject($x) {
        $this->numProjet = $x->numProjet;
        $this->email = $x->email;
        $this->roleUser = $x->roleUser;
        $this->nomProjet = $x->nomProjet;
    }
}


?>