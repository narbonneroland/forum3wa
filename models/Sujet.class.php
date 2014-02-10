<?php
Require_once "models/Theme.class.php";
Class Sujet
{
	private $db;
	private $id;		// id dans la DB
	private $titre;		// titredu sujet
	private $description;	// description falcultativeen desous du titre
	private $nbrview;	// nombre de vues
	private $statut;	// nouveau ou lu
	private $datecreation;	// date de création du sujet
	private $auteur;	// id de l'user qui l'a créé
	private $parent;	// id du sujet parent

<<<<<<< HEAD
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
	public function save()
	{
=======
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
>>>>>>> 20be2dd3489f490cf00c4fd6b508d6f8a8e0e056

	}
}
?>