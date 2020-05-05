  <?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');


class twp_Adresse_social
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
  * @var integer
  */
  private $num_rue;

  /**
  * conteneur name
  *
  * @var string
  */
  private $nom_rue;

  public function setNomRue($nom_rue)
  {
    $this->nom_rue = $nom_rue;

    return $this;
  }
  public function getNomRue()
  {
    return $this->$nom_rue;
  }

  /**
  * conteneur name
  *
  * @var string
  */
  private $ville;

  public function setVille($ville)
  {
    $this->ville = $ville;

    return $this;
  }
  public function getVille()
  {
    return $this->ville;
  }

  /**
  * conteneur name
  *
  * @var string
  */
  private $cp_ville;

  public function setCp($cp_ville)
  {
    $this->cp_ville = $cp_ville;

    return $this;
  }
  public function getCp()
  {
    return $this->cp_ville;
  }

  /**
  * conteneur name
  *
  * @var string
  */
  private $country;

  public function setCountry($country)
  {
    $this->country = $country;

    return $this;
  }
  public function getCountry()
  {
    return $this->country;
  }



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
  public function getNumRue()
  {
    return $this->num_rue;
  }

  /**
  * Set the value of conteneur name
  *
  * @param string name
  *
  * @return self
  */
  public function setNumRue($num_rue)
  {
    $this->num_rue = $num_rue;

    return $this;
  }




  public static function setAdress($num,$nom,$cp,$ville,$country,$idCo)
  {



  $prepare=("INSERT INTO twp_Adresse_social(Num_Rue,Nom_Rue,Ville,Cp_Ville,Country,id_twp_user)/*,identity_card,birth,Adress_Vie,Country,nation)*/
  VALUES (:Num_Rue,:Nom_Rue,:Ville,:Cp_Ville,:Country,:id_twp_user)");
  $bdd= Model::$pdo->prepare($prepare);
  $bdd->bindParam(':Num_Rue',$num);
  $bdd->bindParam(':Nom_Rue',$nom);
  $bdd->bindParam(':Ville',$ville);
  $bdd->bindParam(':Cp_Ville',$cp);
  $bdd->bindParam(':Country',$country);
$bdd->bindParam(':id_twp_user',$idCo);
  $bdd->execute();


  }


  //function for select all brand in data base
  public static function getAllAdresse_Social()
  {
$idCo = unserialize($_SESSION['User'])->getid();
    $query = 'SELECT * FROM twp_Adresse_social WHERE id_twp_user ='.$idCo;
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
  //delete adress by id user

  public static function deleteByID_user($n){
    $prepare =('DELETE FROM twp_Adresse_social WHERE id_twp_User=:id');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $n]);
  }
}
