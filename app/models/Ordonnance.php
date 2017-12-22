<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:49
 */
namespace app\models;

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
     * @var string
     *
     * @Column(name="medicament", type="string", length=40, nullable=false)
     */
    private $medicament;

    /**
     * @var boolean
     *
     * @Column(name="quantite", type="boolean", nullable=false)
     */
    private $quantite;

    /**
     * @var string
     *
     * @Column(name="remarque", type="string", length=200, nullable=false)
     */
    private $remarque;

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

