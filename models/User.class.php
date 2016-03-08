
<?php




class User
{
	private $id;
	private $login;
	private $hash;
	private $date;
	private $admin;

	public function __construct()
	{
		
	}

	public function getId()
	{
		return $this->id;

	}
	public function getLogin()
	{
		return $this->login;
	}
	public function getDate()
	{
		return $this->date;
	}

	public function getHash()
	{
		return $this->hash;
	}
	public function isAdmin()

	{
		return $this->admin;
	}



	public function setLogin($login)
	{
		if (strlen($login) > 3 && strlen($login) < 31)
			$this->login = $login;

		else
			throw new Exception("Login incorrect (doit être compris entre 4 et 30 caractères)");

	}
	public function setAdmin($admin)
	{
		if ($admin === true || $admin === false)
			$this->admin = $admin;

		else
			throw new Exception("Admin incorrect (doit être égal à true ou false)");
	}

	public function verifPassword($password)
	{
		if (!password_verify($password, $this->hash))
			throw new Exception("Mot de passe incorrect");
	}
	public function editPassword($oldPassword, $newPassword1, $newPassword2)
	{
		if ($newPassword1 === $newPassword2)
		{
			$newPassword = $newPassword1;

			if (strlen($newPassword) > 5)
			{
				if ($this->verifPassword($oldPassword))
				{

					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
				else
					throw new Exception("Ancien mot de passe incorrect");
			}
			else
				throw new Exception("Mot de passe est trop court (< 6 caractères)");
		}
		else
			throw new Exception("Les deux mots de passes ne correspondent");
	}
	public function initPassword($newPassword1, $newPassword2)

	{
		if ($this->hash == null)
		{
			if ($newPassword1 === $newPassword2)
			{
				$newPassword = $newPassword1;
				if (strlen($newPassword) > 5)
				{
					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);

				}
				else
					throw new Exception("Mot de passe est trop court (< 6 caractères)");
			}
			else
				throw new Exception("Les deux mots de passes ne correspondent");
		}
		else
			throw new Exception("Impossible d'initialiser un mot de passe une seconde fois");
	}
}

?>