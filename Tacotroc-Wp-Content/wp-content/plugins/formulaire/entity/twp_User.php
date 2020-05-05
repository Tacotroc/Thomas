<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/twp_Nationality.php');

require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/model/model.php');
class twp_User
{




  /**
  * conteneur id
  *
  * @var integer
  */
  private $id;

  /**
  * conteneur last_name
  *
  * @var string
  */
  private $last_Name;

  /**
  * conteneur first_name
  *
  * @var string
  */
  private $first_Name;

  /**
  * conteneur first_name
  *
  * @var boolean
  */
  private $indentity_card;

  public function getIndentityCard()
  {
    return $this->indentity_card;
  }

  public function setIdentityCard($indentity_card)
  {
    $this->indentity_card = $indentity_card;

    return $this;
  }

  /**
  * conteneur first_name
  *
  * @var string
  */
  private $birth;

  public function getBirth()
  {
    return $this->birth;
  }

  public function setBirth($birth)
  {
    $this->birth = $birth;

    return $this;
  }

  /**
  * conteneur first_name
  *
  * @var string
  */
  private $country;

  public function getCountry()
  {
    return $this->country;
  }

  public function setCountry($country)
  {
    $this->country = $country;

    return $this;
  }
  /**
  * conteneur first_name
  *
  * @var integer
  */
  private $nation;

  public function getNation()
  {
    $var = twp_Nationality::getNationalityById(unserialize($_SESSION['User'])->nation);
    foreach ($var as $vars) { $nationality = new twp_Nationality($vars->id,$vars->Name);}
    return $nationality;
  }

  public function setNation($nation)
  {
    $this->nation = $nation;
    return $this;
  }
  /**
  * conteneur pseudo
  *
  * @var string
  */
  private $pseudo;

  /**
  * conteneur mail
  *
  * @var string
  */
  private $mail;

  /**
  * conteneur phone
  *
  * @var string
  */
  private $phone;

  /**
  * conteneur password
  *
  * @var string
  */
  private $password;

  /**
  * conteneur token
  *
  * @var string
  */
  protected $token;

  /**
  * conteneur date creation
  *
  * @var string
  */
  private $date;

  /**
  * conteneur ip
  *
  * @var string
  */
  private $ip;

  /**
  * conteneur ip
  *
  * @var string
  */
  private $nom_entreprise;

  public function getNomEntreprise()
  {
    return $this->nom_entreprise;
  }

  public function setNomEntreprise($nom_entreprise)
  {
    $this->nom_entreprise = $nom_entreprise;

    return $this;
  }


  /**
  * conteneur ip
  *
  * @var string
  */
  private $siret;


  public function getSiret()
  {
    return $this->siret;
  }

  public function setSiret($siret)
  {
    $this->siret = $siret;

    return $this;
  }
  /**
  * conteneur ip
  *
  * @var string
  */
  private $nom_contact;

  public function getNomContact()
  {
    return $this->nom_contact;
  }

  public function setNomContact($nom_contact)
  {
    $this->nom_contact = $nom_contact;

    return $this;
  }
  /**
  * conteneur ip
  *
  * @var boolean
  */
  private $entreprise;

  public function getEntreprise()
  {
    return $this->entreprise;
  }

  public function setEntreprise($entreprise)
  {
    $this->entreprise = $entreprise;

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
  * Get the value of conteneur last_name
  *
  * @return string
  */
  public function getLastName()
  {
    return $this->last_Name;
  }



  /**
  * Set the value of conteneur last_name
  *
  * @param string last_Name
  *
  * @return self
  */
  public function setLastName($last_Name)
  {
    $this->last_Name = $last_Name;

    return $this;
  }

  /**
  * Get the value of conteneur first_name
  *
  * @return string
  */
  public function getFirstName()
  {
    return $this->first_Name;
  }

  /**
  * Set the value of conteneur first_name
  *
  * @param string first_Name
  *
  * @return self
  */
  public function setFirstName($first_Name)
  {
    $this->first_Name = $first_Name;

    return $this;
  }

  /**
  * Get the value of conteneur pseudo
  *
  * @return string
  */
  public function getPseudo()
  {
    return $this->pseudo;
  }

  /**
  * Set the value of conteneur pseudo
  *
  * @param string pseudo
  *
  * @return self
  */
  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;

    return $this;
  }

  /**
  * Get the value of conteneur mail
  *
  * @return string
  */
  public function getMail()
  {
    return $this->mail;
  }

