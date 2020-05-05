<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt/connexionPDO/ConnexionCompte.php');

class Compte_User
{


  private $id;
  private $nom;
  private $prenom;
  private $pseudo;
  private $mdp;
  private $mail;
  private $indicPhone;
  private $phone;
  private $ip;
  private $country;
  private $natio;
  private $pro;
  private $entreprise;
  private $numeroTva;
  private $siret;
  private $nomContact;


  public function __construct()
  {
  }


  //function for select all user in data base
  public static function getAllUserAccount()
  {
    $query = 'SELECT * FROM compte_user ORDER BY id';
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tab_obj = $rep->fetchAll();
    return $tab_obj;
  }

  // Function return only PSEUDO and MAIL
  public static function getExistingAccount()
  {
    $query = 'SELECT `pseudo`,`mail` FROM `compte_user` ORDER BY `pseudo`';
    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tabObj = $rep->fetchAll();
    return $tabObj;
  }

  // FONCTION D'AJOUT NOUVEAU COMPTE
  public function registerNewAccount(
    $name,
    $prenom,
    $pseudo,
    $mdp,
    $mail,
    $indic,
    $phone,
    $ip,
    $country,
    $natio,
    $pro,
    $entreprise,
    $numTva,
    $siret,
    $contactEntreprise,
    $codeConfirm,
    $active
  ) {
    $dateInscriptionToday = date('Y-m-d');
    $query = '
    INSERT INTO `compte_user`
    (`nom`, `prenom`, `pseudo`, `mdp`, `mail`, `indicPhone`, `phone`,
     `address_ip`, `pays`, `natio`, `pro`, `entreprise`, `numeroTva`, `siret`, `nomcontact`, `code_confirm`, `active`, `date_inscription`)
      VALUES 
      (:name, :prenom, :pseudo, :mdp, :mail, :indicPhone, :phone,
      :ip, :pays, :natio, :pro, :entreprise, :numTva, :siret, :nomContact, :codeConfirm, :active, :date_inscription)
    ';

    $stmt = ConnexionCompte::$pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':indicPhone', $indic);
    $stmt->bindParam(':phone', $phone);

    $stmt->bindParam(':ip', $ip);
    $stmt->bindParam(':pays', $country);
    $stmt->bindParam(':natio', $natio);
    $stmt->bindParam(':pro', $pro);
    $stmt->bindParam(':entreprise', $entreprise);
    $stmt->bindParam(':numTva', $numTva);
    $stmt->bindParam(':siret', $siret);
    $stmt->bindParam(':nomContact', $contactEntreprise);

    $stmt->bindParam(':codeConfirm', $codeConfirm);
    $stmt->bindParam(':active', $active);

    $stmt->bindParam(':date_inscription', $dateInscriptionToday);

