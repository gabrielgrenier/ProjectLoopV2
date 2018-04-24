<?php
/*
    auteur : Gabriel Braun - Grenier
*/
include_once('/classes/Database.php'); 
include_once('/classes/Projets.php'); 

class ProjetDAO{
     public static function find($numProjet){
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM userProjets WHERE NUMPROJET = :x");
                $pstmt->execute(array(':x' => $numProjet));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result){
                        $p = new Projets();
                        $p->loadFromObject($result);
                        $pstmt->closeCursor();
                        $pstmt = NULL;
                        Database::close();
                        return $p;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return NULL;
    }
    public static function findByEmail($email){
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM userProjets WHERE EMAIL = :x");
                $pstmt->execute(array(':x' => $email));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result){
                        $p = new Projets();
                        $p->loadFromObject($result);
                        $pstmt->closeCursor();
                        $pstmt = NULL;
                        Database::close();
                        return $p;
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
            $projet = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM userProjets");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ)){
                        $p = new Projets();
                        $p->loadFromObject($result);
                        array_push($projet, $p);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $projet;
    }
    
    
    
    
}





?>