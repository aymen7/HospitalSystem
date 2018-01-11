<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:49
 */

namespace app\models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ordonnance
 *
 * @Table(name="ordonnance", indexes={@Index(name="idConsultation", columns={"idConsultation"})})
 * @Entity
 */
class Ordonnance
{
    /**
     * @var integer
     *
     * @Column(name="idOrdonnance", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idordonnance;

    /**
     * @var Consultation
     *
     * @OneToOne(targetEntity="Consultation", inversedBy="ordonnance", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="idConsultation", referencedColumnName="idConsultation")
     * })
     */
    private $consultation;

    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="LigneOrdonnance", mappedBy="ordonnance", cascade={"persist"})
     */
    private $lignesOrdonnances;


    public function __construct()
    {
        $this->lignesOrdonnances = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getIdordonnance()
    {
        return $this->idordonnance;
    }

    /**
     * @param int $idordonnance
     */
    public function setIdordonnance($idordonnance)
    {
        $this->idordonnance = $idordonnance;
    }

    /**
     * @return Consultation
     */
    public function getConsultation()
    {
        return $this->consultation;
    }

    /**
     * @param Consultation $consultation
     */
    public function setConsultation($consultation)
    {
        $this->consultation = $consultation;
    }

    /**
     * @return ArrayCollection
     */
    public function getLignesOrdonnances()
    {
        return $this->lignesOrdonnances;
    }

    /**
     * @param mixed $lignesOrdonnances
     */
    public function setLignesOrdonnances($lignesOrdonnances)
    {
        $this->lignesOrdonnances = $lignesOrdonnances;
    }


}

