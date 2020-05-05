<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Club
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

  public function __construct ($id, $n)
  {
    $this->name=$n;
    $this->id=$id;
  }

  //dysplay method
  public  static function showClub($id)
  {
    $query = 'SELECT * FROM twp_Club WHERE id=:id';
    $rep =  Model::$pdo->prepare($query);
    $rep->execute([':id' => $id]);
    $twp_Club = $rep->fetchAll();
    return $twp_Club;
    echo "showClub is call";
  }

   //function select all club for pagination
   public static function getAllClubLIMIT()
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
   $query = "SELECT * FROM twp_Club ORDER BY Name LIMIT $start, $valeurParPage";
   $rep = Model::$pdo->query($query);
   $rep->setFetchMode (PDO::FETCH_OBJ);
   $tab_obj=$rep->fetchAll();
   return $tab_obj;
 }


  //function for select all club in data base
  public static function getAllClub()
  {
    $query = 'SELECT * FROM twp_Club ORDER BY Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  //function for registration the route of club
  public static function saveClub($n)
  {
    $errors = [];
 			 	 if ($n == "" || strlen($n)<3) {
 			 	 	$errors["Name"] = "Veullez entrer un nom de club valide";
 			 	 }

         if (count($errors) >0) {
			 		foreach ($errors as $value) {
			 			echo $value."<br>";
			 		}
			 	}

     else {

    $prepare=("INSERT INTO twp_Club( Name) VALUES ( :Name) ");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    echo "le club ajouter avec succès!";
     }
  }

   //function delete brand in database
  public static function deleteClub($id){
  $prepare =('DELETE FROM twp_Club WHERE id=:id');
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id]);
  echo "le club est supprimé avec succès!";
     }

     //funtion update brand in database
  public static function updateClub($id, $Name){
  $prepare = ("UPDATE twp_Club SET Name=:Name WHERE id=:id");
  $stmt = Model::$pdo->prepare($prepare);
  $stmt -> execute([':id' => $id, ':Name' => $Name]);
  echo "le club est modifiée avec succès!";
      }

  }
