<?php

class Message
{

	private $id;
	private $id_user;
	private $date;
	private $content;

// Déclarer les méthodes
	// Liste des getters


		public function __construct()
	{
		
	}
	public function getId()
	{
		return $this->id;
	}
	public function getIdUser()
	{
		return $this->id_user;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getContent()
	{
		return $this->content;
	}

	// Liste des setters
	public function setContent($content)
	{
		if (strlen($content)  < 2047)
			$this->content = $content;

		else
			throw new Exception("Message trop long (2047 caractères maximum)");
	}

	public function setIdUser($id_user)
	{
		
			$this->id_user = $id_user;
	
	}

}
	
	?>