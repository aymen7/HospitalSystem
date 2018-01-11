<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:45
 */
namespace app\models;


/**
 * Lit
 *
 * @Table(name="lit", indexes={@Index(name="idChambre", columns={"idChambre"}), @Index(name="idPatient", columns={"idPatient"})})
 * @Entity
 */
class Lit
{
    /**
     * @var integer
     *
     * @Column(name="idLit", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idlit;

    /**
     * @var \DateTime
     *
     * @Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var Chambre
     *
     * @ManyToOne(targetEntity="Chambre", inversedBy="lits")
     * @JoinColumns({
     *   @JoinColumn(name="idChambre", referencedColumnName="idChambre")
     * })
     */
    private $chambre;

    /**
     * @var Patient
     *
     * @ManyToOne(targetEntity="Patient", inversedBy="lits")
     * @JoinColumns({
     *   @JoinColumn(name="idPatient", referencedColumnName="idPatient")
     * })
     */
    private $patient;

    /**
     * @return int
     */
    public function getIdlit()
    {
        return $this->idlit;
    }

    /**
     * @param int $idlit
     */
    public function setIdlit($idlit)
    {
        $this->idlit = $idlit;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return Chambre
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * @param Chambre $chambre
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;
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




}

