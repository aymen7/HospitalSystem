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
     * @var \User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;











    public static function getAll(){
        $patientRepo = Config::getInstance()->getEntityManager()->getRepository(R::Patient);
        return $patientRepo->findAll();
    }

    public function getLettre(){
        return 'P';
    }

    public function getAvatar(){
        return 'images/patient.png';
    }
}