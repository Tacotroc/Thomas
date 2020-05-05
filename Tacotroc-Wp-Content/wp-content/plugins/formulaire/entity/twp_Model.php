<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');


class twp_Model
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
  * conteneur name
  *
  * @var integer
  */
  private $id_twp_Brand;


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
  * Get the value of conteneur id
  *
  * @return integer
  */
  public function getIdtwpBrand()
  {
    return $this->id_twp_Brand ;
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
    echo $this->getId(). "</br>";
    echo $this->getName();
  }

     //function select all club for pagination
     public static function getAllModelLIMIT()
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
     //$query = "SELECT * FROM twp_Model ORDER BY Name LIMIT $start, 25";
     $query =("SELECT mo.id id, mo.Name twp_Model, ma.Name twp_Brand FROM twp_Model mo LEFT JOIN twp_Brand ma ON mo.id_twp_Brand = ma.id ORDER BY mo.Name LIMIT $start, $valeurParPage");
     $rep = Model::$pdo->query($query);
     $rep->setFetchMode (PDO::FETCH_OBJ);
     $tab_obj=$rep->fetchAll();
     return $tab_obj;
   }


  //function for select all model in data base
  public static function getAllModel()
  {
    $query =("SELECT mo.Name twp_Model, ma.Name twp_Brand FROM twp_Model mo LEFT JOIN twp_Brand ma ON mo.id_twp_Brand = ma.id ORDER BY mo.Name");
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllModelWithId()
  {
    $query =("SELECT mo.Name,mo.id,mo.id_twp_Brand twp_Model, ma.Name twp_Brand FROM twp_Model mo LEFT JOIN twp_Brand ma ON mo.id_twp_Brand = ma.id");
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function UpdateModelAdmin($id,$model,$brand){
    $query=("UPDATE twp_Model SET Name=:model, id_twp_Brand=:brand WHERE id=:id");
    $bdd=Model::$pdo->prepare($query);
    $bdd->bindParam(":id",$id);
    $bdd->bindParam(":model",$model);
    $bdd->bindParam(":brand",$brand);
    $bdd->execute();
  }

  public static function getAllModelWithIdOderByBrand()
  {
    $query =("SELECT mo.Name,mo.id,mo.id_twp_Brand twp_Model, ma.Name twp_Brand FROM twp_Model mo LEFT JOIN twp_Brand ma ON mo.id_twp_Brand = ma.id order by id_twp_Brand ");
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  public static function getModelById($n)
  {
    $query =("SELECT Name,id  FROM twp_Model where id='.$n.'");
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for select all modelContact in data base
  public static function getAllModelConcact()
  {
    $query = 'SELECT * FROM twp_Model ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllModelByIdCar($n)
  {
    $query = 'SELECT Name FROM twp_Model  WHERE id_twp_Brand ='.$n.' ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  //function for registration the route of model
  public static function saveModel($n, $d)
  {
    $errors = [];
         if ($n == "") {
          $errors["Name"] = "Veullez entrer un model valide";
         }
         if (count($errors) >0) {
          foreach ($errors as $value) {
            echo $value."<br>";
          }
        }

  else {
    $prepare=("INSERT INTO twp_Model(Name, id_twp_Brand) VALUES ( :Name , :id_twp_Brand)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Name',$n);
    $bdd->bindParam(':id_twp_Brand',$d);
    $resultat=$bdd->execute();
    echo "votre model est ajouté avec succès!";
    }
  }

  //function delete for model join to brand
   public static function deleteModel($id){
   $prepare =('DELETE FROM twp_Model WHERE id=:id');
   $stmt = Model::$pdo->prepare($prepare);
   $stmt -> execute([':id' => $id]);
   echo "le model est supprimé avec succès!";
     }

     //funtion update model in database
     public static function updateModel($id, $Name, $id_twp_Brand){
     $prepare = ("UPDATE twp_Model SET Name=:Name, id_twp_Brand=:id_twp_Brand WHERE Name=:id");
     $stmt = Model::$pdo->prepare($prepare);
     $stmt -> execute([ ':Name' => $Name, ':id' => $id,  ':id_twp_Brand' => $id_twp_Brand]);
     echo "le modèl est modifié avec succès !";

    }
}
