<?php
include '/var/www/html/Modeles/Metiers/contact.php';

Class conteneurContact
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesContacts;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		$this->lesContacts = new arrayObject();
		}
	
	//METHODE AJOUTANT UN GUIDE-----------------------------------------------------------------------------------
	public function ajouteUnContact($unIdContact,$unNomContact, $unPrenomContact,$unMailContact,$unCommentaireContact)
		{
		$unContact = new contact ($unIdContact,$unNomContact, $unPrenomContact,$unMailContact,$unCommentaireContact);
		$this->lesContacts->append($unContact);
		}
		
	
	//METHODE RETOURNANT UN CONTACT A PARTIR DE SON NUMERO--------------------------------------------	
	public function donneObjetContactDepuisNumero($unIdContact)
		{
		//initialisation d'un booléen (on part de l'hypothèse que la langue n'existe pas)
		$trouve=false;
		$leBonContact=null;
		//création d'un itérateur sur la collection lesLangues
		$iContact = $this->lesContacts->getIterator();
		//TQ on a pas trouvé la langue et que l'on est pas arrivé au bout de la collection
		while ((!$trouve)&&($iContact->valid()))
			{
			//SI le numéro de la langue courante correspond au numéro passé en paramètre
			if ($iContact->current()->getIdContact()==$unIdContact)
				{
				//maj du booléen
				$trouve=true;
				//sauvegarde de la langue courante
				$leBonContact = $iContact->current();
				
				}
			//SINON on passe à la langue suivante
			else
				$iContact->next();
			}
		return $leBonContact;
		}
	}
?>