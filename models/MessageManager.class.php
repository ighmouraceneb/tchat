<?php
class MessageManager
{
	// Déclarer les propriétés
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}

public function create($content, User $user)
{
	$message = new Message($this->db);
	$message->setContent($content);
	$message->setUser($user);
	
	// AVANT : $content = mysqli_real_escape_string($this->db, $message->getContent());
	$content = $this->db->quote($message->getContent());
	$id = intval($message->getUser()->getId());
	$edit = "INSERT INTO message (content, id_user)  VALUES(".$content.", '".$id."')";

	// var_dump($register);
	// exit;


	// AVANT: $res = mysqli_query($this->db, $edit);
	$res = $this->db->query($edit);

	if ($res)
		{
			// $message = $this->getById();
		
			// if ($message)
			// {
			// 	return $message;
			// }
		
			// else
			// throw new Exception("Erreur interne");
		}
		
	}

public function getAll()
{
	// AVANT : $query = "SELECT * FROM message";
	$query = "SELECT * FROM message";
    // AVANT: $res = mysqli_query($this->db, $query);
    $res = $this->db->query($query);

    $messages = [];
     // AVANT : while ($message = mysqli_fetch_object($res, 'Message'))
    while ($message = $res->fetchObject("Message", [$this->db]))
     {
		 $messages[] = $message;
	  }
	  return $messages;
}


//	public function getByLogin($login)
	// {
	// 	$login = mysqli_real_escape_string($this->db, $login);
	// 	$query = "SELECT * FROM user WHERE login='".$login."'";
	// 	$res = mysqli_query($this->db, $query);
	// 	if ($res)
	// 	{
	// 		$user = mysqli_fetch_object($res, "User");
	// 		if ($user)
	// 		{
	// 			return $user;
	// 		}
	// 		else
	// 			throw new Exception("Utilisateur non existant");
	// 	}
	// 	else
	// 		throw new Exception("Erreur interne");
	// }





}

?>