
<?php
// PascalCase pour le nom des classes
// camelCase pour le nom des variables
class User
{
	// Déclarer les propriétés
	private $id;
	private $login;
	private $hash;
	private $date;
	private $admin;

	// Déclarer les méthodes
	// Liste des getters
	// getter de $id -> getId
	public function getId()
	{
		return $this->id;// On récupère la propriété id de $this
		// Pas de $ après ->
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
	public function isAdmin()// Un getter d'un booleen transforme le get en is
	{
		return $this->admin;
	}

	// Liste des setters
	public function setLogin($login)
	{
		if (strlen($login) > 3 && strlen($login) < 31)
			$this->login = $login;
	}
	public function setAdmin($admin)
	{
		if ($admin === true || $admin === false)
			$this->admin = $admin;
		// OU
		$this->admin = (bool)$admin;// (bool) permet de "caster" une variable en un type particulier, transformer n'importe quel type en booleen (ici)
	}

	// Liste des méthodes "autres"
	// verifier password ?
	public function verifPassword($password)
	{
		return password_verify($password, $this->hash); // ici on ne mets pas password, mais un hash puisque le mot de passe est sécurisé. Idem dans la base de donnée. Nous n'allons plus appeler password, mais hash. 
	}
	// modifier password ?
	public function editPassword($oldPassword, $newPassword1, $newPassword2)
	{
		if ($newPassword1 === $newPassword2)//ici on vérifie que les deux password st identiques (le nx mot de passe + le confirrmation du mot de passe)
		{
			$newPassword = $newPassword1; 
			if (strlen($newPassword) > 5)
			{
				if ($this->verifPassword($oldPassword))
				{
					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
			}
		}
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
				} // cette fonction nous permet d'initaliser un mot de passe en vérifiant si c'est la création d'un mot de passe ou la modification d'un mot de passe existant. 
			}
		}
	}
}

?>