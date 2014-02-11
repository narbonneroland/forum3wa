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
	private $nomauteur; // nom de l'auteur
	private $titre_sujet; //titre du sujet
	
	public function __construct($db, $data)
	{
		$this->db = $db;
		if ($data != 'NULL')
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
		$this->id = $id;
	}
	public function getID()
	{
		return $this->id;
	}
	public function setTitre($titre)
	{
		$this->id = $titre;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	public function getTitreSujet()
	{
		return $this->titre_sujet;
	}
	public function setNbrSujet($nbrsujet)
	{
		$this->id = $nbrsujet;
	}
	public function getNbrSujet()
	{
		return $this->nbrsujet;
	}
	public function setNbrMsg($nbrmsg)
	{
		$this->id = $nbrmsg;
	}
	public function getNbrMsg()
	{
		return $this->nbrmsg;
	}
	public function setDatecreation($datecreation)
	{
		$this->id = $datecreation;
	}
	public function getDatecreation()
	{
		return $this->datecreation;
	}
	public function setAuteur($auteur)
	{
		$this->id = $auteur;
	}
	public function getAuteur()
	{
		return $this->auteur;
	}
	public function getNomAuteur()
	{
		return $this->nomauteur;
	}
	public function setNbreSujets($id_theme)
	{

		$requete="SELECT * FROM sujet WHERE sujet.id_theme='".$id_theme."'";
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		$this->nbrsujet=$nbr;
	}
	public function setNbreMessages($id_theme)
	{
		$requete="SELECT * FROM message WHERE message.id_theme='".$id_theme."'";
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		$this->nbrmsg=$nbr;
	}
	public function setDernierMessage($id_theme)
	{
		$requete="SELECT id_auteur,datecreation,id_sujet FROM message Where id_theme=".$id_theme." ORDER BY datecreation DESC limit 0,1";
		$db = $this->db ;
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		if($nbr!=0)
		{
			$record=mysqli_fetch_assoc($res);
			$this->auteur=$record["id_auteur"];
			$this->datecreation=$record["datecreation"];
			$id_sujet=$record['id_sujet'];
			$requete="SELECT login FROM user WHERE id_user=".$this->auteur;
			$res=mysqli_query($this->db,$requete);
			$record=mysqli_fetch_assoc($res);
			$this->nomauteur=$record['login'];
			$requete="SELECT titre FROM sujet WHERE id_sujet=".$id_sujet;
			$res=mysqli_query($this->db,$requete);
			$record=mysqli_fetch_assoc($res);
			$this->titre_sujet=$record['titre'];

		}
		else
		{
			$this->datecreation="";
		}

	}
	public function save()
	{
		if ($db != false)
		{
			$id  = $this->id;
			$titre = $this->titre;
			$nbrsujet = $this->nbrsujet;
			$nbrmsg = $this->nbrmsg;
			$datecreation = $this->datecreation;
			$auteur = $this->auteur;

			if ($this->id == 'NULL')
			{
				$resultat = mysqli_query($db, "INSERT INTO theme (titre, nbrsujet, nbrmsg, datecreation, id_auteur) 
					VALUES ('".$titre."','".$nbrsujet."','".$nbrmsg."','".$datecreation."','".$auteur."')");
	    	}
	    	else
	    	{
	    		$resultat = mysqli_query($db, "UPDATE theme SET titre = '".$titre."', nbrsujet = '".$nbrsujet."', nbrmsg = '".$nbrmsg."', datecreation = '".$datecreation."', id_auteur = '".$auteur."' WHERE id_theme = '".$id."'");
	    	}
		}
	}
}
?>