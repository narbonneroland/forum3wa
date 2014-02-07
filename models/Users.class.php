<?php

Class User
{
	private $id;
	private $login;
	private $password;
	private $droits; //Admin, Modérateur, User
	private $status; // Bannis = true, false par défaut
	private $db;

	public function __construct($db, $data)
	{

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

}



?>