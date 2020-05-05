<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');


class twp_car
{

  /**
  * conteneur id
  *
  * @var integer
  */
  private $id;

  /**
  * conteneur immatriculation
  *
  * @var string
  */
  private $immatriculation;



  /**
  * conteneur comment
  *
  * @var string
  */
  private $comment;


  /**
  * conteneur color_1
  *
  * @var string
  */
  private $detail_color_1;

  /**
  * conteneur color_2
  *
  * @var string
  */
  private $detail_color_2;

  /**
  * conteneur restoration
  *
  * @var bool
  */
  private $restoration;


  /**
  * conteneur id_twp_user
  *
  * @var integer
  */
  private $id_twp_User;


  /**
  * conteneur years
  *
  * @var integer
  */
  private $years;


  /**
  * conteneur id_twp_model
  *
  * @var integer
  */
  private $id_twp_Model;


  /**
  * conteneur id_twp_version
  *
  * @var integer
  */
  private $id_twp_Version;


  /**
  * conteneur id_twp_type
  *
  * @var integer
  */
  private $id_twp_Type;

  /**
  * conteneur id_twp_cylinder
  *
  * @var integer
  */
  private $id_twp_Cylinder;

  /**
  * conteneur id_twp_serie
  *
  * @var integer
  */
  private $id_twp_Serie;

  /**
  * conteneur id_twp_owner
  *
  * @var integer
  */
  private $id_twp_Owner;

  /**
  * conteneur id_twp_country
  *
  * @var integer
  */
  private $id_twp_Country;

  /**
  * conteneur id_twp_musueum
  *
  * @var integer
  */
  private $id_twp_Museum;

  /**
  * conteneur id_twp_club
  *
  * @var integer
  */
  private $id_twp_Club;


  /**
  * Get the value of conteneur id_twp_user
  *
  * @return integer
  */
  public function getIdTwpUser()
  {
    return $this->id_twp_User;
  }

  /**
  * Set the value of conteneur id_twp_user
  *
  * @param integer id_twp_User
  *
  * @return self
  */
  public function setIdTwpUser($id_twp_User)
  {
    $this->id_twp_User = $id_twp_User;

    return $this;
  }
  /**
  * Get the value of conteneur years
  *
  * @return integer
  */
  public function getYears()
  {
    return $this->years;
  }

