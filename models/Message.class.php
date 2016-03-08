<?php

class Message
{

	private $id;
	private $id_user;
	private $date;
	private $content;

// Déclarer les méthodes
	// Liste des getters
	public function getId()
	{
		return $this->id;
	}
	public function getId_user()
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
	}
	