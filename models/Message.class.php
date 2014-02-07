<?php
require_once("models/Sujet.class.php");

Class Message // gère les messages
{
	private $id;
	private $message;
	private $datecreation;
	private $id_auteur;
	private $db;

	private function __construct($db,$data)
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
	public function setMessage($message)
	{
		$this->message=$message;
	}
	public function setMessage()
	{
		return $this->message;
	}
	public function setDateCreation($datecreation)
	{
		$this->datecreation=$datecreation;
	}
	public function getDateCreation()
	{
		return $this->datecreation;
	}
	public function setDateCreation($datecreation)
	{
		$this->datecreation=$datecreation;
	}
	public function getDateCreation()
	{
		return $this->datecreation;
	}
	public function setId_Auteur($id_auteur)
	{
		$this->id_auteur=$id_auteur;
	}
	public function getId_Auteur()
	{
		return $this->id_auteur;
	}


}

?>