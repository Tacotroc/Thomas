<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');


class twp_Brand
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

  //dysplay method
  public static function showBrand($id)
  {
    $query = 'SELECT * FROM twp_Brand';
    $rep =  Model::$pdo->prepare($query);
    $rep->execute();
    $twp_Brand = $rep->fetch($id);

}

//function to get id by name
// public static function getIdName($name){
//   $query = ("SELECT id FROM twp_brand WHERE Name = :name");
//   $rep = Model::$pdo->query($query);

// }

  //function select all club for pagination
  public static function getAllBrandLIMIT()
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
  $query = "SELECT * FROM twp_Brand ORDER BY Name  LIMIT $start, $valeurParPage";
  $rep = Model::$pdo->query($query);
  $rep->setFetchMode (PDO::FETCH_OBJ);
  $tab_obj=$rep->fetchAll();
  return $tab_obj;
}


  //function for select all brand in data base
  public static function getAllBrand()
  {

    $query = 'SELECT * FROM twp_Brand ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for registration the route of brand
  public static function saveBrand($n,$url)
  {
    $prepare=("INSERT INTO twp_brand(Name) VALUES (:Name)");
    $bdd= Model::$pdo->prepare($prepare);
      $bdd->bindParam(':Name',$n);
      $bdd->execute();
  }

  //funtion for delete brand in database
  public static function deleteBrand($id){
  $prepare =('DELETE FROM twp_Brand WHERE id=:id');
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id]);
  echo "la marque est supprimé avec succès!";
     }

  //funtion update brand in database
  public static function updateBrand($id, $Name, $u){
  $prepare = ("UPDATE twp_Brand SET Name=:Name WHERE id=:id");
  $stmt = Model::$pdo->prepare($prepare);
  $result = $stmt->execute([':id' => $id, ':Name' => $Name]);
    
  
  
   }
 }
