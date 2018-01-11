<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:35
 */

namespace app\models;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * Consultation
 *
 * @Table(name="consultation", indexes={@Index(name="idPatient", columns={"idPatient"}), @Index(name="idUser", columns={"idUser"})})
 * @Entity
 */
class Consultation
{
    /**
     * @var integer
     *
     * @Column(name="idConsultation", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idconsultation;

    /**
     * @var \DateTime
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @Column(name="rapport", type="text", length=65535, nullable=false)
     */
    private $rapport;

    /**
     * @var Patient
     *
     * @ManyToOne(targetEntity="Patient", inversedBy="consultations")
     * @JoinColumns({
     *   @JoinColumn(name="idPatient", referencedColumnName="idPatient")
     * })
     */
    private $patient;

    /**
     * @var User
     *
     * @ManyToOne(targetEntity="User", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $medecin;


    /**
     * @var Ordonnance
     * @OneToOne(targetEntity="Ordonnance", mappedBy="consultation", cascade={"persist"})
     */
    private $ordonnance;


    /**
     * @var Examen
     * @OneToOne(targetEntity="Examen", mappedBy="consultation", cascade={"persist"})
     */
    private $examen;

    /**
     * @return Examen
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * @param Examen $examen
     */
    public function setExamen($examen)
    {
        $this->examen = $examen;
    }


    /**
     * @return int
     */
    public function getIdconsultation()
    {
        return $this->idconsultation;
    }

    /**
     * @param int $idconsultation
     */
    public function setIdconsultation($idconsultation)
    {
        $this->idconsultation = $idconsultation;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return Ordonnance
     */
    public function getOrdonnance()
    {
        return $this->ordonnance;
    }

    /**
     * @param Ordonnance $ordonnance
     */
    public function setOrdonnance($ordonnance)
    {
        $this->ordonnance = $ordonnance;
    }


    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getRapport()
    {
        return $this->rapport;
    }

    /**
     * @param string $rapport
     */
    public function setRapport($rapport)
    {
        $this->rapport = $rapport;
    }

    /**
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param Patient $patient
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    /**
     * @return User
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * @param User $medecin
     */
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;
    }


}