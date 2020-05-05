<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/PHPMailer.php');
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/SMTP.php');
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Color.php');

class twp_Message{
  /**
  * conteneur id
  *
  *@var integer
  */
  private $id ;

  /**
  * conteneur id
  *
  *@var string
  */
  private $date;

  // info sur le proprietaire de la voiture
  /**
  * conteneur id
  *
  *  @var string
  */
  private $nomP;

  /**
  * conteneur id
  *  @var string
  */private $prenomP;

  /**
  * conteneur id
  *  @var string
  */
  private $telP;

  /**
  * conteneur id
  *  @var string
  */
  private $mailP;

  // info internaute , a recupere dans la session si celle-ci existe

  /**
  * conteneur id
  *  @var  string
  */
  private $nomI;

  /**
  * conteneur id
  *  @var string
  */
  private $prenomI;

  /**
  * conteneur id
  *  @var string
  */
  private $mailI;

  // localisation du vol

  /**
  * conteneur id
  *@var string
  */
  private $adresse;

  /**
  * conteneur id
  *  @var string
  */
  private $codeP;

  /**
  * conteneur id
  *@var string
  */
  private $ville;

  /**
  * conteneur id
  *@var string
  */
  private $pays;

  /**
  * conteneur id
  *@var string
  */
  private $description;

  // liaison bdd a la voiture

  /**
  * conteneur id
  *@var integer
  */
  private $id_tw_car;

  // getter & setter

