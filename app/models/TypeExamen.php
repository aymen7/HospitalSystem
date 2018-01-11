<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:54
 */
namespace app\models;


/**
 * Typeexamen
 *
 * @Table(name="typeexamen", indexes={@Index(name="idExamen", columns={"idExamen"})})
 * @Entity
 */
class Typeexamen
{
    /**
     * @var integer
     *
     * @Column(name="idTypeExamen", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeexamen;

    /**
     * @var string
     *
     * @Column(name="analyse", type="string", length=100, nullable=false)
     */
    private $analyse;

    /**
     * @var string
     *
     * @Column(name="resultat", type="string", length=100, nullable=true)
     */
    private $resultat;

    /**
     * @var Examen
     *
     * @ManyToOne(targetEntity="Examen", inversedBy="typeExamens")
     * @JoinColumns({
     *   @JoinColumn(name="idExamen", referencedColumnName="idExamen")
     * })
     */
    private $examen;

    /**
     * @return int
     */
    public function getIdtypeexamen()
    {
        return $this->idtypeexamen;
    }

    /**
     * @param int $idtypeexamen
     */
    public function setIdtypeexamen($idtypeexamen)
    {
        $this->idtypeexamen = $idtypeexamen;
    }

    /**
     * @return string
     */
    public function getAnalyse()
    {
        return $this->analyse;
    }

    /**
     * @param string $analyse
     */
    public function setAnalyse($analyse)
    {
        $this->analyse = $analyse;
    }

    /**
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * @param string $resultat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }

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





}

