<?php

class accesBD
	{
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------ATTRIBUTS PRIVES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private $hote;
	private $login;
	private $passwd;
	private $base;
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------CONSTRUCTEUR------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function __construct()
		{
		$this->hote="localhost";
		$this->login="voyageur";
		$this->passwd="voyageur";
		$this->base="voyage";
		
		}
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-----------------------------CONNECTION A LA BASE---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function connexion()
	{
		if($conn=mysqli_connect($this->hote,$this->login,$this->passwd,$this->base))
		{
			return $conn;
		}
		else
		{
			echo "Fail<br>";
		}
	}
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------CHARGEMENT DES INFORMATIONS DE LA BASE--------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function chargement($uneTable)
		{
		$lesInfos=null;
		$nbTuples=0;
		//définition de la requête SQL
		$requete = "SELECT * FROM ".$uneTable;
		//exécution de la requête SQL
		//$resultat=execRequete($requete);
		$connect=$this->connexion();
		$resultat=$connect->query($requete);
		//POUR chaque tuple retourné par la requête SQL
		while ($unTuple = mysqli_fetch_array($resultat, MYSQLI_NUM))
		{
			$nbChamps=0;
			//POUR chaque champ du tuple courant
			while ($nbChamps < mysqli_num_fields($resultat))
			{
				//enregistrement du champ dans la bonne case du tableau à deux dimensions
				$lesInfos[$nbTuples][$nbChamps]=$unTuple[$nbChamps];
				$nbChamps++;
			}
			$nbTuples++;
		}

		//retour du tableau à deux dimension
		return $lesInfos;
	}
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CREATION DE LA REQUETE D'INSERTION Contact-------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function insertContact($unNomContact,$unPrenomContact,$unMailContact,$unCommentaireContact )
		{
		//génération automatique de l'identifiant
		$sonId = $this->donneProchainIdentifiant("message","id");
		
		//définition de la requête SQL
		$requete = "INSERT INTO message (id,nom,prenom,mail,commentaire) VALUES (";
		$requete = $requete.$sonId.",";
		$requete = $requete."'".$unNomContact."',";
		$requete = $requete."'".$unPrenomContact."',";
		$requete = $requete."'".$unMailContact."',";
		$requete = $requete."'".$unCommentaireContact. "')";
		//exécution de la requête SQL
		$this->execRequete($requete);
		//retour de l'identifiant du nouveau tuple
		return $sonId;
		}

	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CREATION DE LA REQUETE D'INSERTION GUIDE-------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function insertGuide($unNomGuide)
		{
		//génération automatique de l'identifiant
		$sonId = $this->donneProchainIdentifiant("guide","id");
		
		//définition de la requête SQL
		$requete = "INSERT INTO guide (id,nom) VALUES (";
		$requete = $requete.$sonId.",";
		$requete = $requete."'".$unNomGuide."')";
		//exécution de la requête SQL
		$this->execRequete($requete);
		//retour de l'identifiant du nouveau tuple
		return $sonId;
		}
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CREATION DE LA REQUETE D'INSERTION LANGUE-------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function insertLangue($unLibelleLangue)
		{
		//génération automatique de l'identifiant
		$sonId = $this->donneProchainIdentifiant("langue","idLangue");
		//définition de la requête SQL
		$requete = "INSERT INTO langue (idLangue,libelleLangue) VALUES (";
		$requete = $requete.$sonId.",";
		$requete = $requete."'".$unLibelleLangue."')";
		//exécution de la requête SQL
		$this->execRequete($requete);
		//retour de l'identifiant du nouveau tuple
		return $sonId;
		}	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CREATION DE LA REQUETE D'INSERTION ACTIVITE-------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function insertActivite($unLibelleActivite)
		{
		//génération automatique de l'identifiant
		$sonId = $this->donneProchainIdentifiant("activite","idActivite");
		//définition de la requête SQL
		$requete = "INSERT INTO activite (idActivite,libelleActivite) VALUES (";
		$requete = $requete.$sonId.",";
		$requete = $requete."'".$unLibelleActivite."')";
		//exécution de la requête SQL
		$this->execRequete($requete);
		//retour de l'identifiant du nouveau tuple
		return $sonId;
		}	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CREATION DE LA REQUETE D'INSERTION PAYS ------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function insertPays($unNomPays, $unePhotoPays, $uneLangue)
		{
		//génération automatique de l'identifiant
		$sonId = $this->donneProchainIdentifiant("Pays","code");
		//définition de la requête SQL
		$requete = "INSERT INTO Pays (code,nom,photos,idLangue) VALUES (";
		$requete = $requete.$sonId.",";
		$requete = $requete."'".$unNomPays."',";
		$requete = $requete."'".$unePhotoPays."',";
		$requete = $requete.$uneLangue.")";
		//exécution de la requête SQL
		$this->execRequete($requete);
		//retour de l'identifiant du nouveau tuple
		return $sonId;
		}	
		
	
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
	//------------------------- MODIFICATION D'UN PAYS --------------------------------------------- A VERIFIER -------------------------------------------------------
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
	
		public function updatePays($unNomPays, $unePhotoPays, $uneLanguePays)
		{
		//définition de la requête SQL
		$requete = "UPDATE Pays SET nom = (".$unNomPays."), photos = (".$unePhotoPays."), langue = (".$uneLanguePays.") WHERE pays.id = $unIdPays";

		$requete = $requete."'".$unNomPays."',";
		$requete = $requete."'".$unePhotoPays."',";
		$requete = $requete.$uneLanguePays.")";
		//exécution de la requête SQL
		$this->execRequete($requete);
		return $unNomPays;
		return $unePhotoPays;
		return $uneLanguePays;
		
	//voir pour mettre un return qui affiche tout
		}
		
		
		
		
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-----------------------------EXECUTION D'UNE REQUETE---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function execRequete($uneRequete)
		{		
		$connect=$this->connexion();
		$resultat=$connect->query($uneRequete);
		return $resultat;
		}
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-----------------------------DONNE LE PROCHAIN INDENTIFIANT---------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function donneProchainIdentifiant($uneTable,$unIdentifiant)
		{
		//$prochainId[0]=0;
		//définition de la requête SQL
		$requete="select max(".$unIdentifiant.") from ".$uneTable;
		//exécution de la requête SQL
		$resultat=$this->execRequete($requete);
		//$resultat=mysqli_query(connexion(),$requete);
		$prochainId = mysqli_fetch_array($resultat, MYSQLI_NUM);
		//retour de l'identifiant suivant (+1)
		return $prochainId[0]+1;
		}
	//*********************************************************************
	//******************** MODIFIER UN GUIDE ******************************
	//*********************************************************************
	private function modifierGuide($unIdGuide,$unNomGuide) // UPDATE table SET nom_colonne_1 = 'nouvelle valeur', colonne_2 = 'valeur 2' WHERE condition 
		{
			//définition de la requête SQL
			$requete = "UPDATE guide SET nom = (".$unNomGuide.")  Where id =(".$unIdGuide.")";
			//exécution de la requête SQL
			$resultat = $this->execRequete($requete);
			$lesGuides = $this->listeLesGuides();
			return ($lesGuides);
		}	
	}

?>