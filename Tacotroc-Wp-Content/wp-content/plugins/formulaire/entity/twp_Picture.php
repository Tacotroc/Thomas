<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Picture
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
  * conteneur route
  *
  * @var string
  */
  private $route;

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

  /**
  * Get the value of conteneur route
  *
  * @return string
  */
  public function getRoute()
  {
    return $this->route;
  }

  /**
  * Set the value of conteneur route
  *
  * @param string route
  *
  * @return self
  */
  public function setRoute($route)
  {
    $this->route = $route;

    return $this;
  }

  public function __construct ($n,$r)
  {
    $this->name=$n;
    $this->route= $r;
  }

  //dysplay method
  public function showPicture()
  {
    echo $this->getId(). "</br>";
    echo $this->getName(). "</br>";
    echo $this->getRoute();
  }

  //function for select all picture in data base
  public static function getAllPicture()
  {
    $query = 'SELECT * FROM twp_Picture';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

//function for registration the route of picture
  public static function savePicture($n,$r)
  {
    $prepare=("INSERT INTO twp_Picture(id, Name, Route) VALUES ('', :Name, :Route)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->bindParam(':Route',$r);
    $bdd->execute();
    if(!$bdd){
      echo"not";
    }
  }
}
