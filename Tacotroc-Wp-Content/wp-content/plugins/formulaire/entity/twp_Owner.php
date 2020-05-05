<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Owner
{
  /**
  * conteneur id
  *
  * @var integer
  */
  private $id;

  /**
  * conteneur last_name
  *
  * @var string
  */
  private $lastName;

  /**
  * conteneur first_name
  *
  * @var string
  */
  private $firstName;

  /**
  * conteneur compagny
  *
  * @var bool
  */
  private $compagny;

  /**
  * conteneur siret
  *
  * @var string
  */
  private $siret;

  /**
  * conteneur compagny_name
  *
  * @var string
  */
  private $compagnyName;

  /**
  * conteneur phone
  *
  * @var string
  */
  private $phone;

  /**
  * Get the value of conteneur id
  *
  * @return integer
  */
  public function getId()
  {
    return $this->id;
  }

  /**
  * Set the value of conteneur id
  *
  * @param integer id
  *
  * @return self
  */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
  * Get the value of conteneur last_name
  *
  * @return string
  */
  public function getLastName()
  {
    return $this->lastName;
  }

  /**
  * Set the value of conteneur last_name
  *
  * @param string lastName
  *
  * @return self
  */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;

    return $this;
  }

  /**
  * Get the value of conteneur first_name
  *
  * @return string
  */
  public function getFirstName()
  {
    return $this->firstName;
  }

  /**
  * Set the value of conteneur first_name
  *
  * @param string firstName
  *
  * @return self
  */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
  * Get the value of conteneur compagny
  *
  * @return bool
  */
  public function getCompagny()
  {
    return $this->compagny;
  }

  /**
  * Set the value of conteneur compagny
  *
  * @param bool compagny
  *
  * @return self
  */
  public function setCompagny($compagny)
  {
    $this->compagny = $compagny;

    return $this;
  }

  /**
  * Get the value of conteneur siret
  *
  * @return string
  */
  public function getSiret()
  {
    return $this->siret;
  }

  /**
  * Set the value of conteneur siret
  *
  * @param string siret
  *
  * @return self
  */
  public function setSiret($siret)
  {
    $this->siret = $siret;

    return $this;
  }

  /**
  * Get the value of conteneur compagny_name
  *
  * @return string
  */
  public function getCompagnyName()
  {
    return $this->compagnyName;
  }

  /**
  * Set the value of conteneur compagny_name
  *
  * @param string compagnyName
  *
  * @return self
  */
  public function setCompagnyName($compagnyName)
  {
    $this->compagnyName = $compagnyName;

    return $this;
  }

  /**
  * Get the value of conteneur phone
  *
  * @return integer
  */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
  * Set the value of conteneur phone
  *
  * @param integer phone
  *
  * @return self
  */
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  public function __construct ($ln,$fn,$c,$s,$cn,$ph)
  {
    $this->lastName=$ln;
    $this->firstName=$fn;
    $this->compagny=$c;
    $this->siret=$s;
    $this->compagnyName=$cn;
    $this->phone=$ph;

  }

     //function select all club for pagination
     public static function getAllOwnerLIMIT()
   {
     //$numberpage = $_GET['numberpage'];
     if (!isset($_GET['start'])) {
       $start = 1;
     }
     else {
       $start = $_GET['start'];
     }
     if(isset($_GET['affichage'])){
       $valeurParPage = $_GET['affichage'];
     }
     else {
       $valeurParPage = 25;
     }
     $start = $start*$valeurParPage-$valeurParPage;
     $query = "SELECT * FROM twp_Owner ORDER BY Last_Name LIMIT $start, $valeurParPage";
     $rep = Model::$pdo->query($query);
     $rep->setFetchMode (PDO::FETCH_OBJ);
     $tab_obj=$rep->fetchAll();
     return $tab_obj;
   }


  //function for select all owner in data base
  public static function getAllOwner()
  {
    $query = 'SELECT * FROM twp_Owner ORDER BY Last_Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllOwnerList()
  {
    $query = 'SELECT * FROM twp_Owner ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();


return $tab_obj;
  }


  //function for select all owner name in data base
  public static function getAllOwnerName()
  {
    $query = 'SELECT id, First_Name, Last_Name FROM twp_Owner';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllOwnerNameOrdered()
  {
    $query = 'SELECT id, First_Name, Last_Name FROM twp_Owner ORDER BY First_Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getTerm()
  {
    $query = 'SELECT CONCAT (id," ",First_Name," ",Last_Name," ",Compagny_Name) as value,CONCAT (id," ",First_Name," ",Last_Name," ",Compagny_Name) as label,id as "desc" FROM twp_Owner';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllOwnerNameConcact()
  {
    $query = 'SELECT id,CONCAT(First_Name," ",Last_Name)as "Name" FROM twp_Owner';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
  //function for registration the route of owner
  public static function saveOwner($ln,$fn,$c,$s,$cn,$ph)
  {

      echo "un propriétaire est ajoutée avec succès!";
      $prepare=("INSERT INTO twp_Owner( Last_Name, First_Name, Compagny, Siret, Compagny_Name, Phone) VALUES ( :Last_Name, :First_Name, :Compagny, :Siret, :Compagny_Name, :Phone)");
      $bdd= Model::$pdo->prepare($prepare);
      $bdd->bindParam(':Last_Name',$ln);
      $bdd->bindParam(':First_Name',$fn);
      $bdd->bindParam(':Compagny',$c);
      $bdd->bindParam(':Siret',$s);
      $bdd->bindParam(':Compagny_Name',$cn);
      $bdd->bindParam(':Phone',$ph);
      $bdd->execute();
      echo "un propriétaire est ajoutée avec succès!";

  }
//function for recup an owner with his id

  public static function getOwnerById($idUserCo)
  {
    $query = 'SELECT id, Last_Name, First_Name, Compagny, Siret, Compagny_Name, Phone FROM twp_Owner WHERE id ='.$idUserCo;
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for delete a owner
    public static function deleteOwner($id){
     $prepare =('DELETE FROM twp_Owner WHERE id=:id');
     $stmt = Model::$pdo->prepare($prepare);
     $stmt -> execute([':id' => $id]);
     echo "le poprietaire est supprimé avec succès!";
     }

     //funtion update Owner in database
     public static function updateOwner($id, $Last_Name, $First_Name, $Compagny, $Siret, $Compagny_Name, $Phone){
     $prepare = ("UPDATE twp_Owner SET Last_Name=:Last_Name, First_Name=:First_Name, Compagny=:Compagny, Siret=:Siret, Compagny_Name=:Compagny_Name, Phone=:Phone  WHERE id=:id");
     $stmt = Model::$pdo->prepare($prepare);
     $stmt -> execute([':id' => $id, ':Last_Name' => $Last_Name, ':First_Name'=>$First_Name, ':Compagny'=>$Compagny, ':Siret'=>$Siret, ':Compagny_Name'=>$Compagny_Name, ':Phone'=>$Phone ]);
     echo "le propriétaire  est modifié avec succès!";
      }
}
