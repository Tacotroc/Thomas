<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/CompteTt/connexionPDO/ConnexionCompte.php');

class Address_Comptett
{

    private $id_address;
    private $nom_address;
    private $num_address;
    private $num2_address;
    private $rue_address;
    private $complement_address;
    private $ville_address;
    private $cp_address;
    private $pays_address;
    private $id_user_compte;


    // CONSTRUCTEUR
    public function __construct()
    {
    }

    public static function getAddressByUserId($userId)
    {

        $query = 'SELECT * FROM `address_comptett` WHERE `id_user_compte`=:userId';

        $stmt = ConnexionCompte::$pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function registerNewAddress(
        $nom,
        $num,
        $num2,
        $rue,
        $complement,
        $ville,
        $cp,
        $pays,
        $id_user
    ) {

        $query = "INSERT INTO `address_comptett`
( `nom_address`, `num_address`, `num2_address`, `rue_address`, `complement_address`,
 `ville_address`, `cp_address`, `pays_address`, `id_user_compte`) 
VALUES 
(:nom, :num, :num2, :rue, :complement,
    :ville, :cp, :pays, :id_user)";
        $param = [
            ':nom' => $nom,
            ':num' => $num,
            ':num2' => $num2,
            ':rue' => $rue,
            ':complement' => $complement,
            ':ville' => $ville,
            ':cp' => $cp,
            ':pays' => $pays,
            ':id_user' => $id_user
        ];

        $stmt = ConnexionCompte::$pdo->prepare($query);
        foreach ($param as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->execute();
    }

    





}
