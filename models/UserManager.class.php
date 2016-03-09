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

		$login = mysqli_real_escape_string($this->db, $user->getLogin());
		$password = mysqli_real_escape_string($this->db, $user->getHash());

		$register = "INSERT INTO user (login, hash) VALUES('".$login."', '".$password."')";
		// var_dump($register);
		// exit;
		$res = mysqli_query($this->db, $register);
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
		$login = mysqli_real_escape_string($this->db, $login);
		$query = "SELECT * FROM user WHERE login='".$login."'";
		$res = mysqli_query($this->db, $query);
		if ($res)
		{
			$user = mysqli_fetch_object($res, "User");
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


	


}

?>