  public function getId()
  {
    return $this->id;
  }


  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }



  public function getDate()
  {
    return $this->$date;
  }

  public function setDate($date)
  {
    $this->date = $date;

    return $this;
  }


  public function getDateForDatabase($date) {
    $timestamp = strtotime($date);
    $date_formated = date('d-m-Y ', $timestamp);
    return $date_formated;
  }




  public function getNomP()
  {
    return $this->nomP;
  }


  public function setNOmP($nomP)
  {
    $this->nomP = $nomP;

    return $this;
  }

  public function getPrenomP()
  {
    return $this->prenomP;
  }

  public function setPrenomP($prenomP)
  {
    $this->prenomP = $prenomP;

    return $this;
  }

  public function getTelP()
  {
    return $this->telP;
  }

  public function setTelP($telP)
  {
    $this->telP = $telP;

    return $this;
  }


  public function getMailP()
  {
    return $this->mailP;
  }

  public function setMailP($mailP)
  {
    $this->mailP = $mailP;

    return $this;
  }

  public function getNomI()
  {
    return $this->nomI;
  }


  public function setNOmI($nomI)
  {
    $this->nomI = $nomI;

    return $this;
  }

  public function getPrenomI()
  {
    return $this->prenomI;
  }

  public function setPrenomI($prenomI)
  {
    $this->prenomI = $prenomI;

    return $this;
  }

  public function getMailI()
  {
    return $this->mailI;
  }

  public function setMailI($mailI)
  {
    $this->mailI = $mailI;

    return $this;
  }

  public function getAdresse()
  {
    return $this->mailI;
  }

  public function setAdresse($adresse)
  {
    $this->adresse= $adresse;

    return $this;
  }
  public function getCodeP()
  {
    return $this->codeP;
  }

  public function setCodeP($codeP)
  {
    $this->codeP= $codeP;

    return $this;
  }
  public function getVille()
  {
    return $this->ville;
  }

  public function setVille($ville)
  {
    $this->ville= $ville;

    return $this;
  }
  public function getPays()
  {
    return $this->pays;
  }

  public function setPays($pays)
  {
    $this->pays= $pays;

    return $this;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description= $description;

    return $this;
  }

  public function getId_tw_car()
  {
    return $this->id_tw_car;
  }

  public function setId_tw_car($id_tw_car)
  {
    $this->id_tw_car= $id_tw_car;

    return $this;
  }
  ////////////////////////////////////////////////////////////////////////////

  public function _construct ($id,$np,$pp,$tp,$mp,$ni,$pi,$mi,$a,$cp,$v,$p,$d,$idc)
  {
    $this->id=$i;
    $this->nomP=$np;
    $this->prenomP=$pp;
    $this->telP=$tp;
    $this->mailP=$mp;
    $this->nomI=$ni;
    $this->prenomI=$pi;
    $this->mailI=$mi;
    $this->adresse=$a;
    $this->codeP=$cp;
    $this->ville=$v;
    $this->pays=$p;
    $this->description=$d;
    $this->id_tw_car=$idc;
  }

  public function shawMessage()
  {
    echo $this->getId(). "</br>";
    //echo   echo $this->getDate(). "</br>";
    echo $this->getNomP(). "</br>";
    echo $this->getPrenomP(). "</br>";
    echo $this->getTelP(). "</br>";
    echo $this->getMailP(). "</br>";
    echo $this->getNomI(). "</br>";
    echo $this->getPrenomI(). "</br>";
    echo $this->getMailI(). "</br>";
    echo $this->getAdresse(). "</br>";
    echo $this->getCodeP(). "</br>";
    echo $this->getVille(). "</br>";
    echo $this->getPays(). "</br>";
    echo $this->getDescription(). "</br>";
    echo $this->getId_tw_car();
  }

  public function saveMessage($np,$pp,$tp,$mp,$ni,$pi,$mi,$a,$cp,$v,$p,$d,$idc)
  {
    $time=date("Y-m-d H:i:s");
    //$date = twp_Message::getDateForDatabase($time);
    $prepare=
    'INSERT INTO twp_Message( datev , nomP, prenomP, telP, mailP, nomI, prenomI, mailI, adresse, codeP, ville, pays, description, id_tw_car)
    VALUES(:dat,:nomp,:prenomp,:telp,:mailp,:nomi,:prenomi,:maili,:adresse,:codep,:ville,:pays,:description,:idcar)';
    $bdd=Model::$pdo->prepare($prepare);
    $bdd->bindParam(':dat',$time);
    $bdd->bindParam(':nomp',$np);
    $bdd->bindParam(':prenomp',$pp);
    $bdd->bindParam(':telp',$tp);
    $bdd->bindParam(':mailp',$mp);
    $bdd->bindParam(':nomi',$ni);
    $bdd->bindParam(':prenomi',$pi);
    $bdd->bindParam(':maili',$mi);
    $bdd->bindParam(':adresse',$a);
    $bdd->bindParam(':codep',$cp);
    $bdd->bindParam(':ville',$v);
    $bdd->bindParam(':pays',$p);
    $bdd->bindParam(':description',$d);
    $bdd->bindParam(':idcar',$idc);
    $bdd->execute();
    var_dump($date);
    var_dump($time);
  }


  //function for select all user in data base
  public static function getAllMessage()
  {
    $query = 'SELECT id, datev, nomP, prenomP, telP , mailP, nomI, prenomI, mailI, adresse, codeP, ville, pays, description, id_tw_car FROM twp_Message';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  //fonction for user delete
  public static function deleteMessage($id){
    $prepare =('DELETE FROM twp_Message WHERE id=:id ');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id]);

  }

  // function for number of message with similar id_tw_car
  public static function getNbMessIdc($id)
  {
    $query = 'SELECT COUNT(id_tw_car) as nb FROM twp_Message where id_tw_car='.$id.'';
    $stmt = Model::$pdo->query($query);
    $res=$stmt->fetch();
    $stmt->closeCursor();
    return $res["nb"];

  }

  //message with id
  public static function getNbMessId($id)
  {
    $query = 'SELECT id, datev, nomP, prenomP, telP, mailP, nomI, prenomI, mailI, adresse, codeP, ville, pays, description, id_tw_car FROM twp_Message where id='.$id.'';
    $stmt = Model::$pdo->query($query);
    $res=$stmt->fetch();
    return $res;

  }

  //function select all club for pagination
  public static function getAllMessageLIMIT($num)
  {
    //$numberpage = $_GET['numberpage'];
    if (!isset($_GET['start'])) {
      $start = 1;
    }
    else {
      $start = $_GET['start'];
    }
    $start = $start*$num-$num;
    $query = "SELECT id, datev, nomP, prenomP, telP, mailP, nomI, prenomI, mailI, adresse, codeP, ville, pays, description, id_tw_car FROM twp_Message ORDER BY id desc LIMIT $start, $num";
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function sendmail($mess)
  {
    $idc=$mess[14];
    $article0 = twp_Model::getAllModelWithId();
    $article1 = twp_Color::getAllColor() ;
    $car = twp_Car::getAllCarByIdtest2($idc);
    $annee=$car[0]->Years;
    $marque=twp_Car::getCarInfos($article0,$car[0]->id_twp_Model,'brand2');
    $model=twp_Car::getCarInfos($article0,$car[0]->id_twp_Model,'model2');
    $couleur1=twp_Car::getCarInfos($article1,$car[0]->Details_Color_1,'color');
    $couleur2=twp_Car::getCarInfos($article1,$car[0]->Details_Color_2,'color');
    $voitureinfo="";
    $pays="non defini";
    if($mess[12]!="pays"){
      $pays=$mess[12];
    }
    foreach ($car as $value) {
      $voitureinfo=$value->Immatriculation;
    }

    $body =
    "<h1>Informations du dépot de vol du: ".twp_Message::getDateForDatabase($mess[1])."</h1>
    <h2>Propriétaire: </h2>
    <h3>Nom:".$mess[2]."</h3>
    <h3>Prenom: ".$mess[3]."</h3>
    <h3>Telephone: ".$mess[4]."</h3>
    <h3> Mail: ".$mess[5]."</h3>
    <hr />
    <h2>Internaute: </h2>
    <h3>Nom: ".$mess[6]."</h3>
    <h3>Prenom: ".$mess[7]."</h3>
    <h3>Mail: ".$mess[8]."</h3>
    <hr />
    <h2>Lieu: </h2>
    <h3>adresse: ".$mess[9]."</h3>
    <h3>ville: ".$mess[10]."</h3>
    <h3>code postal : ".$mess[11]."</h3>
    <h3> pays : ".$pays."</h3>
    <h3> Description:</h3>
    ".$mess[13]."<hr />
    <h2>Information Vehicule :</h2>
    <h3> Imatriculation du vehicule : ".$voitureinfo."</h3>
    <h3> Marque du vehicule : ".$marque."</h3>
    <h3> Modéle du vehicule : ".$model."</h3>
    <h3>Année dyu vehicule : ".$annee."</h3>
    <h3>couleurs du vehicule :".$couleur1.",".$couleur2."</h3>";





    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail

    $mail->IsSMTP();
    $mail->Host       = "ssl0.ovh.net:465";
    $mail->Port       = 1;
    $mail->Username   = "contact@tacotroc.com";
    $mail->Password   = "4emeBlanchemaille";
    $mail->SetFrom('contact@tacotroc.com', 'Mail vole');
    $mail->AddReplyTo("contact@tacotroc.com","Your name");
    $mail->Subject    = "Nouveau depot de vol";
    $mail->AltBody    = "Any message.";
    $mail->MsgHTML($body);
    $address = "contact@tacotroc.com";//"larryhollestelle@gmail.com";
    $mail->AddAddress($address,"Pascal");
    if(!$mail->Send()) {
      echo "1";
    } else {
      echo "2";
    }
  }


}

?>
