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

public function create($content)
{
	$message = new Message();
	$message->setContent($content);
	

	$content = mysqli_real_escape_string($this->db, $message->getContent());


	$edit = "INSERT INTO message (content, id_user)  VALUES('".$content."', '".$_SESSION['id']."')";

	// var_dump($register);
	// exit;
	$res = mysqli_query($this->db, $edit);
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
	$query = "SELECT * FROM message";
    $res = mysqli_query($this->db, $query);
    $messages = [];
     while ($message = mysqli_fetch_object($res, 'Message'))
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