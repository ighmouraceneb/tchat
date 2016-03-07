<?php
// PascalCase pour le nom des classes
// camelCase pour le nom des variables
class User
{
	// Déclarer les propriétés
	private $id;
	private $login;
	private $password;
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
					$this->password = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
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

// Tout ça n'a rien a foutre dans le fichier User.class.php, mais c'est plus pratique pour apprendre. Sera plutôt ds le fichier traitement. On va instancier notre classe User (càd que l'on va récupérer la boite User pour en faire un User. Nous allons avoir une représentation d'un user que l'on va pourvoir manupuler. On va crérer un user qui corespnod au modèle qui suit.Pr info dès qiue l'on voit un new c'est qu'il y a une classe, un objet)
$user = new User();
// $user -> objet
// User -> classe
// Un objet est une instance d'une classe


var_dump($user);

/* ci dessous résultat du var dump
object(User)[1]
  private 'id' => null
  private 'login' => null
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/


$user->setLogin("toto");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
Si on fait un set login toto et un var dump on aura une niouvelle information toto*/ 


$user->setLogin("aa");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
Lee login est trop court, il ne sera donc pas remplacer par aa mais va garder toto*/



$user->initPassword("totototo", "totototo");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => string '$2y$12$9n144prWnPaTt2SmtJGj6OVfHX9lZZQVELrQWwQqwD0OHPiYmQzBi' (length=60)
  private 'date' => null
  private 'admin' => null
*/
$user->initPassword("titititi", "titititi");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => string '$2y$12$9n144prWnPaTt2SmtJGj6OVfHX9lZZQVELrQWwQqwD0OHPiYmQzBi' (length=60)
  private 'date' => null
  private 'admin' => null

Le mot de passe ne s'initalise qu'une seule fois, donc si je refais un initpassword, il ne prendra pas en compte la deuxième requète. Ce qui explique que le password hashé est identique, c'est que c'est bon. */


?>