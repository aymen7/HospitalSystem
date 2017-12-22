<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:38
 */
namespace app\models;



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
     * @var string
     *
     * @Column(name="demande", type="string", length=200, nullable=false)
     */
    private $demande;

    /**
     * @var boolean
     *
     * @Column(name="effectue", type="boolean", nullable=false)
     */
    private $effectue;

    /**
     * @var \Consultation
     *
     * @ManyToOne(targetEntity="Consultation")
     * @JoinColumns({
     *   @JoinColumn(name="idConsultation", referencedColumnName="idConsultation")
     * })
     */
    private $idconsultation;


}

