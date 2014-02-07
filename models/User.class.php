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
		$this->status=$Status;
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

}



?>