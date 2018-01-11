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
use Doctrine\Common\Collections\ArrayCollection;


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
     * @OneToMany(targetEntity="Consultation", mappedBy="patient")
     */
    private $consultations;

    /**
     * @OneToMany(targetEntity="Lit", mappedBy="patient")
     */
    private $lits;

    /**
     * Patient constructor.
     */
    public function __construct()
    {
        $this->consultations = new ArrayCollection();
        $this->lits = new ArrayCollection();
    }


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

    public function __toString()
    {
        return $this->getNom() . " " . $this->getPrenom();
    }

    /**
     * @return mixed
     */
    public function getConsultations()
    {
        return $this->consultations;
    }

    /**
     * @param mixed $consultations
     */
    public function setConsultations($consultations)
    {
        $this->consultations = $consultations;
    }

    /**
     * @return mixed
     */
    public function getLits()
    {
        return $this->lits;
    }

    /**
     * @param mixed $lits
     */
    public function setLits($lits)
    {
        $this->lits = $lits;
    }


    /**
     * @return String this object in json
     */
    public function toJson(){
        $tab = [];
        $tab['idPatient'] = $this->idpatient;
        $tab['nom'] = $this->nom;
        $tab['prenom'] = $this->prenom;
        $tab['dateDeNaissance'] = $this->datedenaissance->format('d/m/Y');
        $tab['nss'] = $this->nss;

        return json_encode($tab);
    }



}