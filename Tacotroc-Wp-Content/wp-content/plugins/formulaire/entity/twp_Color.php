<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');

class twp_Color
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
  public function showColor()
  {
    $query = 'SELECT * FROM twp_Color';
    $rep =  Model::$pdo->prepare($query);
    $rep->execute();
    $twp_Color = $rep->fetchAll();
  }

  //function for select all color in data base
  public static function getAllColor()
  {
    $query = 'SELECT id,Name  FROM twp_Color';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  public static function updateColorAdmin($id,$n1,$o1,$n2,$o2){
    $query="DELETE FROM rel_car_color WHERE id=$id";
    $bdd=Model::$pdo->query($query);
    $bdd->execute();
    if($n1 && $n2 && $n1 != $n2){
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,$n1)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,$n2)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
    }
    else if($n1){
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,$n1)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,NULL)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
    }
    else if($n2){
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,$n2)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,NULL)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
    }
    else{
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,NULL)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
      $query="INSERT INTO rel_car_color(id,id_twp_color) VALUES ($id,NULL)";
      $bdd=Model::$pdo->query($query);
      $bdd->execute();
    }
  }

  //function select all club for pagination
  public static function getAllColorLIMIT()
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
    $query = "SELECT * FROM twp_Color ORDER BY Name LIMIT $start, $valeurParPage";
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getallrel(){
    $query = 'SELECT * FROM rel_car_color';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  //function for registration the route of color
  public static function saveColor($n)
  {
    $prepare=("INSERT INTO twp_Color(Name) VALUES ( :Name)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->execute();
    if($bdd){
      echo "la couleur est ajouter avec succès!";
    }
  }

  public static function saveColorAdmin($i,$c1,$c2)
  {
    $prepare=("INSERT INTO rel_car_color(id,id_twp_Color) VALUES (:idcar, :idcolor)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':idcar',$i);
    $bdd->bindParam(':idcolor',$c1);
    $bdd->execute();
    if(!$bdd){
      echo"not";
    }
    if (!empty($c2)){
      $prepare=("INSERT INTO rel_car_color(id,id_twp_Color) VALUES (:idcar, :idcolor)");
      $bdd= Model::$pdo->prepare($prepare);
      $bdd->bindParam(':idcar',$i);
      if(!$bdd){
        echo"not";
      }
    }else {
      $prepare=("INSERT INTO rel_car_color(id,id_twp_Color) VALUES (:idcar, Null)");
      $bdd= Model::$pdo->prepare($prepare);
      $bdd->bindParam(':idcar',$i);
      $bdd->execute();
      if(!$bdd){
        echo"not";
      }
    }


  }

  //funtion delete color in database
  public static function deleteColor($id){
    $prepare =('DELETE FROM twp_Color WHERE id=:id');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id]);
    echo "la couleur est supprimé avec succès!";
  }

  public static function deleteColorREl($id){
    $prepare =('DELETE FROM rel_car_color WHERE id=:id');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id]);
    //echo "la couleur est supprimé avec succès!";
  }

  //funtion update color in database
  public static function updateColor($id, $Name){
    $prepare = ("UPDATE twp_Color SET Name=:Name WHERE id=:id");
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id, ':Name' => $Name]);
    echo "la couleur est modifiée avec succès!";
  }

  public static function updateColorRel($idc, $c1,$c1n,$c2,$c2n){
    $prepare = ("UPDATE rel_car_color SET id_twp_Color=:c1n WHERE id=:id and id_twp_Color=:c1;UPDATE rel_car_color SET id_twp_Color=:c2n WHERE id=:id and id_twp_Color=:c2");
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $idc, ':c1n' => $c1n ,':c1'=>$c1 , ':c2n' => $c2n ,':c2'=>$c2]);
    echo "la couleur est modifiée avec succès!";
  }
  public static function getDetailColor($id){
    $prepare= 'SELECT id_twp_Color FROM rel_car_color  where id=:id';
    $rep = Model::$pdo->prepare($prepare);
    $rep->bindParam(':id',$id);
    $rep->setFetchMode(PDO::FETCH_OBJ);
    $rep->execute();
    $tab_obj=$rep->fetchAll();
    return $tab_obj ;
  }


  public static function recupIdUnique(){
    $query = ' SELECT test.id FROM (SELECT  id ,COUNT(`id`) as co FROM rel_car_color GROUP BY id) test where test.co=1';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
}
