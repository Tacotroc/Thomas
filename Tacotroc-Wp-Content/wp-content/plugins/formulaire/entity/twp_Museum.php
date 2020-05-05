<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Museum
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
  public function showMuseum()
  {

  }

  //function for select all museum in data base
  public static function getAllMuseum()
  {
    $query = 'SELECT * FROM twp_Museum ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

     //function select all club for pagination
     public static function getAllMuseumLIMIT()
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
     $query = "SELECT * FROM twp_Museum ORDER BY Name LIMIT $start, $valeurParPage";
     $rep = Model::$pdo->query($query);
     $rep->setFetchMode (PDO::FETCH_OBJ);
     $tab_obj=$rep->fetchAll();
     return $tab_obj;
   }


  //function for registration the route of museum
  public static function saveMuseum($n)
  {
    $errors = [];
         if ($n == "" || strlen($n)<1) {
          $errors["Name"] = "Veullez entrer un nom de musée valide";
         }
         if (count($errors) >0) {
          foreach ($errors as $value) {
            echo $value."<br>";
          }
        }

  else {
    $prepare=("INSERT INTO twp_Museum(Name) VALUES (:Name)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    echo "votre musée est ajoutée avec succès!";
    }
  }

  //function for delete the museum
  public static function deleteMuseum($id){
  $prepare =('DELETE FROM twp_Museum WHERE id=:id');
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id]);
  echo "le musée est supprimé avec succès!";
     }

  //funtion update brand in database
  public static function updateMuseum($id, $Name){
  $prepare = ("UPDATE twp_Museum SET Name=:Name WHERE id=:id");
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id, ':Name' => $Name]);
  echo "la marque est modifiée avec succès!";
      }
}
