<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:38
 */

namespace app\models;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * Examen
 *
 * @Table(name="examen", indexes={@Index(name="idConsultation", columns={"idConsultation"})})
 * @Entity
 */
class Examen
{
    /**
     * @var integer
     *
     * @Column(name="idExamen", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idexamen;

    /**
     * @var boolean
     *
     * @Column(name="effectue", type="boolean", nullable=false)
     */
    private $effectue = false;

    /**
     * @var Consultation
     *
     * @OneToOne(targetEntity="Consultation", inversedBy="examen")
     * @JoinColumns({
     *   @JoinColumn(name="idConsultation", referencedColumnName="idConsultation")
     * })
     */
    private $consultation;

    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="TypeExamen", mappedBy="examen")
     */
    private $typeExamens;

    public function __construct()
    {
        $this->typeExamens = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTypeExamens()
    {
        return $this->typeExamens;
    }

    /**
     * @param ArrayCollection $typeExamens
     */
    public function setTypeExamens($typeExamens)
    {
        $this->typeExamens = $typeExamens;
    }


    /**
     * @return int
     */
    public function getIdexamen()
    {
        return $this->idexamen;
    }

    /**
     * @param int $idexamen
     */
    public function setIdexamen($idexamen)
    {
        $this->idexamen = $idexamen;
    }

    /**
     * @return bool
     */
    public function isEffectue()
    {
        return $this->effectue;
    }

    /**
     * @param bool $effectue
     */
    public function setEffectue($effectue)
    {
        $this->effectue = $effectue;
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


}

