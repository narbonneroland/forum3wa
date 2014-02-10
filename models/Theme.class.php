<?php

Class Theme
{
	private $db;
	private $id;		// id dans la DB
	private $titre;		// titredu sujet
	private $nbrsujet;	// nombre de sujets
	private $nbrmsg;	// nombre de messages
	private $datecreation;	// date de création du sujet
	private $auteur;	// id de l'user qui l'a créé

	public function __construct($db, $data)
	{
		$this->db = $db;
		if ($data!= 'NULL')
		{
			$this->id = $data['id_theme'];
			$this->titre = $data['titre'];
			$this->nbrsujet = $data['nbrsujet'];
			$this->nbrmsg = $data['nbrmsg'];
			$this->datecreation = $data['datecreation'];
			$this->auteur = $data['id_auteur'];
		}
	}
	public function setID($id)
	{
		$this->id= $id;
	}
	public function getID()
	{
		return $this->id;
	}
	public function setTitre($titre)
	{
		$this->id= $titre;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	public function setNbrSujet($nbrsujet)
	{
		$this->id= $nbrsujet;
	}
	public function getNbrSujet()
	{
		return $this->nbrsujet;
	}
	public function setNbrMsg($nbrmsg)
	{
		$this->id= $nbrmsg;
	}
	public function getNbrMsg()
	{
		return $this->nbrmsg;
	}
	public function setDatecreation($datecreation)
	{
		$this->id= $datecreation;
	}
	public function getDatecreation()
	{
		return $this->datecreation;
	}
	public function setAuteur($auteur)
	{
		$this->id= $auteur;
	}
	public function getAuteur()
	{
		return $this->auteur;
	}
	public function setNbreSujets($id_theme)
	{
		$requete="SELECT * FROM sujet LEFT JOIN theme ON sujet.id_parent='".$id_theme."'";
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		$this->nbrsujet=$nbr;
	}
	public function setNbreMessages($id_theme)
	{
		$requete="SELECT * FROM message LEFT JOIN theme ON message.id_parent='".$id_theme."'";
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		$this->nbrmsg=$nbr;
	}
	public function setDernierMessage($id_theme)
	{
		$requete="SELECT id_auteur,datecreation FROM message Where id_theme='".$id_theme."' ORDER BY datecreation DESC limit 0,1";
	}
}
?>