    $stmt->execute();
  }


  // VERIFICATION SI LE LOGIN EXISTE
  public function verifExisteLogin($pseudo)
  {

    $rez = Compte_User::getInfoAccount($pseudo);
    var_dump($rez);

    if (empty($rez)) {
      $_SESSION['errorMsg'] = "Le pseudo n'existe pas";
      return false;
    } else {
      $_SESSION['errorMsg'] = "OK";
      return $rez;
    }
  }


  // CONNEXION ACCOUNT
  public function connexionAccount($hash, $mdp)
  {

    return password_verify($mdp, $hash);
  }

  // Get HASH BY PSEUDO
  public function getHashByPseudo($pseudo)
  {
    $query = "SELECT `mdp` FROM `compte_user` WHERE `pseudo`=\"$pseudo\"";

    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tabObj = $rep->fetchAll();

    return $tabObj;
  }



  ///////////////////////////////
  // Recupère les infos du compte
  public function getInfoAccount($pseudo)
  {

    $query = "SELECT * FROM `compte_user` WHERE `pseudo`=\"$pseudo\"";


    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tab_obj = $rep->fetchAll();
    return $tab_obj;
  }


  public function updateAccount(
    $id,
    $nom,
    $prenom,
    $indic,
    $phone,
    $ip,
    $country,
    $natio,
    $pro,
    $entreprise,
    $tva,
    $siret,
    $contact
  ) {
    $query = "UPDATE compte_user SET 
              nom=:nom,prenom=:prenom,indicPhone=:indic,
              phone=:phone,address_ip=:ip,pays=:country,
              natio=:natio,pro=:pro,entreprise=:entreprise,
              numeroTva=:tva,siret=:siret,nomcontact=:contact
              WHERE id=:id
              ";

    $stmt = ConnexionCompte::$pdo->prepare($query);

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':indic', $indic);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':ip', $ip);

    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':natio', $natio);
    $stmt->bindParam(':pro', $pro);
    $stmt->bindParam(':entreprise', $entreprise);
    $stmt->bindParam(':tva', $tva);
    $stmt->bindParam(':siret', $siret);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':id', $id);




    return $stmt->execute();
  }

  // ACTIVATION D'UN COMPTE
  static public function activateAccountByPseudo($pseudo)
  {
    $date = date('Y-m-j');
    $query = "UPDATE compte_user SET active=1, `date_activation`=:datehan WHERE pseudo=:pseudo";

    $stmt = ConnexionCompte::$pdo->prepare($query);

    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':datehan', $date);

    return $stmt->execute();
  }

  static public function deleteAccountById($id)
  {
    $query = "DELETE FROM `compte_user` WHERE `id`=:id";

    $stmt = ConnexionCompte::$pdo->prepare($query);

    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  static public function getAccountBySearch($input, $search)
  {
    $query = "";
    $query2 = "";
    switch ($search) {
      case 'nameOption':
        $query = "SELECT * FROM `compte_user` WHERE `nom` LIKE '%$input%'";
        break;

      case 'prenomOption':
        $query = "SELECT * FROM `compte_user` WHERE `prenom` LIKE '%$input%'";
        break;

      default:
        break;
    }

    $rep = ConnexionCompte::$pdo->query($query);
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tab_obj = $rep->fetchAll();
    return $tab_obj;
  }

  // LES FONCTION LIÉES AUX VOITURES EXISTANTES OU NON.
  // LES FONCTION LIÉES AUX VOITURES EXISTANTES OU NON.
  // LES FONCTION LIÉES AUX VOITURES EXISTANTES OU NON.

  // A FUNCTION TO SEARCH EXISTING IMMAT IN DB
  static public function searchImmat($immat)
  {
    $query = "SELECT Immatriculation FROM `twp_car` WHERE `Immatriculation` LIKE '%$immat%'";

    $rep = ConnexionCompte::$pdo->query($query);
    // $rep->setFetchMode(PDO::FETCH_ASSOC);
    $tab_obj = $rep->fetchAll(PDO::FETCH_ASSOC);
    return $tab_obj;

  }



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of nom
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get the value of prenom
   */
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @return  self
   */
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;

    return $this;
  }

  /**
   * Get the value of pseudo
   */
  public function getPseudo()
  {
    return $this->pseudo;
  }

  /**
   * Set the value of pseudo
   *
   * @return  self
   */
  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;

    return $this;
  }

  /**
   * Get the value of mdp
   */
  public function getMdp()
  {
    return $this->mdp;
  }

  /**
   * Set the value of mdp
   *
   * @return  self
   */
  public function setMdp($mdp)
  {
    $this->mdp = $mdp;

    return $this;
  }

  /**
   * Get the value of mail
   */
  public function getMail()
  {
    return $this->mail;
  }

  /**
   * Set the value of mail
   *
   * @return  self
   */
  public function setMail($mail)
  {
    $this->mail = $mail;

    return $this;
  }

  /**
   * Get the value of indicPhone
   */
  public function getIndicPhone()
  {
    return $this->indicPhone;
  }

  /**
   * Set the value of indicPhone
   *
   * @return  self
   */
  public function setIndicPhone($indicPhone)
  {
    $this->indicPhone = $indicPhone;

    return $this;
  }

  /**
   * Get the value of phone
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get the value of ip
   */
  public function getIp()
  {
    return $this->ip;
  }

  /**
   * Set the value of ip
   *
   * @return  self
   */
  public function setIp($ip)
  {
    $this->ip = $ip;

    return $this;
  }

  /**
   * Get the value of country
   */
  public function getCountry()
  {
    return $this->country;
  }

  /**
   * Set the value of country
   *
   * @return  self
   */
  public function setCountry($country)
  {
    $this->country = $country;

    return $this;
  }

  /**
   * Get the value of natio
   */
  public function getNatio()
  {
    return $this->natio;
  }

  /**
   * Set the value of natio
   *
   * @return  self
   */
  public function setNatio($natio)
  {
    $this->natio = $natio;

    return $this;
  }

  /**
   * Get the value of pro
   */
  public function getPro()
  {
    return $this->pro;
  }

  /**
   * Set the value of pro
   *
   * @return  self
   */
  public function setPro($pro)
  {
    $this->pro = $pro;

    return $this;
  }

  /**
   * Get the value of entreprise
   */
  public function getEntreprise()
  {
    return $this->entreprise;
  }

  /**
   * Set the value of entreprise
   *
   * @return  self
   */
  public function setEntreprise($entreprise)
  {
    $this->entreprise = $entreprise;

    return $this;
  }

  /**
   * Get the value of numeroTva
   */
  public function getNumeroTva()
  {
    return $this->numeroTva;
  }

  /**
   * Set the value of numeroTva
   *
   * @return  self
   */
  public function setNumeroTva($numeroTva)
  {
    $this->numeroTva = $numeroTva;

    return $this;
  }

  /**
   * Get the value of siret
   */
  public function getSiret()
  {
    return $this->siret;
  }

  /**
   * Set the value of siret
   *
   * @return  self
   */
  public function setSiret($siret)
  {
    $this->siret = $siret;

    return $this;
  }

  /**
   * Get the value of nomContact
   */
  public function getNomContact()
  {
    return $this->nomContact;
  }

  /**
   * Set the value of nomContact
   *
   * @return  self
   */
  public function setNomContact($nomContact)
  {
    $this->nomContact = $nomContact;

    return $this;
  }
}