  /**
  * Set the value of conteneur mail
  *
  * @param string mail
  *
  * @return self
  */
  public function setMail($mail)
  {
    $this->mail = $mail;

    return $this;
  }

  /**
  * Get the value of conteneur phone
  *
  * @return integer
  */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
  * Set the value of conteneur phone
  *
  * @param integer phone
  *
  * @return self
  */
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  /**
  * Get the value of conteneur password
  *
  * @return string
  */
  public function getPassword()
  {
    return $this->password;
  }

  /**
  * Set the value of conteneur password
  *
  * @param string password
  *
  * @return self
  */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
  * Get the value of conteneur token
  *
  * @return string
  */
  public function getToken()
  {
    return $this->token;
  }

  /**
  * Set the value of conteneur token
  *
  * @param string token
  *
  * @return self
  */
  public function setToken($token)
  {
    $this->token = $token;

    return $this;
  }

  /**
  * Get the value of Date
  *
  * @return mixed
  */
  public function getDate()
  {
    return $this->date;
  }

  /**
  * Set the value of Date
  *
  * @param mixed date
  *
  * @return self
  */
  public function setDate($date)
  {
    $this->date = $date;

    return $this;
  }

  /**
  * Get the value of conteneur ip
  *
  * @return string
  */
  public function getIp()
  {
    return $this->ip;
  }

  /**
  * Set the value of conteneur ip
  *
  * @param string ip
  *
  * @return self
  */
  public function setIp($ip)
  {
    $this->ip = $ip;

    return $this;
  }


  public function __construct ($idc,$ln,$fn,$ps,$m,$ph,$p,$t,$dc,$i,$ic,$bh,$cy,$nt,$ne,$st,$nc,$en)
  {
    $this->id = $idc;
    $this->last_Name = $ln;
    $this->first_Name = $fn;
    $this->pseudo = $ps;
    $this->mail=$m;
    $this->phone=$ph;
    $this->password=$p;
    $this->token=$t;
    $this->date=$dc;
    $this->ip=$i;

    $this->nation=$nt;
    $this->birth=$bh;
    $this->indentity_card=$ic;
    $this->country=$cy;
    $this->nom_entreprise=$ne;

    $this->siret = $st;
    $this->nom_contact=$nc;
    $this->entreprise=$en;


  }

  //dysplay method
  public static function showUser(){
    echo $this->getId(). "</br>";
    echo $this->getLastName(). "</br>";
    echo $this->getFirstName(). "</br>";
    echo $this->getPseudo(). "</br>";
    echo $this->getMail(). "</br>";
    echo $this->getPhone(). "</br>";
    echo $this->getPassword(). "</br>";
    echo $this->getToken(). "</br>";
    echo $this->getDate(). "</br>";
    echo $this->getIp(). "</br>";
    echo $this->getIndentityCard(). "</br>";
    echo $this->getAdressVie(). "</br>";
    echo $this->getNation(). "</br>";
    echo $this->getBirth(). "</br>";
    echo $this->getCountry(). "</br>";

  }

  //function select all club for pagination
  public static function getAllUserLIMIT()
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
    $query = "SELECT * FROM twp_User ORDER BY Last_Name LIMIT $start, $valeurParPage";
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  //function for select all user in data base
  public static function getAllUser()
  {
    $query = 'SELECT * FROM twp_User';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllUserOrdered()
  {
    $query = 'SELECT * FROM twp_User ORDER BY First_Name';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }

  public static function getAllUser2()
  {
    $query = 'SELECT CONCAT (First_Name," ",Last_Name) as Name FROM twp_User';
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  //function for select all user in data base
  public static function getUser($n)
  {

    $query = "SELECT * FROM twp_User  WHERE Pseudo='".$n."'";
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }
  //fonction for user delete
  public static function deleteUser($id){
    $prepare =('DELETE FROM twp_User WHERE id=:id');
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id]);
    echo "l'utilisateur est supprimé avec succès!";
  }

