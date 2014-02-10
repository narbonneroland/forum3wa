<?php
Require_once "models/Sujet.class.php";
Class Message
{
	private $db;
	private $id;		// id dans la DB
	private $contenu;	// description falcultativeen desous du titre
	private $datecreation;	// date de création du sujet
	private $auteur;	// id de l'user qui l'a créé
	private $sujet;	// id du sujet parent
	private $theme; //id du theme parent

	public function __construct($db, $data)
	{
		$this->db = $db;
		if ($data != 'NULL')
		{
			$this->id = $data['id_message'];
			$this->contenu = $data['content'];
			$this->datecreation = $data['datecreation'];
			$this->auteur = $data['id_auteur'];
			$this->sujet = $data['id_sujet'];
			$this->theme = $data['id_theme'];
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
	public function setContenu($contenu)
	{
		$this->contenu = $contenu;
	}
	public function getContenu()
	{
		return $this->contenu;
	}
	public function setDatecreation($datecreation)
	{
		$this->datecreation = $datecreation;
	}
	public function getDatecreation()
	{
		return $this->datecreation;
	}
	public function setAuteur($id)
	{
		$this->auteur = $id;
	}
	public function getAuteur()
	{
		return $this->auteur;
	}
	public function setSujet($id)
	{
		$this->sujet = $id;
	}
	public function getSujet()
	{
		return $this->sujet;
	}
	public function save()
	{
		$id  = $this->id;
		$content = $this->contenu;
		$description = $this->description;
		$datecreation = $this->datecreation;
		$auteur = $this->auteur;
		$sujet = $this->sujet;


		if ($this->id == 'NULL')
		{
			$resultat = mysqli_query($db, "INSERT INTO message (content, datecreation, id_auteur, id_sujet, id_theme) 
				VALUES ('".$content."','".$datecreation."','".$auteur."','".$sujet."')");
    	}
    	else
    	{
    		$resultat = mysqli_query($db, "UPDATE message SET content = '".$content."', datecreation = '".$datecreation."', id_auteur = '".$auteur."', id_sujet = '".$sujet."' WHERE id_message = '".$id."'");
    	}
	}
}
?>