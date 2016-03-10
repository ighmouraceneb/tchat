<?php
class Message
{
	private $id;
	private $id_user;
	private $user;// Propriété calculée -> PAS dans db
	private $date;
	private $content;
	private $db;
// Déclarer les méthodes
	// Liste des getters
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getUser()
	{
		if ($this->user == null)
		{
			$manager = new UserManager($this->db);
			$this->user = $manager->getById($this->id_user);
		}
		return $this->user;
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
	public function setUser(User $user)
	{
		$this->user = $user;
		$this->id_user = $user->getId();
	}
}
	
	?>