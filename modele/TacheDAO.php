<?php
/*
    auteur : Gabriel Braun - Grenier
*/
include_once('/classes/Database.php'); 
include_once('/classes/Taches.php'); 

class TacheDAO {
    public static function find($id){
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM taches WHERE ID = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result){
                        $t = new Taches();
                        $t->loadFromObject($result);
                        $pstmt->closeCursor();
                        $pstmt = NULL;
                        Database::close();
                        return $t;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return NULL;
    }
    public static function findAll(){
            $db = Database::getInstance();
            $taches = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM taches");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ)){
                        $t = new Taches();
                        $t->loadFromObject($result);
                        array_push($taches, $t);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $taches;
    }
    public static function findByStatut($statut){
            $db = Database::getInstance();
            $taches = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM taches WHERE statut=:s");
                $pstmt->execute(array(':s' => $statut));

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ)){
                        $t = new Taches();
                        $t->loadFromObject($result);
                        array_push($taches, $t);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $taches;
    }
    public static function delete($tache){
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM taches WHERE ID=:id");
                $n = $pstmt->execute(array(':id' => $tache->getId()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $n;
    }
    public static function deleteByNum($projet){
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM taches WHERE numProjet=:num");
                $n = $pstmt->execute(array(':num' => $projet->getNumProjet()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $n;
    }
    public static function update($tache){
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE taches SET NUMPROJET=:n, TITRE=:t, DESCRIPTION=:d, STATUT=:s, USERASSIGNED=:u,DATEDEBUT=:dd, DATEFIN=:df WHERE ID=:id");
                $n = $pstmt->execute(array(':id' => $tache->getId(),
                                        ':n' => $tache->getNumProjet(),
                                        ':t' => $tache->getTitre(),
                                        ':d' => $tache->getDescription(),
                                        ':s' => $tache->getStatut(),
                                        ':u' => $tache->getUserAssigned(),
                                        ':dd' => $tache->getDateDebut(),
                                        ':df' => $tache->getDateFin()
                                          ));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }
    public static function create($tache){
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("INSERT INTO taches (ID, TITRE, DESCRIPTION, NUMPROJET, USERASSIGNED, STATUT, DATEDEBUT, DATEFIN)".
                                                  " VALUES (:id, :t,:d, :n, null, :s, null, :df)");
                $pstmt->execute(array(':id' => $tache->getId(),
                                      ':t' => $tache->getTitre(),
                                      ':d' => $tache->getDescription(),
                                      ':n' => $tache->getNumProjet(),
                                      ':s' => $tache->getStatut(),
                                      ':df' => $tache->getDateFin()
                                     ));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
    }  
}
?>