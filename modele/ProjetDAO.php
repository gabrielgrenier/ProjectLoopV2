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
    public static function addUserProjet($user, $num, $nom){
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("INSERT INTO userProjets (NUMPROJET, EMAIL, ROLEUSER, NOMPROJET)".
                                  " VALUES (:num, :em, :ro, :nom)");
            $pstmt->execute(array(':num' => $num,
                                    ':em' => $user->getEmail(),
                                    ':ro' => "user",
                                    ':nom' => $nom,
                                    ));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }             
    }  
    public static function create($projet, $user){
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("INSERT INTO userProjets (NUMPROJET, EMAIL, ROLEUSER, NOMPROJET)".
                                  " VALUES (:num, :em, :ro, :nom)");
            $pstmt->execute(array(':num' => $projet->getNumProjet(),
                                    ':em' => $user->getEmail(),
                                    ':ro' => "admin",
                                    ':nom' => $projet->getNomProjet(),
                                    ));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }       
    }
    public static function update($projet){
        $db = Database::getInstance();
        $n = 0;
        try {
            $pstmt = $db->prepare("UPDATE userProjets SET NOMPROJET=:nom WHERE NUMPROJET=:num");
            $n = $pstmt->execute(array(':nom' => $projet->getNomProjet(),
                                        ':num' => $projet->getNumProjet()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;			
    }
    
    
    
}





?>