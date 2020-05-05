<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');
class twp_Version
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
  public function showVersion()
  {
    $query = 'SELECT * FROM twp_Version';
    $rep =  Model::$pdo->prepare($query);
    $rep->execute();
    $twp_Version = $rep->fetchAll();
  }

   //function select all club for pagination
   public static function getAllVersionLIMIT()
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
   $query = "SELECT * FROM twp_Version ORDER BY Name LIMIT $start, $valeurParPage";
   $rep = Model::$pdo->query($query);
   $rep->setFetchMode (PDO::FETCH_OBJ);
   $tab_obj=$rep->fetchAll();
   return $tab_obj;
 }


  //function for select all version in data base
  public static function getAllVersion()
  {
    $query = 'SELECT * FROM twp_Version ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllVersionOrdered()
  {
    $query = 'SELECT * FROM twp_Version ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for registration the route of version
  public static function saveVersion($n)
  {
    $errors = [];
         if ($n == "" || strlen($n)<1) {
          $errors["Name"] = "Veullez entrer une version de voiture valide";
         }
         if (count($errors) >0) {
          foreach ($errors as $value) {
            echo $value."<br>";
          }
        }

  else {
    $prepare=("INSERT INTO twp_Version(Name) VALUES ( :Name)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    echo "la version est ajouté avec succès!";
    }
  }


      //function for delete version
      public static function deleteVersion($id){
      $prepare =('DELETE FROM twp_Version WHERE id=:id');
      $stmt = Model::$pdo->prepare($prepare);
      $stmt -> execute([':id' => $id]);
      echo "la version est supprimé avec succès!";
         }

      //funtion update brand in database
      public static function updateVersion($id, $Name){
      $prepare = ("UPDATE twp_Version SET Name=:Name WHERE id=:id");
      $stmt = Model::$pdo->prepare($prepare);
      $stmt -> execute([':id' => $id, ':Name' => $Name]);
      echo "la version  est modifiée avec succès !";

     }
}
