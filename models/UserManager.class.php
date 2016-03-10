<?php
class UserManager
{
	// Déclarer les propriétés
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function create($login, $password1, $password2)
	{
		$user = new User();
		$user->setLogin($login);
		$user->initPassword($password1, $password2);

//AVANT :		$login = mysqli_real_escape_string($this->db, $user->getLogin());
		$login = $this->db->quote($user->getLogin());



//AVANT: 		$password = mysqli_real_escape_string($this->db, $user->getHash());
		$password = $this->db->quote($user->getHash());



		$register = "INSERT INTO user (login, hash) VALUES(".$login.", ".$password.")";
		// var_dump($register);
		// exit;


		// AVANT: $res = mysqli_query($this->db, $register);
		$res = $this->db->query($register);

		if ($res)
			{
				$user = $this->getByLogin($user->getLogin());
			
				if ($user)
				{
					return $user;
				}
				else
					throw new Exception("Utilisateur non existant");
			}
			else
				throw new Exception("Erreur interne");
	}




	public function getByLogin($login)
	{
// AVANT: $login = mysqli_real_escape_string($this->db, $login);
$login = $this->db->quote($login);	
// AVANT : $query = "SELECT * FROM user WHERE login='".$login."'";
$query = "SELECT * FROM user WHERE login=".$login;

// AVANT: $res = mysqli_query($this->db, $query);
$res = $this->db->query($query);
		if ($res)
		{
			// AVANT : $user = mysqli_fetch_object($res, "User");
			$user = $res->fetchObject("User");

			if ($user)
			{
				return $user;
			}
			else
				throw new Exception("Utilisateur non existant");
		}
		else
			throw new Exception("Erreur interne2");
	}


	


}

?>