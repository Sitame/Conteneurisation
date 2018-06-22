<?php

Class contact
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $idContact;
	private $nomContact;
	private $prenomContact;
	private $mailContact;
	private $commentaireContact;
	
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct($unIdContact, $unNomContact, $unPrenomContact,$unMailContact,$unCommentaireContact)
		{
		$this->idContact = $unIdContact;
		$this->nomContact = $unNomContact;
		$this->prenomContact = $unPrenomContact;
		$this->mailContact = $unMailContact;
		$this->commentaireContact = $unCommentaireContact;
		
		}
	
	//ACCESSEURS-------------------------------------------------------------------------------
	public function getIdContact()
		{
		return $this->idContact;
		}
		
	public function getNomContact()
		{
		return $this->nomContact;
		}
		
	public function getPrenomContact()
		{
		return $this->prenomContact;
		}
		
	public function getMailContact()
		{
		return $this->mailContact;
		}
		
	public function getCommentaireContact()
		{
		return $this->commentaireContact;
		}
	}	
	
	
	
	
?>