<?php
class Activites {
    /*
    Auteur : Gabriel Braun - Grenier
    Date : 3/04/2018
    */
    private $titreProjet, $description, $emailProprio, $password;

    public function getTitreProjet() {
        return $this->titreProjet;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getEmailProprio() {
        return $this->emailProprio;
    }
    public function getPassword() {
        return $this->password;
    }

    
    public function setTitreProjet($value) {
        $this->titreProjet = $value;
    }
    public function setDescription($value) {
        $this->description = $value;
    }
    public function setDateDebut($value) {
        $this->emailProprio = $value;
    }
    public function setPassword($value) {
        $this->password = $value;
    }

    public function loadFromArray($t) {
        $this->titreProjet = $t['TITREPROJET'];
        $this->description = $t['DESCRIPTION'];
        $this->emailProprio = $t['EMAILPROPRIO'];
        $this->password = $t['PASSWORD'];
    }    
    public function loadFromObject($x) {
        $this->titreProjet = $x->TITREPROJET;
        $this->description = $x->DESCRIPTION;
        $this->emailProprio = $x->EMAILPROPRIO;
        $this->password = $x->PASSWORD;
    }
}
