<?php
include '/var/www/html/Modeles/Metiers/pays.php';

Class conteneurPays
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesPays;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		$this->lesPays = new arrayObject();
		}
	
	//METHODE AJOUTANT UN Pays------------------------------------------------------------------------------
	public function ajouteUnPays($unIdPays, $unNomPays, $unePhotoPays, $uneLanguePays)
		{
		$unPays = new pays($unIdPays, $unNomPays, $unePhotoPays, $uneLanguePays);
		$this->lesPays->append($unPays);
			
		}
	
		
	//METHODE RETOURNANT LE NOMBRE DE PAYS-------------------------------------------------------------------------------
	public function nbPays()
		{
		return $this->lesPays->count();
		}

	//METHODE MODIFIANT UN PAYS---------------------------------------------------------------------------------------------------
		public function modifierUnPays($unPays)
		{
		$unPays = new pays($unIdPays, $unNomPays, $unePhotoPays, $uneLanguePays); //la méthode modifier n'est pas ajouter
		$this->lesPays->$unPays; //Faut il laisser LesPays	
			
		}		
		
	//METHODE RETOURNANT LA LISTE DES PAYS-----------------------------------------------------------------------------------------
	public function listeDesPays()
		{
		$liste = '<div class="w3-container w3-blue"><h2>Les pays</h2></div>';
		foreach ($this->lesPays as $unPays)
			{	$laLangue=$unPays->getSaLangue();
			     $liste = $liste.' <Br>  <div class="w3-container  w3-card-4 " style="width:50% "> <img src="Images/'.$unPays->getPhotoPays().'" alt="Norway" style="width:40%">';
				$liste = $liste.'<div class="w3-container w3-center"> <p> En "'.$unPays->getNomPays().' on parle :'.$laLangue->getLibelleLangue().'</p></div></div>';
				
			}
		return $liste;
		}
		
		//METHODE RETOURNANT LA LISTE DES PAYS DANS UNE BALISE <SELECT>------------------------------------------------------------------
	public function lesPaysAuFormatHTML()
		{
		$liste = "<SELECT name = 'idPays'>";
		foreach ($this->lesPays as $unPays)
			{
			$liste = $liste."<OPTION value='".$unPays->getIdPays()."'>".$unPays->getNomPays()."</OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}			
	
	}
	
?> 