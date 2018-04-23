<?php

class User {
	private $email = "";
	private $username = "";
	private $password = "";
	private $nom = "";
	private $prenom = "";
	
	public function getEmail()
	{
			return $this->email;
	}
	
	public function setEmail($x)
	{
			$this->email = $x;
	}
    
    public function getUsername()
	{
			return $this->username;
	}
	
	public function setUsername($x)
	{
			$this->username = $x;
	}

	public function getPassword()
	{
			return $this->password;
	}
	
	public function setPassword($x)
	{
			$this->password = $x;
	}
	
	public function getNom()
	{
			return $this->nom;
	}
	
	public function setNom($x)
	{
			$this->nom = $x;
	}
	
	public function getPrenom()
	{
			return $this->prenom;
	}
	
	public function setPrenom($x)
	{
			$this->prenom = $x;
	}
	
	public function loadFromRecord($ligne)
	{
		$this->email = $ligne["email"];
		$this->password = $ligne["password"];
		$this->username = $ligne["username"];
		$this->nom = $ligne["nom"];
		$this->prenom = $ligne["prenom"];

	}	

	public function loadFromObject($x) {
        $this->email = $x->email;
        $this->password = $x->pass;
		$this->username = $x->username;
		$this->nom = $x->nom;
		$this->prenom = $x->prenom;
    }
}
?>