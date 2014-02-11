<?php
require_once 'models/Theme.class.php';
require_once 'models/Sujet.class.php';
require_once 'models/Message.class.php';
require_once 'models/User.class.php';

Class ForumManager
{
	private $db;
	private $data;

	public function __construct($db)
	{
		$this->db = $db;
	}
	public function getDB()
	{
		return $this->db;
	}
	function createTheme($data)
	{
		$this->data = $data;
		$theme = new Theme($this->db,$data);
		return $theme;
	}
	function deleteTheme($theme)
	{
		$db = $this->db;
		if ($db != false)
		{
			$id = $theme->getID(); // on cree un variable id qui récupere l'id du Thème

			$resultat = mysqli_query($db, "DELETE FROM theme WHERE id_theme ='".$id."'");
		}
	}
	function getTheme($id)
	{
		$db = $this->db;
		if ($db != false)
		{
			if ($id == 'NULL') // affichage par défaut (ou du titre du thème dans liste des Sujets)
			{
				$resultat = mysqli_query($db, "SELECT * FROM theme");

				$tableTheme = array();
				while($data = mysqli_fetch_assoc($resultat))
				{
					$tableTheme[] = $this->createTheme($data);
				};
				return $tableTheme;
			}

			else if ($id != 'NULL') // affichage au clic
			{
				$resultat = mysqli_query($db, "SELECT * FROM theme WHERE id_theme ='".$id."'");

				$data = mysqli_fetch_assoc($resultat);
				$theme = $this->createTheme($data);

				return $theme;
			}
		}
	}
	function createSujet($data)
	{
		$this->data = $data;
		$sujet = new Sujet($this->db,$data);
		return $sujet;
	}
	function deleteSujet($sujet)
	{
		$db = $this->db;
		if ($db != false)
		{
			$id = $sujet->getID(); // on cree un variable id qui récupere l'id du contact

			$resultat = mysqli_query($db, "DELETE FROM sujet WHERE id_sujet ='".$id."'");
		}
	}
	function getSujet($id,$test)
	{

		$db = $this->db;

		if ($db != false)
		{
			if($test == true) // affichage du titre du Sujet dans liste des Messages
			{
				
				$resultat = mysqli_query($db, "SELECT * FROM sujet WHERE id_sujet ='".$id."'");

				$data = mysqli_fetch_assoc($resultat);
				$sujet = $this->createSujet($data);

				return $sujet;
			}
			else if($test == false)  // affichage au clic
			{
				
				$resultat = mysqli_query($db, "SELECT * FROM sujet WHERE id_theme = '".$id."'");

				$tableSujet = array();
				while($data = mysqli_fetch_assoc($resultat))
				{
					$tableSujet[] = $this->createSujet($data);
				};
				return $tableSujet;
			}
		}
	}
	function createMessage($data)
	{
		$this->data = $data;
		$message = new Message($this->db,$data);
		return $message;
	}
	function deleteMessage($message)
	{
		$db = $this->db;
		if ($db != false)
		{
			$id = $message->getID(); // on cree un variable id qui récupere l'id du contact

			$resultat = mysqli_query($db, "DELETE FROM message WHERE id_message ='".$id."'");
		}
	}
	function getMessage($id)
	{
		$db = $this->db;
		if ($db != false)
		{
			$resultat = mysqli_query($db, "SELECT * FROM message WHERE id_sujet = '".$id."' ORDER BY datecreation ASC");

			$tableMessage = array();
			while($data = mysqli_fetch_assoc($resultat))
			{
				$tableMessage[] = $this->createMessage($data);
			};
			return $tableMessage;
		}
	}
	function createUser($data)
	{
		$this->data = $data;
		$user = new User($this->db,$data);
		return $user;
	}
	function deleteUser($user)
	{
		$db = $this->db;
		if ($db != false)
		{
			$id = $user->getID(); // on cree un variable id qui récupere l'id du contact

			$resultat = mysqli_query($db, "DELETE FROM message WHERE id_user='".$id."'");
		}
	}
	function getUser()
	{
		$db = $this->db;
		if ($db != false)
		{
			$resultat = mysqli_query($db, "SELECT * FROM user");

			$data = mysqli_fetch_assoc($resultat);
			$user = $this->createUser($data);

			return $user;
		}
	}
}
?>