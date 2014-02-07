<?php

Class User
{
	private $id;
	private $login;
	private $password;
	private $droits; //Admin, Modérateur, User
	private $status; // Bannis = true, false par défaut
	private $datecreation;
	private $db;

	public function __construct($db, $data)
	{
			$this->db=$db;
			if(isset($data['id']))
				$this->id=intval($data['id']);
			if(isset($data['login']))
				$this->login=mysqli_real_escape_string($this->db,$data['login']);
			if(isset($data['password']))
				$this->password=mysqli_real_escape_string($this->db,$data['password']);
			
	}

	public function setId($id)
	{
		$this->id=$id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setLogin($login)
	{
		$this->login=$login;
	}
	
	public function getLogin()
	{
		return $this->login;
	}

	public function setPassword($password)
	{
		$this->password=$password;
	}
	public function getPassword()
	{
		return $this->password;
	}


	public function setDroits($droit)
	{
		$this->droit=$droit;
	}

	public function getDroit()
	{
		return $this->droit;
	}

	public function setStatus($status=false)
	{
		$this->status=$status;
	}

	public function getStatus()
	{
		return $this->bannis;
	}

	public function setDateCreation($datecreation)
	{
		$this->datecreation=$datecreation;
	}

	public function getDateCreation()
	{
		return $this->datecreation;
	}

	public function selectUser($data)
	{
	
		$requete="SELECT * FROM user WHERE login='".$this->getLogin()."' AND mdp='".$this->getPassword()."'";
		
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		if($nbr==0)
		{
			return false;
		}
		else
		{
			$record=mysqli_fetch_assoc($res);
			$this->setId($record['id']);
			$this->setDroits($record['droits']);
			$this->setStatus($record['status']);	
			$this->setDateCreation($record['datecreate']);
			return $this;
		}
	}

}



?>