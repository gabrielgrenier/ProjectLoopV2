<?php

include_once('/classes/Database.php'); 
include_once('/classes/User.php'); 

class UserDAO {
    public static function find($email){
    	$db = Database::getInstance();

    	$pstmt = $db->prepare("SELECT * FROM User WHERE email = :x");
    	$pstmt->execute(array(':x' => $email));

    	$result = $pstmt->fetch(PDO::FETCH_OBJ);

    	if ($result){
                        $t = new User();
                        $t->loadFromObject($result);
                        $pstmt->closeCursor();
                        $pstmt = NULL;
                        Database::close();
                        return $t;
        }

        $pstmt->closeCursor();
        $pstmt = NULL;
        Database::close();

        return NULL;

    }

    public static function isEmail($email){
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM User WHERE email = :x");
        $pstmt->execute(array(':x' => $email));
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

        public static function isUsername($email){
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM User WHERE email = :x");
        $pstmt->execute(array(':x' => $email));
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public static function findByUsername($username){
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM User WHERE username = :x");
        $pstmt->execute(array(':x' => $username));

        $result = $pstmt->fetch(PDO::FETCH_OBJ);

        if ($result){
                        $t = new User();
                        $t->loadFromObject($result);
                        $pstmt->closeCursor();
                        $pstmt = NULL;
                        Database::close();
                        return $t;
        }

        $pstmt->closeCursor();
        $pstmt = NULL;
        Database::close();

        return NULL;

    }

    public static function create($compte)
    {
        $db = Database::getInstance();

        $pstmt = $db->prepare("INSERT INTO User (email, pass, username, nom, prenom) VALUES (:e, :p, :u, :no, :pr)");
        $res = $pstmt->execute(array(':e' => $compte->getEmail(), ':p' => $compte->getPassword(), ':u' => $compte->getUsername(), ':no' => $compte->getNom(), ':pr' => $compte->getPrenom()));
        
        $pstmt->closeCursor();
		return $res;
    }
}

?>