<?php
Require_once "models/Theme.class.php";
Class Sujet
{
	private $db;
	private $id;		// id dans la DB
	private $titre;		// titredu sujet
	private $description;	// description falcultativeen desous du titre
	private $nbrrep;
	private $nbrview;	// nombre de vues
	private $statut;	// nouveau ou lu
	private $datecreation;	// date de création du sujet
	private $auteur;	// id de l'user qui l'a créé
	private $parent;	// id du sujet parent

	public function __construct($db, $data)
	{
		$this->db = $db;
		if ($data != 'NULL')
		{
			$this->id = $data['id_sujet'];
			$this->titre = $data['titre'];
			$this->description = $data['description'];
			$this->nbrview = $data['nbrview'];
			$this->statut = $data['statut'];
			$this->datecreation = $data['datecreation'];
			$this->auteur = $data['id_auteur'];
			$this->parent = $data['id_parent'];
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
		$this->titre = $titre;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setStatut($statut)
	{
		$this->statut = $statut;
	}
	public function getStatut()
	{
		return $this->statut;
	}
	public function setNbrView($nbrview)
	{
		$this->nbrview = $nbrview;
	}
	public function getNbrView()
	{
		return $this->nbrview;
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
	public function setParent($id)
	{
		$this->parent = $id;
	}
	public function getParent()
	{
		return $this->parent;
	}
	public function setNbreReponse($id_sujet)
	{
		var_dump($id_sujet);
		$requete="SELECT * FROM message where message.id_parent='".$id_sujet."'";
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		if($nbr==0)
		{
			$this->nbrrep=$nbr;	
		}
		else
			$this->nbrrep=$nbr-1;
		
	}
	public function getNbrRep()
	{
		return $this->nbrrep;
	}
	
}
?>