<?php
Require_once "models/Theme.class.php";
Class Sujet
{
	private $db;
	private $id;		// id dans la DB
	private $titre;		// titre du sujet
	private $description;	// description falcultative en desous du titre
	private $content; //message initiale
	private $nbrrep;
	private $nbrview;	// nombre de vues
	private $statut;	// nouveau ou lu
	private $datecreation;	// date de création du sujet
	private $auteur;
	private $nomauteur;	// id de l'user qui l'a créé
	private $id_sujet;	// id du sujet parent
	private $id_theme;  //id du theme parent
	private $id_message; //id du message

	public function __construct($db, $data)
	{
		$this->db = $db;
		if ($data != 'NULL')
		{
			if(isset($data['id_sujet']))
				$this->id = $data['id_sujet'];
			if(isset($data['titre']))
				$this->titre = $data['titre'];
			if(isset($data['description']))
				$this->description = $data['description'];
			if(isset($data['nbrview']))
				$this->nbrview = $data['nbrview'];
			if(isset($data['statut']))
				$this->statut = $data['statut'];
			if(isset($data['datecreation']))
				$this->datecreation = $data['datecreation'];
			if(isset($data['id_auteur']))
				$this->auteur = $data['id_auteur'];
			if(isset($data['content']))
				$this->content=$data['content'];
			//if(isset($data['id_sujet']))
				//$this->id_sujet=$data['id_sujet'];
			if(isset($data['id_theme']))
				$this->id_theme = $data['id_theme'];
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
	public function setIdSujet($id)
	{
		$this->id_sujet = $id;
	}
	public function getIdSujet()
	{
		return $this->id_sujet;
	}
	public function setIdTheme($id)
	{
		$this->id_theme = $id;
	}
	public function getIdTheme()
	{
		return $this->id_theme;
	}
	public function getNomAuteur()
	{
		return $this->nomauteur;
	}
	public function getIdMessage()
	{
		return $this->id_message;
	}
	public function setNbreReponse($id_sujet)
	{
		$requete="SELECT * FROM message where message.id_sujet='".$this->id."'";
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

	public function save()
	{
		$id  = $this->id;
		$titre = mysqli_real_escape_string($this->db,$this->titre);
		$description = mysqli_real_escape_string($this->db,$this->description);
		$nbrview = $this->nbrview;
		$statut = $this->statut;
		$datecreation = $this->datecreation;
		$auteur = $this->auteur;
		$id_theme = $this->id_theme;
		$content =mysqli_real_escape_string($this->db,$this->content);
		
		$requete="INSERT INTO sujet (titre, description, nbrview, statut, datecreation, id_auteur, id_theme) 
				VALUES ('".$titre."','".$description."','".$nbrview."','".$statut."','".$datecreation."',".$auteur.",".$id_theme.")";
			

		if ($this->id == NULL)
		{
			
			$resultat = mysqli_query($this->db, "INSERT INTO sujet (id_sujet,titre, description, nbrview, statut, datecreation, id_auteur, id_theme) 
				VALUES (NULL,'".$titre."','".$description."','".$nbrview."','".$statut."','".$datecreation."','".$auteur."','".$id_theme."')");
			$this->id=mysqli_insert_id($this->db);
			$requete="INSERT INTO message (content,id_auteur,id_sujet,id_theme)
			         VALUES ('".$content."','".$auteur."','".$this->id."','".$id_theme."')";
			$resultat = mysqli_query($this->db,$requete);
			$this->id_message=mysqli_insert_id($this->db);
			
			return $this;
    	}
    	else
    	{
    		
    		$resultat = mysqli_query($this->db, "UPDATE sujet SET titre = '".$titre."', description = '".$description."', nbrview = '".$nbrview."', statut = '".$statut."', datecreation = '".$datecreation."', id_auteur = '".$auteur."', id_parent = '".$id_theme."' WHERE id_sujet = '".$id."'");
    	}
	}
	public function setDernierMessage($id)
	{
		$requete="SELECT id_auteur,datecreation FROM message Where id_sujet=".$id." ORDER BY datecreation DESC limit 0,1";
		$db = $this->db ;
		$res=mysqli_query($this->db,$requete);
		$nbr=mysqli_num_rows($res);
		if($nbr!=0)
		{
			$record=mysqli_fetch_assoc($res);
			$this->auteur=$record["id_auteur"];
			$this->datecreation=$record["datecreation"];
			$requete="SELECT login FROM user WHERE id_user=".$this->auteur;
			$res=mysqli_query($this->db,$requete);
			$record=mysqli_fetch_assoc($res);
			$this->nomauteur=$record['login'];
			
		}
		else
		{
			$this->datecreation="";
		}

	}
	public function getPath()
	{
		$db = $this->db;
		$id_theme = $this->id_theme;
		$resultat = mysqli_query($db, 'SELECT titre FROM theme WHERE theme.id_theme ='.$id_theme);
		$data = mysqli_fetch_assoc($resultat);
		return($data["titre"]);
	}
}
?>