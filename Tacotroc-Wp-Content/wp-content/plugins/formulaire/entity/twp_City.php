<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_City
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
  public function showCity()
  {
    echo $this->getId(). "</br>";
    echo $this->getName();
  }

  //function for select all city in data base
  public static function getAllCity()
  {
    $query = 'SELECT * FROM twp_City';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for registration the route of city
  public static function saveCity($n)
  {
    $errors = [];
         if ($n == "" || strlen($n)<1) {
          $errors["Name"] = "Veullez entrer un nom de pays valide";
         }
         if (count($errors) >0) {
          foreach ($errors as $value) {
            echo $value."<br>";
          }
        }

  else {

    echo "votre marque est ajoutée avec succès!";
    $prepare=("INSERT INTO twp_City(Name) VALUES (:Name)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    }
  }
}
