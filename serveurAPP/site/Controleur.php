<?php
//include du fichier GESTION pour les objets (Modeles)
include 'Modeles/gestionVoyage.php';

//classe CONTROLEUR qui redirige vers les bonnes vues les bonnes informations
class Controleur
	{
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------ATTRIBUTS PRIVES-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private $monAgence;
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CONSTRUCTEUR------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function __construct()
		{
		$this->monAgence = new gestionVoyage();
		}
		
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------METHODE D'AFFICHAGE DE L'ENTETE-----------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function afficheEntete()
		{
		//appel de la vue de l'entête
		require 'Vues/entete.php';
		}
		
		//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------METHODE D'AFFICHAGE Contact-----------------------------------------------------------------------------------------------------------------------------------------------------------------
	//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		public function afficheautre($page,$actionautre)
		{
			switch ($page)
			{
				case"contact";
					$this->vueContact($actionautre);
					break;
			}
		}		
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	//---------------------------METHODE D'AFFICHAGE DU PIED DE PAGE------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function affichePiedPage()
		{
		//appel de la vue du pied de page
		require 'Vues/piedPage.php';
		}
		
		
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------METHODE D'AFFICHAGE DU MENU-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	 public function afficheMenu()
		{
		//appel de la vue du menu
		require 'Vues/menu.php';
		}
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------METHODE D'AFFICHAGE DES VUES----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function affichePage($action,$vue)
		{
		//SELON la vue demandée
		switch ($vue)
			{
			case "guide":
				$this->vueGuide($action);
				break;
			
			case "pays":
				$this->vuePays($action);
				break;
				case "langue":
				$this->vueLangue($action);
				break;
			case "accueil":
				session_destroy();
				break;
				
		   
			}
		}
			//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------CONTACT--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			private function vueContact($actionautre)
			{
			switch($actionautre)
				{
				case "ajouter" :
					require 'Vues/contact.php';
					break;
				case "sauver" :
					$nomContact = $_POST['nomContact'];
					$prenomContact = $_POST['prenomContact'];	
					$mailContact = $_POST['mailContact'];	
					$textContact = $_POST['textContact'];	
					if ((empty($nomContact))&&(empty($prenomContact))&&(empty($mailContact))&&(empty($textContact)))
					{	
						$message = "Veuillez saisir les informations";
						$lien = 'index.php?page=contact&actionautre=ajouter';
						$_SESSION['message'] = $message;
						$_SESSION['lien'] = $lien;
						require 'Vues/erreur.php';
					}
					else
					{
					$this->monAgence->ajouteUnContact($nomContact,$prenomContact,$mailContact,$textContact);
					require 'Vues/enregistrer.php';
					$_SESSION['Controleur'] = serialize($this);
					}
				    break;
				}
			}
			
			
			
			
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------GUIDE--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vueGuide($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS ajout d'un guide---------------------------------------------------------------------------------------------------------
			case "ajouter" :
				require 'Vues/ajouterGuide.php';
				break;
				
			//CAS visualisation des guides-------------------------------------------------------------------------------------------------
			case "visualiser" :
				if ($this->monAgence->donneNbGuides()==0)
					{
					$message = "Il n'existe pas de guide";
					$lien = 'index.php?vue=guide&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$_SESSION['lesGuides'] = $this->monAgence->listeLesGuides();
					require 'Vues/voirGuides.php';
					}
				break;
				
			//CAS enregistrement d'un guide dans la base------------------------------------------------------------------------------
			case "enregistrer" :
				$nomGuide = $_POST['nomGuide'];
				if (empty($nomGuide))
					{
					$message = "Veuillez saisir les informations";
					$lien = 'index.php?vue=guide&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$this->monAgence->ajouteUnGuide($nomGuide);
					require 'Vues/enregistrer.php';
					$_SESSION['Controleur'] = serialize($this);
					}
				break;
				
			//CAS détails d'un guide-------------------------------------------------------------------------------------------------------------
			case "detail" :
				$_SESSION['details']=$this->monAgence->donneDetails($_GET['numero']);
				require 'Vues/detailGuide.php';
				break;
			
			//CAS modif d'un guide ***************************************************************************************************************
			case "modifer":
				require 'Vues/modiferGuide.php';
				break;
			
			//CAS modification d'un guide dans la base *******************************************************************************************
			case "enregistrerModifier" :
				$idGuide = $_POST['idGuide'];
				if(empty($idGuide))
				{
					$message = "Veuillez saisir l'Identifiant du guide à modifier";
					$lien = 'index.php?vue=guide&action=modifier';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
				}
				else
				{
					$this->monAgence->modifierUnGuide($nomGuide);
					require 'modifEnregistrer.php';
					$_SESSION['Controleur'] = serialize($this);
				}
				break;
			}
		}
		
		
		
		//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------CONNEXION--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vueConnexion($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS ajout d'un connexion---------------------------------------------------------------------------------------------------------
			case "inscription" :
				require 'Vues/inscription.php';
				break;
				
			//CAS visualisation des guides-------------------------------------------------------------------------------------------------
			case "visualiser" :
				if ($this->monAgence->donneNbGuides()==0)
					{
					$message = "Il n'existe pas de guide";
					$lien = 'index.php?vue=connexion&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				
				break;
				
			
				
			
			}
		}
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------PAYS-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vuePays($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS ajout d'un pays---------------------------------------------------------------------------------------------------------
			case "ajouter" :
				$_SESSION['lesLangues'] = $this->monAgence->leslanguesAuFormatHTML();
				require 'Vues/ajouterPays.php';
				break;
				
				
			//CAS visualisation des Pays------------------------------------------------------------------------------------------------
			case "visualiser" :
				if ($this->monAgence->donneNbPays()==0)
					{
					$message = "Il n'existe pas de Pays";
					$lien = 'index.php?vue=pays&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$_SESSION['lesPays'] = $this->monAgence->listeLesPays();
					require 'Vues/voirPays.php';
					}
				break;
				
			//CAS enregistrement d'un pays dans la base------------------------------------------------------------------------------
			case "enregistrer" :
				$nom = $_POST['nomPays'];
				$photo = $_POST['photoPays'];
				$langue = $_POST['idLangue'];
				if (empty($nom) || empty($langue) || empty($photo))
					{
					$message = "Veuillez saisir les informations";
					$lien = 'index.php?vue=pays&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$this->monAgence->ajouteUnPays($nom,$photo,$langue);
					require 'Vues/enregistrer.php';
					$_SESSION['Controleur'] = serialize($this);
					}
				break;
				
				//CAS modifier un pays ----------------------------------------------------------------------------------------------------
				
				case "modifierenregistrer" :
				require 'Vues/modifierPays.php';
				break;
						
						$nom = $_POST['nomPays'];
						$photo = $_POST['photoPays'];
						$langue = $_POST['idLangue'];
						if (empty($nom) || empty($langue) || empty($photo))
							{
							$message = "Veuillez saisir les informations";
							$lien = 'index.php?vue=pays&action=modifierPays';
							$_SESSION['message'] = $message;
							$_SESSION['lien'] = $lien;
							require 'Vues/erreur.php';
							}
						else
							{
							$this->monAgence->modifierPays($nom,$photo,$langue);
							$_SESSION['Controleur'] = serialize($this);
							$_SESSION['lesLangues'] = $this->monAgence->leslanguesAuFormatHTML();
							require 'Vues/modifierenregistrerenregistrer.php';
							}
				// on recup l'id, et verifie que ya qqchose + gestion erreur
				//+ vue erreur
				
			
		
			}
		}
		
		
		private function vueLangue($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS ajout d'une Langue---------------------------------------------------------------------------------------------------------
			case "ajouter" :
				require 'Vues/ajouterLangue.php';
				break;
				
				
			//CAS visualisation des Langues------------------------------------------------------------------------------------------------
			case "visualiser" :
				if ($this->monAgence->donnenbLangues()==0)
					{
					$message = "Il n'existe pas de Langue";
					$lien = 'index.php?vue=langue&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$_SESSION['voirLesLangues'] = $this->monAgence->listeLesLangues();
					require 'Vues/voirLangues.php';
					}
				break;
				
			//CAS enregistrement d'une langue dans la base------------------------------------------------------------------------------
			/*case "enregistrer" :
				$nom = $_POST['nomPays'];
				$photo = $_POST['photoPays'];
				$langue = $_POST['idLangue'];
				if (empty($nom) || empty($langue) || empty($photo))
					{
					$message = "Veuillez saisir les informations";
					$lien = 'index.php?vue=langue&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$this->monAgence->ajouteUnPays($nom,$photo,$langue);
					require 'Vues/enregistrer.php';
					$_SESSION['Controleur'] = serialize($this);
					}
				break;*/
			}
		}	
		
		
		
		
		
		
		

	}	
?>