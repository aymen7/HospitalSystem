<?php
namespace app\models;
use app\Config;
use app\R;
use app\table\MedecinTable;
use app\table\PatientTable;
use app\table\UserTable;


/**
 * User
 *
 * @Table(name="user", indexes={@Index(name="idSpecialite", columns={"idSpecialite"}), @Index(name="idGrade", columns={"idGrade"})})
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="poste", type="string", length=1)
 * @DiscriminatorMap({"M" = "Medecin", "S" = "Secretaire", "I" = "Infirmier"})
 */
abstract class User
{
    /**
     * @var integer
     *
     * @Column(name="idUser", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=60, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @Column(name="numTel", type="string", length=30, nullable=false)
     */
    private $numtel;

    private $poste;

    /**
     * @var Specialite
     *
     * @ManyToOne(targetEntity="Specialite", fetch="EAGER", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="idSpecialite", referencedColumnName="idSpecialite")
     * })
     */
    private $specialite;

    /**
     * @var Grade
     *
     * @ManyToOne(targetEntity="Grade", fetch="EAGER", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="idGrade", referencedColumnName="idGrade")
     * })
     */
    private $grade;



    /**
     * @return int
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param int $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNumtel()
    {
        return $this->numtel;
    }

    /**
     * @param string $numtel
     */
    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;
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
     * @return Specialite
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param Specialite $specialite
     */
    public function setSpecialite(Specialite $specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param Grade $grade
     */
    public function setGrade(Grade $grade)
    {
        $this->grade = $grade;
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

        $userRepo = Config::getInstance()->getEntityManager()->getRepository(R::USER);
        $user = $userRepo->findOneBy(array('username' => $username));

        if (is_null($user))
            return false;

        if (password_verify($password, $user->getPassword())){
            $_SESSION['user'] = serialize($user);
            return true;
        }
    }

    /**
     * @param $name string
     * @return array
     */
    public static function getSuggestions($name){
        $em = Config::getInstance()->getEntityManager();
        $query = $em->createQuery("SELECT m FROM " . R::MEDECIN . " m WHERE m.nom LIKE '%$name%' 
        OR m.prenom LIKE '%$name%' OR CONCAT(CONCAT(m.nom, ' '), m.prenom) LIKE '%$name%' 
        OR CONCAT(CONCAT(m.prenom, ' '), m.nom) LIKE '%$name%'");
        $medecins = $query->getResult();

        $query = $em->createQuery("SELECT p FROM " . R::PATIENT . " p WHERE p.nom LIKE '%$name%' OR p.prenom LIKE '%$name%' 
        OR p.nss LIKE '%$name%'");
        $patients = $query->getResult();

        return array_merge($patients, $medecins);
    }

    public function __toString()
    {
        return $this->getNom() . " " . $this->getPrenom();
    }


}
