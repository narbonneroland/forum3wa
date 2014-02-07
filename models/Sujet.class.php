<?php

Class Sujet 
{
	private $id;
	private $sujet;
	private $soustitre;
	private $datecreation;
	private $nbre_lu; //Nbre de personne l'ayant lu
	private $id_auteur;
	private $status; // Nouveau ou Lu

	public function __construct($db)
	{
		$this->db=$db;
	}

	public function setId($id)
	{
		$this->id=$id;
	}
	public function setSujet($sujet)
	{
		$this->sujet=$sujet;
	}
	public function setSousTitre($soustitre)
	{
		$this->soustitre=$soustitre;
	}
	public function setAuteur($id_auteur)
	{
		$this->id_auteur=$id_auteur;
	}
	public function setStasus($status)
	{
		$this->status=$status;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getSujet()
	{
		return $this->sujet;
	}
	public function getSousTitre()
	{
		return $this->soustitre;
	}
	public function getDateCreation()
	{
		return $this->datecreation;
	}
	public function getNbreLu()
	{
		return $this->nbre_lu;
	}
	public function getAuteur()
	{
		return $this->id_auteur;
	}
	public function getStatus()
	{
		return $this->status;
	}
	public function createMessage($db,$data)
	{
		
	}
}

?>