<?php
namespace app\models;
use app\Config;
use app\table\MedecinTable;
use app\table\PatientTable;
use app\table\UserTable;
class User
{
    protected $idUser;
    protected $username;
    protected $password;
    protected $nom;
    protected $prenom;
    protected $numTel;
    protected $poste;
    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    /**
     * @return mixed
     */
    public function getNumTel()
    {
        return $this->numTel;
    }
    /**
     * @param mixed $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }
    /**
     * @return mixed
     */
    public function getPoste()
    {
        return $this->poste;
    }
    /**
     * @param mixed $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }
    /**
     * Check if username and password is valid
     * @param $username
     * @param $password
     * @return bool
     */
    public static function isUser($username, $password)
    {
        if (!isset($username) || !isset($password))
            return false;
        $userTable = new UserTable(Config::getInstance()->getDatabase());
        $user = $userTable->getUser($username);
        if (is_null($user))
            return false;
        if ($password == $user->getPassword()){
            $_SESSION['user'] = serialize($user);
            return true;
        }
    }

    /**
     * @param $name string
     * @return array
     */
    public static function getSuggestions($name){
        $medTable = new MedecinTable(Config::getInstance()->getDatabase());
        $patientTable = new PatientTable(Config::getInstance()->getDatabase());
        $patients = $patientTable->findByName($name);
        $medecins = $medTable->findByName($name);

        return array_merge($patients, $medecins);
    }
}