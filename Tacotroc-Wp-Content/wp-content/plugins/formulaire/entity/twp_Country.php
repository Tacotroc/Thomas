<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Country
{
  /**
  * conteneur id
  *
  * @var integer
  */
  private $id;

  /**
  * conteneur name
  *
  * @var string
  */
  private $name;


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
  * Get the value of conteneur name
  *
  * @return string
  */
  public function getName()
  {
    return $this->name;
  }

  /**
  * Set the value of conteneur name
  *
  * @param string name
  *
  * @return self
  */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  public function __construct ($n)
  {
    $this->name=$n;
  }

  // dysplay method
  public function showCountry()
  {
    echo $this->getId(). "</br>";
    echo $this->getName();
  }

  //function for select all country in data base
  public static function getAllCountry()
  {
    $query = 'SELECT * FROM twp_Country ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

   //function select all club for pagination
   public static function getAllCountryLIMIT()
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
   $query = "SELECT * FROM twp_Country ORDER BY Name LIMIT $start, $valeurParPage";
   $rep = Model::$pdo->query($query);
   $rep->setFetchMode (PDO::FETCH_OBJ);
   $tab_obj=$rep->fetchAll();
   return $tab_obj;
 }

  //function for registration the route of country
  public static function saveCountry($n,$url)
  {

    $n = strtolower($n);
    $n = ucfirst($n);
    echo($n);

    $prepare=("INSERT INTO twp_Country ( Name) VALUES ( :Name)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    echo "le pays est ajouté avec succès!";
    
  }

  // function delete country in database
  public static function deleteCountry($id){
  $prepare =('DELETE FROM twp_Country WHERE id=:id');
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id]);
  echo "le pays est supprimé avec succès!";
     }

  //funtion update country in database
  public static function updateCountry($id, $Name){
  $prepare = ("UPDATE twp_Country SET Name=:Name WHERE id=:id");
  $stmt = Model::$pdo->prepare($prepare);
  $result = $stmt->execute([':id' => $id, ':Name' => $Name]);
  
  if($result == false){
    return $result;
  }else{
    echo "le pays est modifié avec succès!";

  }
      }
}