  //funtion update user in database
  public static function updateUser($id, $Last_Name, $First_Name, $Pseudo, $Mail,$Indentity_card,$Birth,$Adress_vie,$Country,$Nation ){
    $prepare = ("UPDATE twp_User SET Last_Name=:Last_Name, First_Name=:First_Name, Pseudo=:Pseudo, Mail=:Mail,identity_card=:Identity ,birth=:Birth	,Adress_Vie=:Adresse,Country=:Country ,nation=:Nation	 WHERE id=:id");
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id, ':Last_Name' => $Last_Name, ':First_Name' => $First_Name, ':Pseudo' => $Pseudo, ':Mail' => $Mail,':Indentity' => $Indentity_card,':Birth' => $Birth,':Adresse' => $Adress_vie,':Country' => $Country,':Nation' => $Nation]);
    echo "l'utilisateur est modifié avec succès!";
  }

  public static function updateUserSession($id, $Last_Name, $First_Name, $Pseudo, $Mail,$nation,$nom_entreprise,$siret){
    $prepare = ("UPDATE twp_User SET Last_Name=:Last_Name, First_Name=:First_Name, Pseudo=:Pseudo, Mail=:Mail, nation=:Nation,Nom_Entreprise=:Nom_E,Siret=:Siret WHERE id=:id");
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id, ':Last_Name' => $Last_Name, ':First_Name' => $First_Name, ':Pseudo' => $Pseudo, ':Mail' => $Mail,':Nation' => $nation,':Nom_E'=>$nom_entreprise,':Siret'=>$siret]);
  echo $nation;
    //  echo "l'utilisateur est modifié avec succès!";
  }

  public static function updateUserSessionMdp($p1)
  {

    $p= password_hash($p1, PASSWORD_DEFAULT);
    $id = unserialize($_SESSION['User'])->id;
    $prepare = ("UPDATE twp_User SET Password=:Pass  WHERE id=:id");
    $stmt = Model::$pdo->prepare($prepare);
    $stmt -> execute([':id' => $id, ':Pass' => $p]);
    echo "l'utilisateur est modifié avec succès!";


  }

  public static function testSaveEntreprise($ln,$m,$nt,$ntt,$st,$p1,$p2)
  {
    $nom_entreprise =$ln;
    $nom_contact = $m;
    $prenom_contact = $nt;
    $tel=$ntt;
    $siret=$st;
    $pass=$p1;
    $passok=$p2;
    $patternPseudo="/^(?=[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]+$)(?=.*[a-z]+).{5,50}$/";
    $siretpattern = "/^\\d{14}$/";
    $patternPassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,32}$/";
    $faultcounter=0;

    //verification of the variables present in the form
    if(empty($siret) || empty($nom_contact) || empty($prenom_contact) || empty($tel) || empty($pass))
    {
      $faultcounter =1;
    }
    //if all empty ok
    else
    {
      //checking a search for a match with the pattern for the variable
      if(!preg_match($patternPassword, $pass))
      {
        $faultcounter =2;
      }
      //password check = to confirm password
      elseif($passok != $pass)
      {
        $faultcounter =3;
      }
      //verification of pseudo duplicates in the database
      elseif(preg_match($patternPseudo, $nom_entreprise))
      {
        $prepare=("SELECT Pseudo FROM twp_User WHERE Pseudo='".$nom_entreprise."' ");
        $bdd=Model::$pdo->prepare($prepare);
        $result=$bdd->execute();

        if($bdd->rowCount($result) != 0)
        {
          $faultcounter = 4;
        }


      }
    }
    echo $faultcounter;
  }

  public static function testSaveUser($ln,$fn,$ps,$m,$p1,$p2,$nt)
  {
    //variable declaration
    $lastname= $ln;
    $firstname=$fn;
    $pseudo=$ps;
    $email=$m;
    $pass=$p1;
    $passok=$p2;
    $nation=$nt;
    $ntpattern = "/^[0-9]+$/";
    $patternLastname="/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ._\s-]{2,50}$/";
    $patternFirstname="/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ._\s-]{2,50}$/";
    $patternPseudo="/^(?=[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]+$)(?=.*[a-z]+).{7,16}$/";
    $patternMail="/^[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/";
    $patternPassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,32}$/";
    $faultcounter=0;

    //verification of the variables present in the form
    if(empty($lastname) || empty($firstname) || empty($pseudo) || empty($email) || empty($pass))
    {
      $faultcounter =1;
    }
    //if all empty ok
    else
    {
      //checking a search for a match with the pattern for the variable
      if(!preg_match($patternLastname, $lastname))
      {
        $faultcounter =2;
      }
      elseif(!preg_match($patternFirstname, $firstname))
      {
        $faultcounter =3;
      }
      elseif(!preg_match($patternPseudo, $pseudo))
      {
        $faultcounter =4;
      }
      elseif(!preg_match($patternMail, $email))
      {
        $faultcounter =5;
      }

      elseif(!preg_match($patternPassword, $pass))
      {
        $faultcounter =6;
      }
      //password check = to confirm password
      elseif($passok != $pass)
      {
        $faultcounter =7;
      }
      //verification of pseudo duplicates in the database
      elseif(preg_match($patternPseudo, $pseudo))
      {
        $prepare=("SELECT Pseudo FROM twp_User WHERE Pseudo='".$pseudo."' ");
        $bdd=Model::$pdo->prepare($prepare);
        $result=$bdd->execute();
        //if the request does not return anything, it means that the pseudo don't exist
        if($bdd->rowCount($result) != 0)
        {
          $faultcounter =8;
        }
        elseif(!preg_match($ntpattern, $nation))
        {
          $faultcounter =10;
        }
        //verification of mail duplicates in the database
        elseif($email)
        {
          $prepare=("SELECT Mail FROM twp_User WHERE Mail='".$email."' ");
          $bdd=Model::$pdo->prepare($prepare);
          $result=$bdd->execute();
          //if the request does not return anything, it means that the mail don't exist
          if($bdd->rowCount($result) != 0)
          {
            $faultcounter =9;
          }
        }
      }
    }
    echo $faultcounter;
  }

  public static function saveUser($ln,$fn,$ps,$m,$ph,$p,$t,$dc,$i,$nt)
  {
    //the function allows you to create a hash key for a password, password_defaut = bcrypt(jusuq'a 255 caractères)
    $p= password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $dc=date('Y-m-d');
    // stock the registrant's IP
    $i=$_SERVER['REMOTE_ADDR'];
    //insert in database a new user with request prepare
    $prepare=("INSERT INTO twp_User(Last_Name,First_Name,Pseudo,Mail,Phone,Password,Token,Date_Creation,Internet_Protocol,nation,Entreprise)/*,identity_card,birth,Adress_Vie,Country,nation)*/
    VALUES (:Last_Name,:First_Name,:Pseudo,:Mail,:Phone,:Password,:Token,:Date_Creation,:Internet_Protocol,:Nation,:Entreprise/*,:Identity ,:Birth,:Adresse,:Countryl,:Nation*/)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Last_Name',$ln);
    $bdd->bindParam(':First_Name',$fn);
    $bdd->bindParam(':Pseudo',$ps);
    $bdd->bindParam(':Mail',$m);
    $bdd->bindParam(':Phone',$ph);
    $bdd->bindParam(':Password',$p);
    $bdd->bindParam(':Token',$t);
    $bdd->bindParam(':Date_Creation',$dc);
    $bdd->bindParam(':Internet_Protocol',$i);
    /*    $bdd->bindParam(':Indentity',$ic);
    $bdd->bindParam(':Birth',$bh);
    $bdd->bindParam(':Adresse',$av);
    $bdd->bindParam(':Country',$cy);*/
    $bdd->bindParam(':Nation',$nt);
    $boll=0;
    $bdd->bindParam(':Entreprise',$boll);
    $bdd->execute();
  }
  public static function SaveEntreprise($m,$nt,$ln,$ntt,$p1,$st)
  {


    //the function allows you to create a hash key for a password, password_defaut = bcrypt(jusuq'a 255 caractères)
    $p= password_hash($p1, PASSWORD_DEFAULT);
    $dc=date('Y-m-d');
    // stock the registrant's IP
    $i=$_SERVER['REMOTE_ADDR'];
    //insert in database a new user with request prepare
    $prepare=("INSERT INTO twp_User(Last_Name,First_Name,Pseudo,Phone,Password,Token,Date_Creation,Internet_Protocol,Nom_Entreprise,Siret,Nom_Contact,Entreprise)/*,identity_card,birth,Adress_Vie,Country,nation)*/
    VALUES (:Last_Name,:First_Name,:Pseudo,:Phone,:Password,:Token,:Date_Creation,:Internet_Protocol,:Nom_Entreprise,:Siret,:Nom_Contact,:Entreprise/*,:Identity ,:Birth,:Adresse,:Countryl,:Nation*/)");
    $bdd= Model::$pdo->prepare($prepare);
    $bdd->bindParam(':Last_Name',$m);
    $bdd->bindParam(':First_Name',$nt);
    $bdd->bindParam(':Pseudo',$ln);
    $bdd->bindParam(':Phone',$ntt);
    $bdd->bindParam(':Password',$p);
    $bdd->bindParam(':Token',$t);
    $bdd->bindParam(':Date_Creation',$dc);
    $bdd->bindParam(':Internet_Protocol',$i);
    $bdd->bindParam(':Nom_Entreprise',$ln);

    $bdd->bindParam(':Siret',$st);
    $nom = $m." ".$nt;
    $bdd->bindParam(':Nom_Contact',$nom);
    $boll=1;
    $bdd->bindParam(':Entreprise',$boll);
    $bdd->execute();

  }

  //function for authentification / session and cookie
  public static function login_session($pseudo,$password)
  {
    //variable declaration

    $pseudo=$_POST['Pseudo'];
    $pass=$_POST['Password'];


    //verification of the variables present in the form
    if(empty($pseudo) || empty($pass))
    {
      echo'veuillez renseigner tous les champs';
    }
    else
    {
      //request for take the password and the id compared to the nickname
      $prepare=("SELECT id, Password FROM twp_User WHERE Pseudo= :Pseudo");
      $bdd= Model::$pdo->prepare($prepare);
      $bdd->execute(array(
        'Pseudo'=>$pseudo

      ));
      $resultat=$bdd->fetch();
    }

    $passwordCorrect = password_verify($password, $resultat['Password']);

    if($passwordCorrect)
    {
      session_start();
      $_SESSION['Pseudo']=$_POST['Pseudo'];
      $_SESSION['Password']=$_POST['Password'];
      $query = 'SELECT id,Last_Name,First_Name,Pseudo,Mail,Phone,Password,Token,Date_Creation,Internet_Protocol,identity_card,birth,Country,nation,Nom_Entreprise,Siret,Nom_Contact,Entreprise FROM twp_User WHERE Pseudo=:pseudonyme';
      $rep = Model::$pdo->prepare($query);
      $rep->bindParam(':pseudonyme',$pseudo);
      $rep->setFetchMode (PDO::FETCH_OBJ);
      $rep->execute();
      $tab_obj=$rep->fetchAll();
      $userCon =new twp_User($tab_obj[0]->id, $tab_obj[0]->Last_Name,$tab_obj[0]->First_Name,$tab_obj[0]->Pseudo,$tab_obj[0]->Mail,$tab_obj[0]->Phone,$tab_obj[0]->Password,$tab_obj[0]->Token,$tab_obj[0]->Date_Creation,$tab_obj[0]->Internet_Protocol,$tab_obj[0]->identity_card,  $tab_obj[0]->birth,  $tab_obj[0]->Country,  $tab_obj[0]->nation,
      $tab_obj[0]->Nom_Entreprise,$tab_obj[0]->Siret,$tab_obj[0]->Nom_Contact,$tab_obj[0]->Entreprise);
      $_SESSION['User']=serialize($userCon);
      echo 'Vous êtes connecté !';


      if(isset($_POST['remember']))
      {
        $deconnexion=0;
        setcookie('auth_pseudo', sha1($pseudo), time() + 3600 * 24 * 31, '/', "localhost", true, true);
        setcookie('auth_mdp', sha1($pass), time() + 3600 * 24 * 31, '/', "localhost", true, true);
        setcookie('auth_deco', $deconnexion, time() + 3600 * 24 * 31, '/', "localhost", true, true);
      }
    }
    else
    {
      echo 'Mauvais identifiant ou mot de passe !';
    }
    // checks if there is no session and detects the presence of a cookie if it is true then open a session. the session variables take the value of the cookie variable.
    if(!$_SESSION)
    {

      if(isset($_COOKIE['auth_pseudo']) && isset($_COOKIE['auth_mdp']))
      {
        session_start();
        $_SESSION['Pseudo'] = $_COOKIE['auth_pseudo'];
        $_SESSION['Password'] = $_COOKIE['auth_mdp'];

      }
    }
  }



  //the function for destroy a session variable and session
  public static function logout_session()
  {
    //checks for the presence of the auth_deco cookie, if true then the disconnect variable is incremented by 1
    if(isset($_COOKIE['auth_deco']))
    {
      $deconnexion = 1;
      setcookie('auth_deco', $deconnexion, time() + 3600 * 24 * 31, '/', "localhost",true, true);
    }
    session_start();

    //destruction of session variables
    session_unset ();

    //destruction of the session
    session_destroy ();

  }


  public static function getUserById($idUserCo)
  {
    $query = 'SELECT Last_Name, First_Name, Pseudo, Mail, Phone, Password,Token, Date_Creation, Internet_Protocol, identity_card birth, nation, Country, Nom_Entreprise, Siret, Nom_Contact, Entreprise FROM twp_User WHERE id ='.$idUserCo;
    $rep = Model::$pdo->query($query);
    $rep->setFetchMode (PDO::FETCH_OBJ);
    $tab_obj=$rep->fetchAll();
    return $tab_obj;
  }


  public static function testSaveUserModif($ln,$fn,$ps,$m,$nt)
  {
    //variable declaration
    $lastname= $ln;
    $firstname=$fn;
    $pseudo=$ps;
    $email=$m;
    /*  $pass=$p1;
    $passok=$p2;*/
    $nation=$nt;
    $ntpattern = "/^[0-9]+$/";
    $patternLastname="/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ._\s-]{2,50}$/";
    $patternFirstname="/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ._\s-]{2,50}$/";
    $patternPseudo="/^(?=[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]+$)(?=.*[a-z]+).{7,16}$/";
    $patternMail="/^[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/";
    $patternPassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,32}$/";
    $faultcounter=0;


    //verification of the variables present in the form
    if(empty($lastname) || empty($firstname) || empty($pseudo) || empty($email))
    {
      $faultcounter =1;
    }
    //if all empty ok
    else
    {
      //checking a search for a match with the pattern for the variable
      if(!preg_match($patternLastname, $lastname))
      {
        $faultcounter =2;
      }
      elseif(!preg_match($patternFirstname, $firstname))
      {
        $faultcounter =3;
      }
      elseif(!preg_match($patternPseudo, $pseudo))
      {
        $faultcounter =4;
      }
      elseif(!preg_match($patternMail, $email))
      {
        $faultcounter =5;
      }


      elseif(preg_match($patternPseudo, $pseudo))
      {
        $prepare=("SELECT Pseudo FROM twp_User WHERE Pseudo='".$pseudo."' ");
        $bdd=Model::$pdo->prepare($prepare);
        $result=$bdd->execute();

        $query=("SELECT id FROM twp_User WHERE Pseudo='".$pseudo."' ");
        $rep = Model::$pdo->query($query);
        $rep->setFetchMode (PDO::FETCH_OBJ);
        $tab_obj=$rep->fetchAll();
        foreach ($tab_obj as $value) {
          $pseudorentrant = $value->id;
        }

        if(($bdd->rowCount($result) != 0) && $pseudorentrant != unserialize($_SESSION['User'])->id )
        {



          $faultcounter = 6;

        }
        elseif(!preg_match($ntpattern, $nation))
        {
          $faultcounter =8;
        }

        elseif($email)
        {
          $query=("SELECT id FROM twp_User WHERE Mail='".$email."' ");
          $rep = Model::$pdo->query($query);
          $rep->setFetchMode (PDO::FETCH_OBJ);
          $tab_obj=$rep->fetchAll();
          foreach ($tab_obj as $value) {
            $pseudorentrant = $value->id;
          }
          $prepare=("SELECT Mail FROM twp_User WHERE Mail='".$email."' ");
          $bdd=Model::$pdo->prepare($prepare);
          $result=$bdd->execute();


          if(($bdd->rowCount($result) != 0) && $pseudorentrant != unserialize($_SESSION['User'])->id )
          {
            $faultcounter =7;
          }
        }
      }
    }
    echo $faultcounter;
  }

  public static function testSaveUserModifMdp($ps)
  {
    $pass=$ps;
    $patternPassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,32}$/";
    $faultcounter=0;

    if(empty($pass) )
    {
      $faultcounter =1;
    }
    else if (preg_match($patternPassword, $pass))
    {
      $idCo = unserialize($_SESSION['User'])->id;
      $query=("SELECT Password FROM twp_User WHERE id ='".$idCo."' ");
      $rep = Model::$pdo->query($query);
      $rep->setFetchMode (PDO::FETCH_OBJ);
      $tab_obj=$rep->fetchAll();



      foreach ($tab_obj as  $value) {


        $passwordCorrect = password_verify($pass, $value->Password);

      }

      if(!$passwordCorrect)
      {
        $faultcounter =2;
      }



    }
    else  if(!preg_match($patternPassword, $pass))
    {
      $faultcounter =3;
    }

    echo $faultcounter;}

    public static function testSaveUserModifMdpValide($p1,$p2)
    {
      $pass=$p1;
      $passok=$p2;

      $patternPassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,32}$/";
      $faultcounter=0;

      if(empty($pass) || empty($passok))
      {
        $faultcounter =1;
      }
      elseif(!preg_match($patternPassword, $pass))
      {
        $faultcounter =2;
      }
      elseif($passok != $pass)
      {
        $faultcounter =3;
      }




      echo $faultcounter;
    }}
