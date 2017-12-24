<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:50
 */
namespace app\models;

use app\Config;
use app\R;
use app\table\PatientTable;


/**
 * Patient
 *
 * @Table(name="patient", indexes={@Index(name="idUser", columns={"idUser"})})
 * @Entity
 */
class Patient
{
    /**
     * @var integer
     *
     * @Column(name="idPatient", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idpatient;

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
     * @var \DateTime
     *
     * @Column(name="dateDeNaissance", type="date", nullable=false)
     */
    private $datedenaissance;

    /**
     * @var string
     *
     * @Column(name="numTel", type="string", length=10, nullable=false)
     */
    private $numtel;

    /**
     * @var string
     *
     * @Column(name="nss", type="string", length=20, nullable=false)
     */
    private $nss;

    /**
     * @var User
     *
     * @ManyToOne(targetEntity="User", cascade="persist")
     * @JoinColumns({
     *   @JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $user;

    /**
     * @return int
     */
    public function getIdpatient()
    {
        return $this->idpatient;
    }

    /**
     * @param int $idpatient
     */
    public function setIdpatient($idpatient)
    {
        $this->idpatient = $idpatient;
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
     * @return \DateTime
     */
    public function getDatedenaissance()
    {
        return $this->datedenaissance;
    }

    /**
     * @param \DateTime $datedenaissance
     */
    public function setDatedenaissance($datedenaissance)
    {
        $this->datedenaissance = $datedenaissance;
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
     * @return string
     */
    public function getNss()
    {
        return $this->nss;
    }

    /**
     * @param string $nss
     */
    public function setNss($nss)
    {
        $this->nss = $nss;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public static function getAll($size = null, $offset = null){
        $patientRepo = Config::getInstance()->getEntityManager()->getRepository(R::PATIENT);
        return $patientRepo->findBy(array(), array(), $size, $offset);
    }

    public function getLettre(){
        return 'P';
    }

    public function getAvatar(){
        return 'images/patient.png';
    }
}