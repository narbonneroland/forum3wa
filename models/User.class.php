<?php

Class User
{
	private $id;
	private $login;
	private $password;
	private $statut;		// admin, modérateur, user
	private $authorized;	// authorisé ou pas (banni ou non)
	private $datecreation;
	private $db;

	public function __construct($db, $data)
	{
		$this->db = $db;
		if ($data != 'NULL')
		{
			if (isset ($data['id_user'])) $this->id = $data['id_user'];
			if (isset ($data['login'])) $this->login = $data['login'];
			if (isset ($data['password'])) $this->password = $data['password'];
			if (isset ($data['statut'])) $this->statut = $data['statut'];
			if (isset ($data['authorized'])) $this->statut = $data['authorized'];
			if (isset ($data['datecreation'])) $this->datecreation = $data['datecreation'];
		}
	}

	public function setID($id)
	{
		$this->id = $id;
	}
	public function getID()
	{
		return $this->id;
	}
	public function setLogin($login)
	{
		$this->login = $login;
	}
	public function getLogin()
	{
		return $this->login;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function setStatut($statut)
	{
		$this->statut=$statut;
	}
	public function getStatut()
	{
		return $this->statut;
	}
	public function setAuthorized($authorized = false)
	{
		$this->authorized = $authorized;
	}
	public function getAuthorized()
	{
		return $this->authorized;
	}
	public function setDateCreation($datecreation)
	{
		$this->datecreation = $datecreation;
	}
	public function getDateCreation()
	{
		return $this->datecreation;
	}

	public function VerifLogin()
	{
		$db = $this->db;
		$login = $this->getLogin();
		$password = $this->getPassword();
		
		$resultat = mysqli_query($db, "SELECT * FROM user WHERE login='".$login."' AND password='".$password."'");		
		$nbr = mysqli_num_rows($resultat);
		$data = mysqli_fetch_assoc($resultat);

		if($nbr == 1) 
			{ $this->id=$data['id_user'];
			  $this->login=$data['login'];
				return $this;}
		else return false;
	}

	public function saveUser($data)
	{
		$this->setLogin($data['login']);
		$this->setPassword($data['password']);

		$login=mysqli_real_escape_string($this->db,$data['login']);
		$password=mysqli_real_escape_string($this->db,$data['password']);

		$requete="INSERT INTO user (login,password,statut,authorized) VALUES ('".$login."','".$password."','utilisateur','1')";
		$res=mysqli_query($this->db,$requete);
		$this->id = mysqli_insert_id($this->db);
		return $this;
	}

	public function loginExists()
	{
		$db = $this->db;
		$login = $this->getLogin();
		
		$resultat = mysqli_query($db, "SELECT * FROM user WHERE login='".$login."'");		
		$nbr = mysqli_num_rows($resultat);
		if($nbr > 0) return true;
		else return false;
	}

}
?>