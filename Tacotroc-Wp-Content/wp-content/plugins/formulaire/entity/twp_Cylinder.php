<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Cylinder
{
  /**
  * conteneur id
  *
  * @var integer
  */
  private $id;

  /**
  * conteneur cylinder
  *
  * @var string
  */
  private $cylinder;


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
  * Get the value of conteneur cylinder
  *
  * @return string
  */
  public function getCylinder()
  {
    return $this->cylinder;
  }

  /**
  * Set the value of conteneur cylinder
  *
  * @param string cylinder
  *
  * @return self
  */
  public function setCylinder($cylinder)
  {
    $this->cylinder = $cylinder;

    return $this;
  }

  public function __construct ($c)
  {
    $this->cylinder=$c;
  }

  //dysplay method
  public function showCylinder()
  {
    $query = 'SELECT * FROM twp_Cylinder';
    $rep =  Model::$pdo->prepare($query);
    $rep->execute();
    $twp_Cylinder = $rep->fetchAll();
  }

   //function select all club for pagination
   public static function getAllCylinderLIMIT()
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
   $query = "SELECT * FROM twp_Cylinder ORDER BY Cylinder LIMIT $start, $valeurParPage";
   $rep = Model::$pdo->query($query);
   $rep->setFetchMode (PDO::FETCH_OBJ);
   $tab_obj=$rep->fetchAll();
   return $tab_obj;
 }


  //function for select all cylinder in data base
  public static function getAllCylinder()
  {
    $query = 'SELECT * FROM twp_Cylinder ORDER BY Cylinder';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllCylinderConcact()
  {
    $query = 'SELECT id,Cylinder as "Name" FROM twp_Cylinder';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for registration the route of cylinder
  public static function saveCylinder($c)
  {
    $errors = [];
         if ($c == "") {
          $errors["Name"] = "Veullez entrer un cylindrer valide !";
         }
         if (count($errors) >0) {
          foreach ($errors as $value) {
            echo $value."<br>";
          }
        }

  else {
    $prepare=("INSERT INTO twp_Cylinder(Cylinder) VALUES ( :Cylinder)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Cylinder',$c);
    $bdd->execute();
    echo "votre cylindrer est ajouté avec succès!";
    }
  }

 //funtion delete cylinder in database
  public static function deleteCylinder($id){
       $prepare =('DELETE FROM twp_Cylinder WHERE id=:id');
       $stmt = Model::$pdo->prepare($prepare);
       $stmt -> execute([':id' => $id]);
       echo "le cylindre est supprimé avec succès!";
     }

     //funtion update cylinder in database
  public static function updateCylinder($id, $Cylinder){
  $prepare = ("UPDATE twp_Cylinder SET Cylinder=:Cylinder WHERE id=:id");
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id, ':Cylinder' => $Cylinder]);
  echo "le cylindre est modifié avec succès!";
      }
}