  /**
  * Set the value of conteneur years
  *
  * @param integer years
  *
  * @return self
  */
  public function setYearss($years)
  {
    $this->years= $years;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_model
  *
  * @return integer
  */
  public function getIdTwpModel()
  {
    return $this->id_twp_Model;
  }

  /**
  * Set the value of conteneur id_twp_model
  *
  * @param integer id_twp_Model
  *
  * @return self
  */
  public function setIdTwpModel($id_twp_Model)
  {
    $this->id_twp_Model = $id_twp_Model;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_version
  *
  * @return integer
  */
  public function getIdTwpVersion()
  {
    return $this->id_twp_Version;
  }

  /**
  * Set the value of conteneur id_twp_version
  *
  * @param integer id_twp_Version
  *
  * @return self
  */
  public function setIdTwpVersion($id_twp_Version)
  {
    $this->id_twp_Version = $id_twp_Version;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_vintage
  *
  * @return integer
  */
  public function getIdTwpType()
  {
    return $this->id_twp_Type;
  }

  /**
  * Set the value of conteneur id_twp_vintage
  *
  * @param integer id_twp_Type
  *
  * @return self
  */
  public function setIdTwpType($id_twp_Type)
  {
    $this->id_twp_Type = $id_twp_Type;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_vintage
  *
  * @return integer
  */
  public function getIdTwpCylinder()
  {
    return $this->id_twp_Cylinder;
  }

  /**
  * Set the value of conteneur id_twp_vintage
  *
  * @param integer id_twp_Cylinder
  *
  * @return self
  */
  public function setIdTwpCylinder($id_twp_Cylinder)
  {
    $this->id_twp_Cylinder = $id_twp_Cylinder;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_vintage
  *
  * @return integer
  */
  public function getIdTwpSerie()
  {
    return $this->id_twp_Serie;
  }

  /**
  * Set the value of conteneur id_twp_vintage
  *
  * @param integer id_twp_Serie
  *
  * @return self
  */
  public function setIdTwpSerie($id_twp_Serie)
  {
    $this->id_twp_Serie = $id_twp_Serie;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_owner
  *
  * @return integer
  */
  public function getIdTwpOwner()
  {
    return $this->id_twp_Owner;
  }

  /**
  * Set the value of conteneur id_twp_owner
  *
  * @param integer id_twp_Owner
  *
  * @return self
  */
  public function setIdTwpOwner($id_twp_Owner)
  {
    $this->id_twp_Owner = $id_twp_Owner;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_country
  *
  * @return integer
  */
  public function getIdTwpCountry()
  {
    return $this->id_twp_Country;
  }

  /**
  * Set the value of conteneur id_twp_country
  *
  * @param integer id_twp_Country
  *
  * @return self
  */
  public function setIdTwpCountry($id_twp_Country)
  {
    $this->id_twp_Country = $id_twp_Country;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_musueum
  *
  * @return integer
  */
  public function getIdTwpMuseum()
  {
    return $this->id_twp_Museum;
  }

  /**
  * Set the value of conteneur id_twp_musueum
  *
  * @param integer id_twp_Museum
  *
  * @return self
  */
  public function setIdTwpMuseum($id_twp_Museum)
  {
    $this->id_twp_Museum = $id_twp_Museum;

    return $this;
  }


  /**
  * Get the value of conteneur id_twp_club
  *
  * @return integer
  */
  public function getIdTwpClub()
  {
    return $this->id_twp_Club;
  }

  /**
  * Set the value of conteneur id_twp_club
  *
  * @param integer id_twp_Club
  *
  * @return self
  */
  public function setIdTwpClub($id_twp_Club)
  {
    $this->id_twp_Club = $id_twp_Club;

    return $this;
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
  * Get the value of conteneur immatriculation
  *
  * @return string
  */
  public function getImmatriculation()
  {
    return $this->immatriculation;
  }

  /**
  * Set the value of conteneur immatriculation
  *
  * @param string immatriculation
  *
  * @return self
  */
  public function setImmatriculation($immatriculation)
  {
    $this->immatriculation = $immatriculation;

    return $this;
  }

  /**
  * Get the value of conteneur comment
  *
  * @return string
  */
  public function getComment()
  {
    return $this->comment;
  }

  /**
  * Set the value of conteneur comment
  *
  * @param string comment
  *
  * @return self
  */
  public function setComment($comment)
  {
    $this->comment = $comment;

    return $this;
  }


  /**
  * Get the value of conteneur color_1
  *
  * @return string
  */
  public function getDetailColor1()
  {
    return $this->detail_color_1;
  }

  /**
  * Set the value of conteneur color_1
  *
  * @param string detail_color_1
  *
  * @return self
  */
  public function setDetailColor1($detail_color_1)
  {
    $this->detail_color_1 = $detail_color_1;

    return $this;
  }

  /**
  * Get the value of conteneur color_2
  *
  * @return string
  */
  public function getDetailColor2()
  {
    return $this->detail_color_2;
  }

  /**
  * Set the value of conteneur color_2
  *
  * @param string detail_color_2
  *
  * @return self
  */
  public function setDetailColor2($detail_color_2)
  {
    $this->detail_color_2 = $detail_color_2;

    return $this;
  }





  /**
  * Get the value of conteneur restoration
  *
  * @return bool
  */
  public function getRestoration()
  {
    return $this->restoration;
  }

  /**
  * Set the value of conteneur restoration
  *
  * @param bool restoration
  *
  * @return self
  */
  public function setRestoration($restoration)
  {
    $this->restoration = $restoration;

    return $this;
  }


  /**
  * Set the value of conteneur restoration
  *
  * @param string restoration
  *
  *
  */
  public function getName()
  {
    return $this->$name;
  }

  public function __construct ($i,$c,$cy,$dc1,$dc2,$r)
  {
    $this->immatriculation=$i;
    $this->comment= $c;
    $this->circulation_year= $cy;
    $this->detail_color_1=$dc1;
    $this->detail_color_2= $dc2;
    $this->restoration= $r;
    // $this->countryName = $this->getCountryName();
  }

  //dysplay method
  public function showCar()
  {
    echo $this->getId(). "</br>";
    echo $this->getImmatriculation(). "</br>";
    echo $this->getComment(). "</br>";
    echo $this->getDetailColor1(). "</br>";
    echo $this->getDetailColor2(). "</br>";
    echo $this->getRestoration();
  }


  public static function getAllCarAdmin(){
    $query = 'SELECT Immatriculation as Name FROM twp_Car';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_ASSOC);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllCarLIMIT()
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
    $query = "SELECT id, Immatriculation, Comment, Details_Color_1, Details_Color_2, Restoration, id_twp_User, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Serie, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club FROM twp_Car ORDER BY id desc LIMIT $start, $valeurParPage";
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  public static function getAllCarLIMIT2($num)
  {
    //$numberpage = $_GET['numberpage'];
    if (!isset($_GET['start'])) {
      $start = 1;
    }
    else {
      $start = $_GET['start'];
    }
    $start = $start*$num-$num;
    $query = "SELECT id, Immatriculation, Comment, Details_Color_1, Details_Color_2, Restoration, id_twp_User, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Serie, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club FROM twp_Car ORDER BY id desc LIMIT $start, $num";
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
  public static function GetAllCarImmat(){
    $query = 'SELECT Immatriculation FROM twp_Car';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllId(){
    $query = 'SELECT id FROM twp_Car ORDER BY id ASC';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //function for select all car in data base
  public static function getAllCar()
  {
    $query = 'SELECT id, Immatriculation, Comment, Details_Color_1, Details_Color_2, Restoration, id_twp_User, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Serie, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club FROM twp_Car';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  public static function getAllCar2()
  {
    $query = 'SELECT id as value, Immatriculation  as label FROM twp_Car ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
  //function for registration the route of car
  public static function saveCar($i,$c,$dc1,$dc2,$r,$lp)
  {
    $prepare=("INSERT INTO twp_Car(id,Immatriculation,Comment,Circulation_Year,Details_Color_1,Details_Color_2,Restoration,Last_parking) VALUES (null,:Immatriculation,:Comment,:Circulation_Year,:Details_Color_1,:Details_Color_2,:Restoration,:Last_parking)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Immatriculation',$i);
    $bdd->bindParam(':Comment',$c);
    $bdd->bindParam(':Details_Color_1',$dc1);
    $bdd->bindParam(':Details_Color_2',$dc2);
    $bdd->bindParam(':Restoration',$r);
    $bdd->bindParam(':Last_parking',$lp);
    $bdd->execute();
    if(!$bdd){
      echo"not";
    }
  }

  public static function UpdateCarAdmin($id,$idtClub,$idtMusuem,$idtCountry,$idtOwner,$idtSerie,$idtCylinder,$idtType,$idtVersion,$idtModel,$Year){
    $prepare=("UPDATE twp_Car SET Years=:Years,id_twp_Model=:id_twp_Model,id_twp_Version=:id_twp_Version,id_twp_Type=:id_twp_Type,id_twp_Cylinder=:id_twp_Cylinder,id_twp_Serie=:id_twp_Serie,id_twp_Owner=:id_twp_Owner,id_twp_Country=:id_twp_Country,id_twp_Museum=:id_twp_Museum,id_twp_Club=:id_twp_Club WHERE id=:id");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':id',$id);
    $bdd->bindParam(':id_twp_Club',$idtClub);
    $bdd->bindParam(':id_twp_Museum',$idtMusuem);
    $bdd->bindParam(':id_twp_Country',$idtCountry);
    $bdd->bindParam(':id_twp_Owner',$idtOwner);
    $bdd->bindParam(':id_twp_Serie',$idtSerie);
    $bdd->bindParam(':id_twp_Cylinder',$idtCylinder);
    $bdd->bindParam(':id_twp_Type',$idtType);
    $bdd->bindParam(':id_twp_Version',$idtVersion);
    $bdd->bindParam(':id_twp_Model',$idtModel);
    $bdd->bindParam(':Years',$Year);
    $bdd->execute();
    if(!$bdd){
      echo"not";
    }
  }

  public static function updatecar($id,$i,$y,$m,$v,$t,$c,$s,$o,$p,$mu,$cl,$com,$idu,$res){
    $prepare="UPDATE twp_Car SET Immatriculation=:immat,Years=:anne,id_twp_Model=:model,id_twp_Version=:version,
    id_twp_Type=:type,id_twp_Cylinder=:cylindre,id_twp_Serie=:serie,id_twp_Owner=:owner,id_twp_Country=:pays,id_twp_Museum=:musee,id_twp_Club=:club,Restoration=:res,id_twp_User=:idu,Comment=:com WHERE id=".$id;
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':immat',$i);
    $bdd->bindParam(':anne',$y);
    $bdd->bindParam(':model',$m);
    $bdd->bindParam(':version',$v);
    $bdd->bindParam(':type',$t);
    $bdd->bindParam(':cylindre',$c);
    $bdd->bindParam(':serie',$s);
    $bdd->bindParam(':owner',$o);
    $bdd->bindParam(':pays',$p);
    $bdd->bindParam(':musee',$mu);
    $bdd->bindParam(':club',$cl);
    $bdd->bindParam(':res',$res);
    $bdd->bindParam(':idu',$idu);
    $bdd->bindParam(':com',$com);
    $bdd->execute();
    echo "modification effectuée avec succes";
  }

  public static function saveCarAdmin($idcar,$immatriculation,$idtwpVintage,$idtwpModel,$idtwpVersion,$idtwpType,$idtwpCylinder,$idtwpOwner,$idtwpCountry,$idtwpMuseum,$idtwpClub)
  {
    $prepare=("INSERT INTO twp_Car(id, Immatriculation,Restoration,id_twp_User,Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club) VALUES (:idcar, :Immatriculation,'1',NULL,:id_twp_Vintage,:id_twp_Model,:id_twp_Version,:id_twp_Type,:id_twp_Cylinder,:id_twp_Owner,:id_twp_Country,:id_twp_Museum,:id_twp_Club)");
    $bdd=Model::$pdo->prepare($prepare);
    $bdd->bindParam(':idcar',$idcar);
    $bdd->bindParam(':Immatriculation',$immatriculation);
    $bdd->bindParam(':id_twp_Vintage',$idtwpVintage);
    $bdd->bindParam(':id_twp_Model',$idtwpModel);
    $bdd->bindParam(':id_twp_Version',$idtwpVersion);
    $bdd->bindParam(':id_twp_Type',$idtwpType);
    $bdd->bindParam(':id_twp_Cylinder',$idtwpCylinder);
    $bdd->bindParam(':id_twp_Owner',$idtwpOwner);
    $bdd->bindParam(':id_twp_Country',$idtwpCountry);
    $bdd->bindParam(':id_twp_Museum',$idtwpMuseum);
    $bdd->bindParam(':id_twp_Club',$idtwpClub);
    $bdd->execute();
  }

  public static function getAllCarById($id)
  {
    $query = 'SELECT * FROM twp_Car tu,twp_User tp WHERE tu.id_twp_Owner= tp.id ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  public static function getAllCarByIdtest($n)
  {
    $query = 'SELECT id, Immatriculation, Comment, Details_Color_1, Details_Color_2, Restoration, id_twp_User, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Serie, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club FROM twp_Car tu WHERE tu.id_twp_user = '.$n.' ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();

    return $tab_obj;
  }
  public static function getAllCarByIdtest2($n)
  {
    $query = 'SELECT id, Immatriculation, Details_Color_1, Details_Color_2, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Serie, id_twp_Country FROM twp_Car  WHERE id ='.$n.' ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllCarByIdtest3($n)
  {
    $query = 'SELECT c.id, c.Immatriculation, c.Comment,r.id_twp_Color as Details_Color_1,d.id_twp_Color as Details_Color_2, c.Restoration, c.id_twp_User, c.Years, c.id_twp_Model, c.id_twp_Version, c.id_twp_Type, c.id_twp_Cylinder, c.id_twp_Serie, c.id_twp_Owner, c.id_twp_Country, c.id_twp_Museum, c.id_twp_Club
    FROM twp_Car c ,rel_car_color r ,(select * from rel_car_color order by id desc) d  WHERE r.id=c.id and d.id=c.id and (d.id_twp_color!=r.id_twp_Color or( isNull(d.id_twp_Color ) and r.id_twp_Color is not Null ))and c.id='.$n.' LIMIT 1 ';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getCarFinal($id){
    $queryCar = 'SELECT id, Immatriculation, Comment, Restoration, id_twp_User, Years, id_twp_Model, id_twp_Version, id_twp_Type, id_twp_Cylinder, id_twp_Serie, id_twp_Owner, id_twp_Country, id_twp_Museum, id_twp_Club
    FROM twp_Car WHERE id='.$id;
    $rep = Model::$pdo->query($queryCar);
    $rep->setFetchMode(PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();

    $queryColor = 'SELECT id_twp_color FROM rel_car_color WHERE id='.$id.' LIMIT 2';
    $rep2 = Model::$pdo->query($queryColor);
    $rep2->setFetchMode(PDO::FETCH_OBJ);
    $tab_Color=$rep2->fetchAll();

    // $tab_car = $tab_obj.$tab_Color;
    // $tab_car = $tab_Color;
    return $tab_Color;
  }


  public static function getAllCarByIdtest4($n)
  {
    $query = $n;
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;

  }



  public static function getAllCarByIdtest5($n)
  {
    $rep = Model::$pdo->query($n);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
  public static function getCarInfos($articlet1,$valAjout,$nom)
  {

    foreach($articlet1 as $articlezz):


      if (($articlezz->id )==  ($valAjout) ):
        switch ($nom){
          case 'Cylinder':
          echo $articlezz->Cylinder;
          break;

          case 'Model':
          echo $articlezz->twp_Brand. "  ";
          echo $articlezz->Name;
          break;

          case 'serie':
          echo $articlezz->Serie;
          break;

          case 'brand':
          echo $articlezz->twp_Brand;
          break;

          case 'brand2':
          return $articlezz->twp_Brand;
          break;

          case 'model':
          echo $articlezz->Name;
          break;

          case 'model2':
          return $articlezz->Name;
          break;

          case 'User':
          echo $articlezz->First_Name;
          break;

          case 'Years':
          echo $articlezz->Mk;
          break;

          case 'color':
          return $articlezz->Name;
          break;

          default:
          echo $articlezz->Name;
          //dans le cas ou le type n'est pas un des type prévu => on bloque le user sur une page inutile

        }

      endif;

    endforeach;
  }

  public static function recupinfoCAR($id){

  }

  public static  function verifCarAll($immatriculation,$idtwpVintage,$idtwpModel,$idtwpVersion,$idtwpType,$couleur2,$couleur1)
  {
    $prepare = 'SELECT id FROM twp_Car where
    Immatriculation=:Immatriculation and Years=:id_twp_Vintage and id_twp_Model=:id_twp_Model
    and id_twp_Version=:id_twp_Version and id_twp_Type=:id_twp_Type and Details_Color_1=:detailcouleur1
    and Details_Color_2=:detailcouleur2 ';

    $bdd=Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Immatriculation',$immatriculation);
    $bdd->bindParam(':id_twp_Vintage',$idtwpVintage);
    $bdd->bindParam(':id_twp_Model',$idtwpModel);
    $bdd->bindParam(':id_twp_Version',$idtwpVersion);
    $bdd->bindParam(':id_twp_Type',$idtwpType);
    $bdd->bindParam(':detailcouleur1',$couleur1);
    $bdd->bindParam(':detailcouleur2',$couleur2);
    $bdd->setFetchMode (PDO::FETCH_OBJ);
    $bdd->execute();
    $obj=$bdd->fetchAll();
    return $obj ;
  }




  public static  function saveCarVol($immatriculation,$idtwpVintage,$idtwpModel,$idtwpVersion,$idtwpType,$couleur2,$couleur1)
  {
    $prepare=("INSERT INTO twp_Car,( Immatriculation,Years, id_twp_Model, id_twp_Version, id_twp_Type, Details_Color_1,Details_Color_2)
    VALUES (:Immatriculation,:id_twp_Vintage,:id_twp_Model,:id_twp_Version,:id_twp_Type,:detailcouleur1,:detailcouleur2)");
    $bdd=Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Immatriculation',$immatriculation);
    $bdd->bindParam(':id_twp_Vintage',$idtwpVintage);
    $bdd->bindParam(':id_twp_Model',$idtwpModel);
    $bdd->bindParam(':id_twp_Version',$idtwpVersion);
    $bdd->bindParam(':id_twp_Type',$idtwpType);
    $bdd->bindParam(':detailcouleur1',$couleur1);
    $bdd->bindParam(':detailcouleur2',$couleur2);
    $bdd->execute();
    $rep=twp_Car::getCarByImmat($immatriculation);
    return $rep ;
  }

  public static function getCarByImmat($immatriculation) {
    $prepare= 'SELECT id FROM `twp_Car` WHERE Immatriculation=:immat';
    $rep = Model::$pdo->prepare($prepare);
    $rep->bindParam(':immat',$immatriculation);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $rep->execute();
    $tab_obj=$rep->fetchAll();
    return   $tab_obj ;



  }
  public static function deletebyidMess($idc){
    $prepare =('DELETE FROM twp_Car WHERE id=:id  and id_twp_Owner=0');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $idc]);
  }


  public static function deleteCar2($Immatriculation){
    $prepare =('DELETE FROM twp_Car WHERE id=:Immatriculation');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':Immatriculation' => $Immatriculation]);
  }

  //function delete car
  public static function deleteCar($Immatriculation){
    $prepare =('DELETE FROM twp_Car WHERE Immatriculation=:Immatriculation');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':Immatriculation' => $Immatriculation]);
  }
}
