<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Serie
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
  public function showSerie()
  {
    echo $this->getId(). "</br>";
    echo $this->getName();
  }


/*
  public static function getSerieById($n)
  {
    $query ="SELECT Name  FROM twp_Serie where id=".$n;
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    var_dump($query);
    return $tab_obj;
  }
*/
  public static function getSerieById($i) {
    $prepare= 'SELECT name FROM `twp_Serie` WHERE id=:idd';
    $rep = Model::$pdo->prepare($prepare);
    $rep->bindParam(':idd',$i);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $rep->execute();
    $tab_obj=$rep->fetchAll();
    return   $tab_obj ;


  }

  //function for select all serie in data base
  public static function getAllSerie()
  {
    $query = 'SELECT * FROM twp_Serie';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllSerieOrdered()
  {
    $query = 'SELECT * FROM twp_Serie ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

//function for select all serie in data base
public static function getAllSerieLIMIT()
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
  $query = "SELECT * FROM twp_Serie ORDER BY Name LIMIT $start, $valeurParPage";
  $rep = Model::$pdo->query($query);
  $rep->setFetchMode (PDO::FETCH_OBJ);
  $tab_obj=$rep->fetchAll();
  return $tab_obj;
}

  //function for registration the route of serie
  public static function saveSerie($n)
  {
    $prepare=("INSERT INTO twp_Serie(id,Name) VALUES ('', :Name)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    if(!$bdd){
      echo"not";
    }
  }
}
